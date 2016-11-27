<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2016 Webino, s. r. o. (http://webino.sk)
 * @license     The BSD 3-Clause License
 */

namespace WebinoDbDump\Db\Dump\Table;

use ArrayObject;

/**
 * Interface for a platform table columns
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
interface ColumnsInterface
{
    /**
     * @param ArrayObject $column
     * @return $this
     */
    public function addColumn(ArrayObject $column);

    /**
     * @param ArrayObject $row
     * @return string
     */
    public function tableRowValues(ArrayObject $row);
}
