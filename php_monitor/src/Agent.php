<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 18-11-1
 * Time: 下午5:28
 */

do{
    $shm_key = ftok("abc.txt", 't');
    $shm_id = shm_attach($shm_key, 10240, 0655);
//hash 上报集合KEY值，然后将16进制数转换为10进制
    $report_key = base_convert(md5('report', 16), 16, 10);

    sem_acquire($arr_signal);

    $arr_str = shm_get_var($shm_id, $report_key);

    if(shm_has_var($shm_id, $report_key)){
        $key_arr = explode(" ", $arr_str);
    }

    $a = [];
    foreach ($key_arr as $value){
        $a[$value] = shm_get_var($shm_id, $value);
    }
    sem_release($arr_signal);

    //发送key值
    var_dump($a);

    sleep(1);

}while(true);