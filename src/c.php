<?php
namespace monitor\php_monitor;

require_once '../vendor/autoload.php';

do {
    $a = new monitor();
    $b = $a->set("php.class_open",5000);
    var_dump($b);
    sleep(5);
} while (true);
return true;
