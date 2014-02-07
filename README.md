# Database Dump Utility <br /> for Zend Framework 2

  [![Build Status](https://secure.travis-ci.org/webino/WebinoDbDump.png?branch=master)](http://travis-ci.org/webino/WebinoDbDump "Master Build Status")
  [![Coverage Status](https://coveralls.io/repos/webino/WebinoDbDump/badge.png?branch=master)](https://coveralls.io/r/webino/WebinoDbDump?branch=master "Master Coverage Status")
  [![Dependency Status](https://www.versioneye.com/user/projects/52f49150ec1375fd0b000011/badge.png)](https://www.versioneye.com/user/projects/529f8dea632bac8958000033 "TODO: Master Dependency Status")
  [![Build Status](https://secure.travis-ci.org/webino/WebinoDbDump.png?branch=develop)](http://travis-ci.org/webino/WebinoDbDump "Develop Build Status")
  [![Coverage Status](https://coveralls.io/repos/webino/WebinoDbDump/badge.png?branch=develop)](https://coveralls.io/r/webino/WebinoDbDump?branch=develop "Develop Coverage Status")
  [![Dependency Status](https://www.versioneye.com/user/projects/52f49150ec1375fd0b000011/badge.png)](https://www.versioneye.com/user/projects/529f8de6632bac79c600003d "Develop Dependency Status")

  [![Latest Stable Version](https://poser.pugx.org/webino/webino-dbdump/v/stable.png)](https://packagist.org/packages/webino/webino-dbdump "Latest Stable Version")
  [![Latest Unstable Version](https://poser.pugx.org/webino/webino-dbdump/v/unstable.png)](https://packagist.org/packages/webino/webino-dbdump "Latest Unstable Version")
  [![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/webino/WebinoDbDump/badges/quality-score.png?s=8d3022ff486c05b5244577e92d5968890d28f8f4)](https://scrutinizer-ci.com/g/webino/WebinoDbDump/ "Quality Score")
  [![Daily Downloads](https://poser.pugx.org/webino/webino-dbdump/d/daily.png)](https://packagist.org/packages/webino/webino-dbdump "Daily Downloads")
  [![Montly Downloads](https://poser.pugx.org/webino/webino-dbdump/d/monthly.png)](https://packagist.org/packages/webino/webino-dbdump "Monthly Downloads")
  [![Total Downloads](https://poser.pugx.org/webino/webino-dbdump/downloads.png)](https://packagist.org/packages/webino/webino-dbdump "Total Downloads")

  Utility used to dump a database into a SQL file, and to load that file into a database.

  **Still under development, please report any issues!**

## Features

  - Dump an entire database into a SQL file
  - Load a SQL file into a database

## Setup

  Following steps are necessary to get this module working, considering a zf2-skeleton or very similar application:

  1. Add `"minimum-stability": "dev"` to your composer.json, because this module is under development

  2. Run `php composer.phar require webino/webino-dbdump:dev-develop`

  3. Add `WebinoDbDump` to the enabled modules list

## QuickStart

  - For example, add this settings to your module config:

        'di' => [
            'instance' => [
                'alias' => [
                    'DefaultDbDump' => 'WebinoDbDump\Db\Dump\Dump',
                ],
            ],
            'DefaultDbDump' => [
                'parameters' => [
                    'adapter' => 'Zend\Db\Adapter\Adapter',
                ],
            ],
        ],

    *NOTE: Change the `DefaultAdapterDump` and `Zend\Db\Adapter\Adapter` as you wish.*

  - Then, add this code to your controller action:

        // We encourage to use Dependency Injection instead of Service Locator
        $dbDump = $this->getServiceLocator()->get('DefaultDbDump');

        // saves the sql code of the entire database to a file
        $dbDump->save('example/dump.sql');

        // drops & creates tables/views, triggers and inserts the data
        $dbDump->load('example/dump.sql');

    *NOTE: If you don't know how to inject the WebinoDbDump into action controller, check out `test/resources`.*

    *NOTE: Use stream wrappers, e.g. `compress.zlib://example.dump.sql.gz`, if you want compression.*

## Develop

[![Dependency Status](https://www.versioneye.com/user/projects/52f49151ec1375d0a6000018/badge.png)](https://www.versioneye.com/user/projects/52f49151ec1375d0a6000018 "Develop Tools Dependency Status")

This package uses Grunt task runner to automating the development.

### Requirements

  - [PSR-2 coding style](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)
  - [Linux](http://www.ubuntu.com/download)
  - [NetBeans](https://netbeans.org/downloads/) (recommended)
  - [NPM](https://npmjs.org/)
  - [Grunt](http://gruntjs.com/getting-started)
  - [PHPUnit](http://phpunit.de/manual/3.7/en/installation.html)
  - [Selenium](http://www.seleniumhq.org/)
  - [HtmlUnit](http://htmlunit.sourceforge.net/)
  - [Web browser](https://www.google.com/intl/sk/chrome/browser/) (recommended)

### Setup

Setting up development environment of the package.

  1. Clone this repository and run: `npm install`

  2. To update the development environment run: `grunt update`

     *Now your development environment is set.*

  3. Open a project in the (NetBeans) IDE

  4. To check module integration with the skeleton application open following directory via web browser:
     `._test/ZendSkeletonApplication/public/`

     e.g. [http://localhost/webino/WebinoDbDump/._test/ZendSkeletonApplication/public/](http://localhost/webino/WebinoDbDump/._test/ZendSkeletonApplication/public/)

  5. Integration test resources are in directory: `test/resources`

     *NOTE: Module example config is also used for integration testing.*

### Testing

  - Run `phpunit` in the test directory
  - Run `grunt test` in the module directory to run the tests and code analysis

    *NOTE: To run the code analysis there are some tool requirements.*
      - [pdepend](http://pdepend.org/)
      - [phpcb](https://github.com/Mayflower/PHP_CodeBrowser)
      - [phpcpd](https://github.com/sebastianbergmann/phpcpd)
      - [phpcs](http://pear.php.net/package/PHP_CodeSniffer/)
      - [phpdoc](http://www.phpdoc.org/)
      - [phploc](https://github.com/sebastianbergmann/phploc)
      - [phpmd](http://phpmd.org/download/index.html)

    *NOTE: Those tools are present after development environment is based.*

  - Run `grunt exec:selenium` in the module directory to run the Selenium WebDriver tests

    *NOTE: To specify the testing URI set the uri option, e.g. `grunt exec:selenium -uri http://example.com/`*

    *NOTE: Selenium server must be running, e.g. `java -jar selenium-server-standalone-<version-number>.jar`*

## Todo

  - Tests
  - Add support for more platforms (currently only Mysql)
  - Better exceptions
  - More options

## Addendum

  Please, if you are interested in this Zend Framework module report any issues and don't hesitate to contribute.

[Report a bug](https://github.com/webino/WebinoDbDump/issues) | [Fork me](https://github.com/webino/WebinoDbDump)
