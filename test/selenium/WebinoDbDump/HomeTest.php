<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump for the canonical source repository
 * @copyright   Copyright (c) 2014 Webino, s. r. o. (http://webino.sk)
 * @license     The BSD 3-Clause License
 */

namespace WebinoDbDump;

/**
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
class HomeTest extends AbstractBase
{
    /**
     *
     */
    public function testHome()
    {
        $this->session->open($this->uri);

        $src = $this->session->source();
        $this->assertNotContains('Error', $src, null, true);
        $this->assertNotContains('Exception', $src, null, true);
        $this->assertContains('Welcome to', $src);
    }
}
