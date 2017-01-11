<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2017 Webino, s. r. o. (http://webino.sk)
 * @license     BSD-3-Clause
 */

namespace WebinoDbDump\Db\Dump\Platform\Mysql;

use ArrayObject;
use WebinoDbDump\Db\Dump\Platform\AbstractPlatform;
use WebinoDbDump\Db\Dump\Platform\PlatformInterface;

/**
 * Mysql database dump utility platform
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
class Mysql extends AbstractPlatform implements PlatformInterface
{
    /**
     *
     */
    public function createTable(ArrayObject $table)
    {
        return new Table\Table(current($table), $this->adapter);
    }

    /**
     *
     */
    public function showTables()
    {
        return $this->adapter->executeQuery('SHOW TABLES');
    }

    /**
     *
     */
    public function header()
    {
        return 'SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE=\'NO_AUTO_VALUE_ON_ZERO\';' . PHP_EOL
               . 'SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;' . PHP_EOL
               . PHP_EOL;
    }

    /**
     *
     */
    public function footer()
    {
        return 'SET SQL_MODE=@OLD_SQL_MODE;' . PHP_EOL
               . 'SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;' . PHP_EOL
               . PHP_EOL;
    }
}
