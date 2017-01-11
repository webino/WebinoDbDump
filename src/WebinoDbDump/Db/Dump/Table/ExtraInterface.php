<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2017 Webino, s. r. o. (http://webino.sk)
 * @license     BSD-3-Clause
 */

namespace WebinoDbDump\Db\Dump\Table;

use SplFileObject as File;

/**
 * Interface for a platform table triggers
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
interface ExtraInterface
{
    /**
     * @param File $file
     * @return $this
     */
    public function writeIfAny(File $file);
}
