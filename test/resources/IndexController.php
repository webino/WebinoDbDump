<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump for the canonical source repository
 * @copyright   Copyright (c) 2014 Webino, s. r. o. (http://webino.sk)
 * @license     The BSD 3-Clause License
 */

namespace Application\Controller;

use WebinoDbDump\Db\Dump\DumpInterface;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * WebinoDbDump application test controller
 */
class IndexController extends AbstractActionController
{
    /**
     * @var DumpInterface
     */
    protected $dbDump;

    /**
     * @param DumpInterface $dbDump
     */
    public function __construct(DumpInterface $dbDump)
    {
        $this->dbDump = $dbDump;
    }

    /**
     * Use case examples
     *
     * @return array
     */
    public function indexAction()
    {
        // TODO examples

        // $this->dbDump->load('example/dump.sql');

        // $this->dbDump->save('example/dump.sql');
    }
}
