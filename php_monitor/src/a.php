<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 18-11-2
 * Time: 下午2:32
 */

namespace monitor\php_monitor;

require_once '../vendor/autoload.php';

do {
    $a = new monitorV1();
    $b = $a->addValue("php.a",30);
    var_dump($b);
    sleep(2);
} while (true);
return true;
