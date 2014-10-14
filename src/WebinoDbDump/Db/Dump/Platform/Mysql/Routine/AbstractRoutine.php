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
use SplFileObject as File;
use WebinoDbDump\Db\Dump\Table\AbstractExtra;
use Zend\Db\ResultSet\ResultSet;

/**
 * Mysql database dump utility platform routine
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
abstract class AbstractRoutine extends AbstractExtra
{
    /**
     *
     */
    abstract protected function showCreate($identifier);

    /**
     * @param string $identifier
     * @param ArrayObject $create
     * @return string
     */
    abstract protected function createQuery($identifier, ArrayObject $create);

    /**
     *
     */
    protected function write(File $file, ResultSet $procedures)
    {
        $file->fwrite('DELIMITER ;;' . PHP_EOL . PHP_EOL);

        $platform = $this->getPlatform();
        foreach ($procedures as $procedure) {
            $identifier = $platform->quoteIdentifier($procedure['Name']);
            $create     = $this->showCreate($identifier)->current();

            $file->fwrite($this->createQuery($identifier, $create) . PHP_EOL . PHP_EOL);
        }

        $file->fwrite('DELIMITER ;' . PHP_EOL . PHP_EOL);
        return $this;
    }
}
