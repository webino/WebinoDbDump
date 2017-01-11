<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2017 Webino, s. r. o. (http://webino.sk)
 * @author      Peter Bačinský <peter@bacinsky.sk>
 * @license     The BSD 3-Clause License
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
