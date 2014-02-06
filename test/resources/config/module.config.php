<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump for the canonical source repository
 * @copyright   Copyright (c) 2014 Webino, s. r. o. (http://webino.sk)
 * @author      Peter Bačinský <peter@bacinsky.sk>
 * @license     The BSD 3-Clause License
 */

return [
    'router' => array(
        'routes' => array(
            'home' => array(
                'options' => array(
                    'defaults' => array(
                        /**
                         * We want to use the DI, so override the application
                         * module config with a controller FQCN, instead of invocable alias
                         */
                        'controller' => 'Application\Controller\IndexController',
                    ),
                ),
            ),
        ),
    ),
    'di' => [
        'allowed_controllers' => [
            'Application\Controller\IndexController',
        ],
        'instance' => [
            'alias' => [
                // TODO uncomment
                // TODO issue https://github.com/zendframework/zf2/issues/5795
                // 'DefaultDb' => 'Zend\Db\Adapter\Adapter',
            ],
            /**
             * Configure the controller
             * to inject database dump utility
             */
            'Application\Controller\IndexController' => [
                'parameters' => [
                    'dbDump' => 'DefaultDbDump',
                ],
            ],
        ],
    ],
    'service_manager' => [
        'abstract_factories' => [
            // TODO uncomment
            // TODO issue https://github.com/zendframework/zf2/issues/5795
            // 'Zend\Db\Adapter\AdapterAbstractServiceFactory',
        ],
        'factories' => [
            'Zend\I18n\Translator\TranslatorInterface' => 'Zend\I18n\Translator\TranslatorServiceFactory',
            // TODO remove
            // TODO issue https://github.com/zendframework/zf2/issues/5795
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
        ],
    ],
    'db' => [
        'driver_options' => [
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\', time_zone = \'+01:00\';',
        ],
        // TODO uncomment
        // TODO issue https://github.com/zendframework/zf2/issues/5795
        // 'adapters' => [
        //    'DefaultDbAdapter' => [
                'driver'   => 'pdo',
                'dsn'      => 'mysql:dbname=dev_test;host=localhost',
                'username' => 'webino',
                'password' => 'db4webino',
        //    ],
        // ],
    ],
];
