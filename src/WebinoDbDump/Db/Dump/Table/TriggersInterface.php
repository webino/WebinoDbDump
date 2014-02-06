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

/**
 * Interface for a platform table triggers
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
interface TriggersInterface
{
    /**
     * @param File $file
     * @return self
     */
    public function writeIfAny(File $file);
}
