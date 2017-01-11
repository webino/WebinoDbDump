<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2017 Webino, s. r. o. (http://webino.sk)
 * @license     BSD-3-Clause
 */

namespace WebinoDbDump\Db\Dump\Platform\Mysql\Routine;

use ArrayObject;

/**
 * Mysql database dump utility platform procedure
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
class Procedure extends AbstractRoutine
{
    /**
     *
     */
    protected function show()
    {
        $identifier = $this->getPlatform()->quoteValue($this->adapter->getSchema());
        return $this->adapter->executeQuery('SHOW PROCEDURE STATUS WHERE Db=' . $identifier);
    }

    /**
     *
     */
    protected function showCreate($identifier)
    {
        return $this->adapter->executeQuery('SHOW CREATE PROCEDURE ' . $identifier);
    }

    /**
     *
     */
    public function createQuery($identifier, ArrayObject $create)
    {
        return sprintf(
            'DROP PROCEDURE IF EXISTS %s;;' . PHP_EOL . '%s;;',
            $identifier,
            $this->removeDefiner($create['Create Procedure'])
        );
    }

    /**
     * @param string
     * @return string
     */
    protected function removeDefiner($query)
    {
        return 'CREATE ' . substr($query, strpos($query, 'PROCEDURE'));
    }
}
