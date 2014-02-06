<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump for the canonical source repository
 * @copyright   Copyright (c) 2014 Webino, s. r. o. (http://webino.sk)
 * @license     The BSD 3-Clause License
 */

namespace WebinoDbDump\Db\Dump\Platform;

use WebinoDbDump\Db\Dump\Adapter;

/**
 * Base class for a dump utility platform
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
abstract class AbstractPlatform
{
    /**
     * @var Adapter
     */
    protected $adapter;

    /**
     * @param Adapter $adapter
     */
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }
}
