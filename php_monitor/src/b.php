<?php
///**
// * Created by PhpStorm.
// * User: michael
// * Date: 18-11-6
// * Time: 下午12:59
// */
//namespace monitor\php_monitor;
//require_once '../vendor/autoload.php';
//
//$string = "php.myclass";
//$math = new mathTool();
//$b = bin2hex($string);
////$b = intval($b);
//$c = base_convert($b,16,10);
//
//
////$e = hexdec($b);
//$d =  base_convert($c,10,16);
////$f = dechex($c);
////$e = intval($e);
//
//echo "base_convert 16进制为".$b."\n";
//
//echo "base_convert 10进制为".$c."\n";
////echo "hexdec 10进制为".$e."\n";
//
////
//echo "base_convert 16进制为".$d."\n";
////echo "hexdec 16进制为".$f."\n";
////
////echo "base_convert 字符串为".hex2bin($d)."\n";
////echo "hexdec 字符串为".hex2bin($f)."\n";
////
//
////
////echo "字符串为".hex2bin($c)."\n";
////
////echo strlen($c)."\n";
//
//$c = base_convert($b,16,10);
//$e = $math->hex2dec($b);
//$f = $math->dec2hex($e);
//$result =hex2bin($f);
//echo "10进制".$e."\n";
//echo "16进制".$f."\n";
//
//echo "字符串为".$result."\n";
//
//$int_share_key = intval($math->hex2dec(bin2hex($string)));
//$share_key = bin2hex($string);
//$finaly_key = $math->dec2hex($share_key);
//
//echo "int测试为" .$int_share_key."\n";
//
//echo "测试为" .$share_key."\n";
//
//echo "直接转int测试为" .intval(bin2hex($string))."\n";
//
//
//
namespace monitor\php_monitor;

require_once '../vendor/autoload.php';

do {
    $a = new monitorV1();
    $b = $a->addValue("php.b",rand(800,1000));
    var_dump($b);
    sleep(5);
} while (true);
return true;
