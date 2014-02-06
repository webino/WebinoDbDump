<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump for the canonical source repository
 * @copyright   Copyright (c) 2014 Webino, s. r. o. (http://webino.sk)
 * @license     The BSD 3-Clause License
 */

namespace WebinoDbDump\Db\Dump\Table;

use SplFileObject as File;
use WebinoDbDump\Db\Dump\Dump;
use WebinoDbDump\Db\Dump\Adapter;

/**
 * Base class for a dump utility platform table
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
abstract class AbstractTable
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var Adapter
     */
    protected $adapter;

    /**
     * @var bool|null
     */
    protected $view;

    /**
     * @param string $name
     */
    public function __construct($name, Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->setName($name);
    }

    /**
     * @return \Zend\Db\ResultSet\ResultSet
     */
    abstract protected function showCreate();

    /**
     * @return \Zend\Db\ResultSet\ResultSet
     */
    abstract protected function showColumns();

    /**
     * @return \Zend\Db\ResultSet\ResultSet
     */
    abstract protected function select();

    /**
     * @return TableColumnsInterface
     */
    abstract protected function createColumns();

    /**
     * @return TableTriggersInterface
     */
    abstract protected function createTriggers();

    /**
     * @return string
     */
    abstract protected function create();

    /**
     * @return string
     */
    abstract protected function startInsert();

    /**
     * @return string
     */
    abstract protected function continueInsert();

    /**
     * @return string
     */
    abstract protected function finishInsert();

    /**
     * @param string $name
     * @return self
     */
    protected function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return bool
     */
    protected function isView()
    {
        if (null === $this->view) {
            throw new \RuntimeException('Don\'t know if is view');
        }

        return $this->view;
    }

    /**
     * @param bool $view
     * @return self
     */
    protected function setView($view)
    {
        $this->view = (bool) $view;
        return $this;
    }

    /**
     * @return \Zend\Db\Adapter\Platform\PlatformInterface
     */
    protected function getPlatform()
    {
        return $this->adapter->getPlatform();
    }

    /**
     * @param File $file
     * @return self
     */
    public function write(File $file)
    {
        $file->fwrite($this->create());

        $this->isView() or
            $this->writeData($file);

        $this->createTriggers()->writeIfAny($file);

        return $this;
    }

    /**
     * @param File $file
     * @return self
     */
    private function writeData(File $file)
    {
        $data = $this->select();
        if (!$data->count()) {
            // nothing to write
            return $this;
        }

        $columns  = $this->createColumnsInternal();
        $maxIndex = $data->count() - 1;
        $sqlSize  = 0;

        foreach ($data as $index => $row) {
            $line = '';

            if (0 === $sqlSize) {
                $line .= $this->startInsert();
            }

            $line .= $columns->tableRowValues($row);

            $sqlSize += strlen($line);
            if ($index >= $maxIndex
                || $sqlSize > Dump::MAX_SQL_SIZE
            ) {
                $sqlSize = 0;
                $line .= $this->finishInsert();
            } else {
                $line .= $this->continueInsert();
            }

            $file->fwrite($line . PHP_EOL);
        }

        return $this;
    }

    /**
     * @return TavleColumnsInterface
     */
    private function createColumnsInternal()
    {
        $columns = $this->createColumns();
        foreach ($this->showColumns() as $column) {
            $columns->addColumn($column);
        }

        return $columns;
    }
}
