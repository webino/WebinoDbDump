<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump for the canonical source repository
 * @copyright   Copyright (c) 2014 Webino, s. r. o. (http://webino.sk)
 * @license     The BSD 3-Clause License
 */

namespace WebinoDbDump\Db\Dump;

/**
 * Database dump utility interface
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
interface DumpInterface
{
    /**
     * @param string $filePath
     * @return self
     */
    public function save($filePath);

    /**
     * @param string $filePath
     * @return self
     */
    public function load($filePath);
}
