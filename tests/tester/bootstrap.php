<?php
/**
 * Webino (http://webino.sk/)
 *
 * @link        https://github.com/webino/WebinoDbDump/ for the canonical source repository
 * @copyright   Copyright (c) 2016 Webino, s. r. o. (http://webino.sk/)
 * @license     BSD-3-Clause
 */

namespace WebinoDbDump;

use WebinoDev\Tester\Bootstrap;

require __DIR__ . '/../resources/init_autoloader.php';
call_user_func(new Bootstrap(__DIR__));
