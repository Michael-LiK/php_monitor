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
    $b = $a->addValue("php.a",rand(200,800));
    var_dump($b);
    sleep(5);
} while (true);
return true;
