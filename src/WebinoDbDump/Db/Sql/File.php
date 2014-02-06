<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump for the canonical source repository
 * @copyright   Copyright (c) 2014 Webino, s. r. o. (http://webino.sk)
 * @license     The BSD 3-Clause License
 */

namespace WebinoDbDump\Db\Sql;

use SplFileObject as BaseFile;

/**
 * Sql file
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
class File extends BaseFile implements FileInterface
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
     * @return string
     */
    public function fgetsql()
    {
        $query = '';
        while ($line = parent::current()) {
            parent::next();

            if (0 === strpos($line, '--')) {
                // skip comments
                continue;
            }

            $match = [];
            if (preg_match('~delimiter\s*([^\s]+)$~iS', $line, $match)) {
                $this->delimiter = $match[1];
                continue;
            }

            $query .= $line;

            if (preg_match('~' . preg_quote($this->delimiter, '~') . '\s*$~iS', $line)) {
                break;
            }
        }

        return trim($query);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        if (null === $this->current) {
            $this->current = $this->fgetsql();
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
     *
     */
    public function next()
    {
        $this->current = $this->fgetsql();
    }
}
