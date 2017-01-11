<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2017 Webino, s. r. o. (http://webino.sk)
 * @author      Peter Bačinský <peter@bacinsky.sk>
 * @license     BSD-3-Clause
 */

namespace WebinoDbDump;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Class Module
 */
class Module implements ConfigProviderInterface
{
    const VERSION = '0.1.0';

    /**
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }
}
