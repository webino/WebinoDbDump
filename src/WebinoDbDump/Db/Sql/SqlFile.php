<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2016 Webino, s. r. o. (http://webino.sk)
 * @license     The BSD 3-Clause License
 */

namespace WebinoDbDump\Db\Sql;

use SplFileObject;

/**
 * Sql file
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
class SqlFile extends SplFileObject implements SqlInterface
{
    use SqlTrait;

    /**
     * @param callable $callback
     */
    protected function eachQuery(callable $callback)
    {
        while ($line = parent::current()) {
            parent::next();

            $result = call_user_func($callback, $line);
            if (false === $result) {
                continue;
            } elseif (true === $result) {
                break;
            }
        }
    }
}
