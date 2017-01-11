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
 * Sql trait
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
trait SqlTrait
{
    /**
     * @var string
     */
    protected $delimiter = ';';

    /**
     * @var string|null
     */
    protected $current;

    /**
     * @param callable $callback
     * @return mixed
     */
    abstract protected function eachQuery(callable $callback);

    /**
     * @return string
     */
    public function getSql()
    {
        $query = '';

        $this->eachQuery(function ($line) use (&$query) {
            if (0 === strpos($line, '--')) {
                // skip comments
                return false;
            }

            $match = [];
            if (preg_match('~delimiter\s*([^\s]+)$~iS', $line, $match)) {
                $this->delimiter = $match[1];
                return false;
            }

            $query .= $line;

            if (preg_match('~' . preg_quote($this->delimiter, '~') . '\s*$~iS', $line)) {
                return true;
            }

            return null;
        });

        return trim($query);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        if (null === $this->current) {
            $this->current = $this->getSql();
        }
        return !empty($this->current);
    }

    /**
     * @return string
     */
    public function current()
    {
        return $this->current;
    }

    /**
     * @return void
     */
    public function next()
    {
        $this->current = $this->getSql();
    }
}
