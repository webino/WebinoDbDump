<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2016 Webino, s. r. o. (http://webino.sk)
 * @license     The BSD 3-Clause License
 */

namespace WebinoDbDump\Db\Dump\Table;

use SplFileObject as File;
use WebinoDbDump\Db\Dump\Adapter;
use Zend\Db\ResultSet\ResultSet;

/**
 * Base class for a platform table triggers
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
abstract class AbstractExtra implements ExtraInterface
{
    /**
     * @var string
     */
    protected $tableName;

    /**
     * @var Adapter
     */
    protected $adapter;

    /**
     * @param string $tableName
     * @param Adapter $adapter
     */
    public function __construct($tableName, Adapter $adapter)
    {
        $this->tableName = $tableName;
        $this->adapter   = $adapter;
    }

    /**
     * @return \Zend\Db\Platform\PlatformInterface
     */
    protected function getPlatform()
    {
        return $this->adapter->getPlatform();
    }

    /**
     * @return ResultSet
     */
    abstract protected function show();

    /**
     * @param File $file
     * @param ResultSet $triggers
     * @return $this
     */
    abstract protected function write(File $file, ResultSet $triggers);

    /**
     * @param File $file
     * @return $this
     */
    public function writeIfAny(File $file)
    {
        $triggers = $this->show();
        if (!$triggers->count()) {
            // nothing to write
            return $this;
        }

        $this->write($file, $triggers);
        return $this;
    }
}
