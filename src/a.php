<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 18-11-2
 * Time: 下午2:32
 */

namespace php_monitor\src;

require_once '../vendor/autoload.php';

do {
    $a = new monitor();
    $b = $a->add("php.class_open");
    var_dump($b);
    sleep(2);
} while (true);
return true;
