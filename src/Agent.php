<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 18-11-13
 * Time: 上午11:39
 */


namespace monitor\php_monitor;

use GuzzleHttp\Client;

require_once '../vendor/autoload.php';

$_SERVER["SERVER_ADDR"] = "127.0.0.1";
$_SERVER['SERVER_NAME'] = "php_monitor";

$url = "";

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

    $key_arr = json_decode($arr_str);
    $a = [];
    foreach ($key_arr as $key => $value) {
        var_dump($value);
        var_dump($key);
        $signal =sem_get($key);
        sem_acquire($signal);
        $a[$value] = shm_get_var($shm_id, $key);
        sem_release($signal);
    }

    var_dump($key_arr);
    var_dump($a);
    //清空共享内存
    shm_remove($shm_id);
    sem_release($arr_signal);
    //发送key值
    if (!empty($a)) {
        var_dump($a);
        $result = postData($a,$url);
        var_dump($result);
    }

    sleep(60);

} while (true);


/**
 * 发送收集数据到服务端
 *
 * @version 1.2
 * @source 1.2版本改为异步HTTP请求，不关心消息发送结果，确保不影响业务。
 * @param $data
 * @param $url
 * @return mixed
 */
function postData($data,$url)
{
    $client = new Client();
    $response = $client->requestAsync('POST', $url, ['body' => json_encode($data, JSON_UNESCAPED_UNICODE), 'headers' => ['content-type' => 'application/json']]);

    return json_decode($response->getBody());
}