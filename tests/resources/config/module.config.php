<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2017 Webino, s. r. o. (http://webino.sk)
 * @author      Peter Bačinský <peter@bacinsky.sk>
 * @license     BSD-3-Clause
 */

use Application\Controller\IndexController;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAbstractServiceFactory;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\I18n\Translator\TranslatorServiceFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'options' => [
                    'defaults' => [
                        /**
                         * We want to use the DI, so override the application
                         * module config with a controller FQCN, instead of invocable alias
                         */
                        'controller' => IndexController::class,
                    ],
                ],
            ],
        ],
    ],
    'di' => [
        'allowed_controllers' => [
            IndexController::class,
        ],
        'instance' => [
            'alias' => [
                'DefaultDbAdapter' => Adapter::class,
            ],
            /**
             * Configure the controller
             * to inject database dump utility
             */
            IndexController::class => [
                'parameters' => [
                    'dbDump' => 'DefaultDbDump',
                ],
            ],
        ],
    ],
    'service_manager' => [
        'abstract_factories' => [
            AdapterAbstractServiceFactory::class,
        ],
        'factories' => [
            TranslatorInterface::class => TranslatorServiceFactory::class,
        ],
    ],
    'db' => [
        'driver_options' => [
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\', time_zone = \'+01:00\';',
        ],
         'adapters' => [
            'DefaultDbAdapter' => [
                'driver'   => 'pdo',
                'dsn'      => 'mysql:dbname=CHANGEME;host=CHANGEME',
                'username' => 'CHANGEME',
                'password' => 'CHANGEME',
            ],
         ],
    ],
];
