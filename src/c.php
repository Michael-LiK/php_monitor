<?php
namespace monitor\php_monitor;

require_once '../vendor/autoload.php';

do {
    $a = new monitor();
    $b = $a->addValue("php.c",100);
    var_dump($b);
    sleep(5);
} while (true);
return true;
