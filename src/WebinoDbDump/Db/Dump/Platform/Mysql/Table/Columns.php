<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2017 Webino, s. r. o. (http://webino.sk)
 * @author      Peter Bačinský <peter@bacinsky.sk>
 * @license     BSD-3-Clause
 */

namespace WebinoDbDump\Db\Dump\Platform\Mysql\Table;

use ArrayObject;
use WebinoDbDump\Db\Dump\Table\AbstractColumns;
use WebinoDbDump\Db\Dump\Table\ColumnsInterface;

/**
 * Mysql database dump utility platform columns
 */
class Columns extends AbstractColumns implements ColumnsInterface
{
    /**
     * Matched against column type to decide is numeric
     */
    const NUMERIC_FIELD_PATTERN = '~^[^(]*(BYTE|COUNTER|SERIAL|INT|LONG|CURRENCY|REAL
                                   |MONEY|FLOAT|DOUBLE|DECIMAL|NUMERIC|NUMBER)~ix';

    /**
     * @param ArrayObject $column
     * @return $this
     */
    public function addColumn(ArrayObject $column)
    {
        $this->columns[$column['Field']] = [
            'numeric' => $this->resolveIsTableColumnNumeric($column),
        ];

        return $this;
    }

    /**
     * @param ArrayObject $row
     * @return string
     */
    public function tableRowValues(ArrayObject $row)
    {
        $values = [];
        foreach ($row as $col => $value) {
            if (null === $value) {
                $values[] = 'NULL';
            } elseif ($this->columns[$col]['numeric']) {
                $values[] = $value;
            } else {
                $values[] = $this->platform->quoteValue($value);
            }
        }

        return '(' . join(', ', $values) . ')';
    }

    /**
     * @param ArrayObject $column
     * @return bool
     */
    private function resolveIsTableColumnNumeric(ArrayObject $column)
    {
        return (bool) preg_match(self::NUMERIC_FIELD_PATTERN, $column['Type']);
    }
}
