<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2016 Webino, s. r. o. (http://webino.sk)
 * @license     BSD-3-Clause
 */

namespace WebinoDbDump;

use WebinoDev\Test\Selenium\AbstractTestCase;

/**
 * Class HomeTest
 */
class HomeTest extends AbstractTestCase
{
    /**
     * @return void
     */
    public function testHome()
    {
        $this->open();
    }
}
