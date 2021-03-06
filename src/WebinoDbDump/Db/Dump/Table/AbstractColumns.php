<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2017 Webino, s. r. o. (http://webino.sk)
 * @license     BSD-3-Clause
 */

namespace WebinoDbDump\Db\Dump\Table;

use Zend\Db\Adapter\Platform\PlatformInterface;

/**
 * Base class for a platform table columns
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
abstract class AbstractColumns
{
    /**
     * @var array
     */
    protected $columns = [];

    /**
     * @var PlatformInterface
     */
    protected $platform;

    /**
     * @param PlatformInterface $platform
     */
    public function __construct(PlatformInterface $platform)
    {
        $this->platform = $platform;
    }
}
