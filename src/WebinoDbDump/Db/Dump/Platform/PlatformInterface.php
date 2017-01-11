<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2017 Webino, s. r. o. (http://webino.sk)
 * @license     BSD-3-Clause
 */

namespace WebinoDbDump\Db\Dump\Platform;

use ArrayObject;

/**
 * Interface for a dump utility platform
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
interface PlatformInterface
{
    /**
     * @param ArrayObject $table
     * @return \WebinoDbDump\Db\Dump\Table\AbstractTable
     */
    public function createTable(ArrayObject $table);

    /**
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function showTables();

    /**
     * @return string
     */
    public function header();

    /**
     * @return string
     */
    public function footer();
}
