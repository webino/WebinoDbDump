<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump for the canonical source repository
 * @copyright   Copyright (c) 2014-2016 Webino, s. r. o. (http://webino.sk)
 * @license     The BSD 3-Clause License
 */

namespace WebinoDbDump\Db\Dump\Platform\Mysql\Table;

use WebinoDbDump\Db\Dump\Platform\Mysql\Routine\Procedure;
use WebinoDbDump\Db\Dump\Table\AbstractTable;

/**
 * Mysql database dump utility platform table
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
class Table extends AbstractTable
{
    /**
     * @var string
     */
    protected $rawName;

    /**
     * @param string $name
     * @return $this
     */
    protected function setName($name)
    {
        $this->rawName = $name;
        $this->name    = $this->getPlatform()->quoteIdentifier($this->rawName);

        return $this;
    }

    /**
     * @return \Zend\Db\ResultSet\ResultSet
     */
    protected function showCreate()
    {
        return $this->adapter->executeQuery('SHOW CREATE TABLE ' . $this->name);
    }

    /**
     * @return \Zend\Db\ResultSet\ResultSet
     */
    protected function showColumns()
    {
        return $this->adapter->executeQuery('SHOW COLUMNS FROM ' . $this->name);
    }

    /**
     * @return \Zend\Db\ResultSet\ResultSet
     */
    protected function select()
    {
        return $this->adapter->executeQuery('SELECT * FROM ' . $this->name);
    }

    /**
     * @return Columns
     */
    protected function createColumns()
    {
        return new Columns($this->getPlatform());
    }

    /**
     * @return array[Triggers, Procedure]
     */
    protected function createExtras()
    {
        return [
            new Triggers($this->rawName, $this->adapter),
            new Procedure($this->rawName, $this->adapter),
        ];
    }

    /**
     * @return string
     */
    protected function create()
    {
        $row = $this->showCreate()->current();

        $isView = isset($row['Create View']);
        $this->setView($isView);

        $dump = '';

        // drop
        $dump .= sprintf(
            'DROP %s IF EXISTS %s;' . PHP_EOL,
            $isView ? 'VIEW' : 'TABLE',
            $this->name
        );

        // create
        $dump .= $row[$isView ? 'Create View' : 'Create Table'] . ';' . PHP_EOL . PHP_EOL;

        return $dump;
    }

    /**
     * @return string
     */
    protected function startInsert()
    {
        return 'LOCK TABLES ' . $this->name . ' WRITE;' . PHP_EOL
               .'INSERT INTO ' . $this->name . ' VALUES' . PHP_EOL;
    }

    /**
     * @return string
     */
    protected function continueInsert()
    {
        return ',';
    }

    /**
     * @return string
     */
    protected function finishInsert()
    {
        return ';' . PHP_EOL . 'UNLOCK TABLES;' . PHP_EOL;
    }
}
