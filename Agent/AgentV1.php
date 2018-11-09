<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 18-11-2
 * Time: 下午2:43
 */

namespace monitor\php_monitor;

use GuzzleHttp\Client;

require_once '../vendor/autoload.php';

$_SERVER["SERVER_ADDR"] = "127.0.0.1";
$_SERVER['SERVER_NAME'] = "php_monitor";

do {
    $shm_key = ftok("abc.txt", 't');
    $shm_id = shm_attach($shm_key, 10240, 0655);
    //hash 上报集合KEY值，然后将16进制数转换为10进制
    $report_key = intval(base_convert(bin2hex('report'), 16, 10));

    $arr_signal = sem_get($report_key);
    sem_acquire($arr_signal);

    if (!shm_has_var($shm_id, $report_key)) {
        echo "No value here\n";
        sleep(60);
        continue;
    }

    $arr_str = shm_get_var($shm_id, $report_key);

    $key_arr = explode(" ", $arr_str);
    $a = [];
    foreach ($key_arr as $value) {
        $signal =sem_get($value);
        sem_acquire($signal);
        $monitor_value = intval($value);
        $key_str = base_convert($value,10,16);
        $key = hex2bin($key_str);
        $a[$key] = shm_get_var($shm_id, $monitor_value);
        sem_release($signal);
    }
    //发送key值
    if (!empty($a)) {
        var_dump($a);
        $result = postData($a);
        var_dump($result);
    }

    //清空共享内存
    shm_remove($shm_id);
    sem_release($arr_signal);



    sleep(60);

} while (true);


function postData($data,$url)
{
    $client = new Client();
    $response = $client->request('POST', $url, ['body' => json_encode($data, JSON_UNESCAPED_UNICODE), 'headers' => ['content-type' => 'application/json']]);

    return json_decode($response->getBody());
}