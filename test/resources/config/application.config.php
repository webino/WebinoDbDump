<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump for the canonical source repository
 * @copyright   Copyright (c) 2014 Webino, s. r. o. (http://webino.sk)
 * @author      Peter Bačinský <peter@bacinsky.sk>
 * @license     The BSD 3-Clause License
 */

// Overrdides application controller
require __DIR__ . '/../IndexController.php';

/**
 * WebinoDbDump application test config
 */
return [
    'modules' => [
        'ZF2NetteDebug',
        'Application',
        'WebinoDbDump',
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
            'WebinoDbDump' => __DIR__ . '/../../src',
            'module',
            'vendor',
        ],
    ],
];
