<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump for the canonical source repository
 * @copyright   Copyright (c) 2014 Webino, s. r. o. (http://webino.sk)
 * @license     The BSD 3-Clause License
 */

namespace WebinoDbDump\Db\Dump\Platform;

use ArrayObject;
use SplFileObject as File;

/**
 * Interface for a dump utility platform
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
interface PlatformInterface
{
    /**
     * @param ArrayObject $table
     * @return Table
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
