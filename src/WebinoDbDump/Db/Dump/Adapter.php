<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump for the canonical source repository
 * @copyright   Copyright (c) 2014 Webino, s. r. o. (http://webino.sk)
 * @license     The BSD 3-Clause License
 */

namespace WebinoDbDump\Db\Dump;

use Zend\Db\Adapter\Adapter as DbAdapter;
use Zend\Db\Adapter\AdapterInterface as DbAdapterInterface;

/**
 * Database dump utility adapter
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
class Adapter
{
    /**
     * @var DbAdapterInterface
     */
    protected $adapter;

    /**
     * @param DbAdapterInterface $adapter
     */
    public function __construct(DbAdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return \Zend\Db\Adapter\Platform\PlatformInterface
     */
    public function getPlatform()
    {
        return $this->adapter->getPlatform();
    }

    /**
     * Returns database name
     *
     * @return string
     */
    public function getSchema()
    {
        return $this->adapter->getDriver()->getConnection()->getCurrentSchema();
    }

    /**
     * @param string $sql
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function executeQuery($sql)
    {
        return $this->adapter->query($sql, DbAdapter::QUERY_MODE_EXECUTE);
    }
}
