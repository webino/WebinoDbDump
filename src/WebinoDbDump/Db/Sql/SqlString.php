<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump/ for the canonical source repository
 * @copyright   Copyright (c) 2016-2017 Webino, s. r. o. (http://webino.sk)
 * @license     BSD-3-Clause
 */

namespace WebinoDbDump\Db\Sql;

/**
 * Sql string
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
class SqlString implements SqlInterface
{
    use SqlTrait;

    /**
     * @var array
     */
    protected $lines = [];

    /**
     * @param string $sql
     */
    public function __construct($sql)
    {
        empty($sql) or $this->lines = explode(PHP_EOL, $sql);
    }

    /**
     * @param callable $callback
     */
    protected function eachQuery(callable $callback)
    {
        while ($line = current($this->lines)) {
            next($this->lines);

            $result = call_user_func($callback, $line);
            if (false === $result) {
                continue;
            } elseif (true === $result) {
                break;
            }
        }
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return key($this->lines);
    }

    /**
     * @return void
     */
    public function rewind()
    {
        reset($this->lines);
    }
}
