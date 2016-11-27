<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2016 Webino, s. r. o. (http://webino.sk)
 * @author      Peter Bačinský <peter@bacinsky.sk>
 * @license     BSD-3-Clause
 */

namespace WebinoDbDump;

// Overrides application controller
require __DIR__ . '/../IndexController.php';

/**
 * WebinoDbDump application test config
 */
return [
    'modules' => [
        'WebinoDebug',
        'Application',
        __NAMESPACE__,
    ],
    'module_listener_options' => [
        'config_glob_paths' => [
            'config/autoload/{,*.}{global,local}.php',
        ],
        'config_static_paths' => [
            __DIR__ . '/module.config.php',
            __DIR__ . '/../../../example/config/module.config.php',
        ],
        'module_paths' => [
            'module',
            'vendor',
        ],
    ],
];
