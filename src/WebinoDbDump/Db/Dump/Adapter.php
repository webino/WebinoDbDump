<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2017 Webino, s. r. o. (http://webino.sk)
 * @author      Peter Bačinský <peter@bacinsky.sk>
 * @license     The BSD 3-Clause License
 */

namespace WebinoDbDump\Db\Dump;

use WebinoDbDump\Exception;
use Zend\Db\Adapter\Adapter as DbAdapter;
use Zend\Db\Adapter\AdapterInterface as DbAdapterInterface;

/**
 * Database dump utility adapter
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
     * @throws Exception\SqlQueryException
     */
    public function executeQuery($sql)
    {
        try {
            return $this->adapter->query($sql, DbAdapter::QUERY_MODE_EXECUTE);
        } catch (\Exception $exc) {
            throw new Exception\SqlQueryException(
                PHP_EOL . $exc->getMessage() . PHP_EOL . $sql . PHP_EOL
            );
        }
    }
}
