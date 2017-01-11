# Database Dump Utility <br /> for Zend Framework 2

  [![Build Status](https://secure.travis-ci.org/webino/WebinoDbDump.png?branch=develop)](http://travis-ci.org/webino/WebinoDbDump "Develop Build Status")
  [![Coverage Status](https://coveralls.io/repos/webino/WebinoDbDump/badge.png?branch=develop)](https://coveralls.io/r/webino/WebinoDbDump?branch=develop "Develop Coverage Status")
  [![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/webino/WebinoDbDump/badges/quality-score.png?s=8d3022ff486c05b5244577e92d5968890d28f8f4)](https://scrutinizer-ci.com/g/webino/WebinoDbDump/ "Quality Score")
  [![Dependency Status](https://www.versioneye.com/user/projects/52f49150ec1375fd0b000011/badge.png)](https://www.versioneye.com/user/projects/529f8de6632bac79c600003d "Develop Dependency Status")

  [![Latest Stable Version](https://poser.pugx.org/webino/webino-db-dump/v/stable.png)](https://packagist.org/packages/webino/webino-db-dump "Latest Stable Version")
  [![Total Downloads](https://poser.pugx.org/webino/webino-db-dump/downloads.png)](https://packagist.org/packages/webino/webino-db-dump "Total Downloads")
  [![Latest Unstable Version](https://poser.pugx.org/webino/webino-db-dump/v/unstable.png)](https://packagist.org/packages/webino/webino-db-dump "Latest Unstable Version")
  [![License](https://poser.pugx.org/webino/webino-db-dump/license.svg)](https://packagist.org/packages/webino/webino-db-dump)

  Utility used to dump a database into a SQL file, and to load that file into a database.

## Features

  - Dump an entire database into a SQL file
  - Load a SQL file into a database

## Setup

  Following steps are necessary to get this module working, considering a zf2-skeleton or very similar application:

  1. Add `"minimum-stability": "dev"` to your composer.json, because this module is under development

  2. Run `php composer.phar require webino/webino-db-dump:dev-develop`

  3. Add `WebinoDbDump` to the enabled modules list

## QuickStart

  - For example, add this settings to your module config:

        'di' => [
            'instance' => [
                'alias' => [
                    'DefaultDbDump' => \WebinoDbDump\Db\Dump\Dump::class,
                ],
            ],
            'DefaultDbDump' => [
                'parameters' => [
                    'adapter' => \Zend\Db\Adapter\Adapter::class,
                ],
            ],
        ],

    *NOTE: Change the `DefaultAdapterDump` and `\Zend\Db\Adapter\Adapter::class` as you wish.*

  - Then, add this code to your controller action:

        // We encourage to use Dependency Injection instead of Service Locator
        $dbDump = $this->getServiceLocator()->get('DefaultDbDump');

        // saves the sql code of the entire database to a file
        $dbDump->save('example/dump.sql');

        // drops & creates tables/views, triggers and inserts the data
        $dbDump->load('example/dump.sql');

        // or from string
        $dbDump->read(new \WebinoDbDump\Db\Sql\SqlString('CREATE TABLE...'));

    *NOTE: If you don't know how to inject the WebinoDbDump into action controller, check out `test/resources`.*

    *NOTE: Use stream wrappers, e.g. `compress.zlib://example.dump.sql.gz`, if you want compression.*

## Changelog

### 0.2.0 [UNRELEASED]

  - Slightly redesigned
  - Added SqlString support

### 0.1.0

  - Initial release

## Develop

We will appreciate any contributions on development of this module.

Learn [How to develop Webino modules](https://github.com/webino/Webino/wiki/How-to-develop-Webino-module)

## Todo

  - Tests
  - Add support for more platforms (currently only Mysql)
  - Better exceptions
  - More options
  - Events dump
  - Upgrade Zend MVC

## Addendum

  Please, if you are interested in this Zend Framework module report any issues and don't hesitate to contribute.

[Report a bug](https://github.com/webino/WebinoDbDump/issues) | [Fork me](https://github.com/webino/WebinoDbDump)
