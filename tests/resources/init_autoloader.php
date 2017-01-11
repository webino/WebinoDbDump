<?php
/**
 * Webino (http://webino.sk/)
 *
 * @link        https://github.com/webino/WebinoDbDump/ for the canonical source repository
 * @copyright   Copyright (c) 2015-2017 Webino, s. r. o. (http://webino.sk/)
 * @license     BSD-3-Clause
 */

namespace WebinoDbDump;

use RuntimeException;
use WebinoDev\Test\Autoloader;

$loader = @include __DIR__ . '/../../vendor/autoload.php';
if (empty($loader)) {
    throw new RuntimeException('Unable to load. Run `php composer.phar install`.');
}

class_exists(Autoloader::class)
    and call_user_func(new Autoloader(__DIR__, __NAMESPACE__), $loader);
