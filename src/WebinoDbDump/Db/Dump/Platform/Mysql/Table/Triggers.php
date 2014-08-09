<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump for the canonical source repository
 * @copyright   Copyright (c) 2014 Webino, s. r. o. (http://webino.sk)
 * @license     The BSD 3-Clause License
 */

namespace WebinoDbDump\Db\Dump\Platform\Mysql\Table;

use SplFileObject as File;
use WebinoDbDump\Db\Dump\Table\AbstractExtra;
use Zend\Db\ResultSet\ResultSet;

/**
 * Mysql database dump utility platform triggers
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
class Triggers extends AbstractExtra
{
    /**
     *
     */
    protected function show()
    {
        $name = $this->getPlatform()->quoteValue($this->tableName);
        return $this->adapter->executeQuery('SHOW TRIGGERS LIKE ' . $name);
    }

    /**
     *
     */
    protected function write(File $file, ResultSet $triggers)
    {
        $file->fwrite('DELIMITER ;;' . PHP_EOL . PHP_EOL);

        $platform = $this->getPlatform();
        foreach ($triggers as $trigger) {

            $file->fwrite(
                sprintf(
                    'CREATE TRIGGER %s %s %s ON %s FOR EACH ROW '
                    . PHP_EOL . ' %s;;',
                    $platform->quoteIdentifier($trigger['Trigger']),
                    $trigger['Timing'],
                    $trigger['Event'],
                    $platform->quoteIdentifier($this->tableName),
                    $trigger['Statement']
                )
                . PHP_EOL . PHP_EOL
            );
        }

        $file->fwrite('DELIMITER ;' . PHP_EOL . PHP_EOL);
        return $this;
    }
}
