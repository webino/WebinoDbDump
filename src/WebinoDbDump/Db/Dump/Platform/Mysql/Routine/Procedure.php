<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump for the canonical source repository
 * @copyright   Copyright (c) 2014 Webino, s. r. o. (http://webino.sk)
 * @license     The BSD 3-Clause License
 */

namespace WebinoDbDump\Db\Dump\Platform\Mysql\Routine;

use ArrayObject;

/**
 * Mysql database dump utility platform triggers
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
        return $this->adapter->executeQuery('SHOW PROCEDURE STATUS');
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
