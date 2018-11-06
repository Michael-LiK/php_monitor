<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 18-11-6
 * Time: 下午2:20
 */

namespace monitor\php_monitor;

require_once '../vendor/autoload.php';

Class monitorV2
{

    public function add($name)
    {

        $math = new mathTool();
        //开辟共享内存
        $shm_key = ftok("abc.txt", 't');
        $shm_id = shm_attach($shm_key, 10240, 0655);

        //hash 上报集合KEY值，然后将16进制数转换为10进制
        $report_name = "report";
        $report_key = strtoupper(bin2hex($report_name));

        var_dump(bin2hex($report_name));
        var_dump($report_key);

        exit;

        //设定上报KEY值
        //hash 上报KEY值，然后将16进制数转换为10进制
        $share_key = strtoupper(bin2hex($name));

        //设定信号量
        $arr_signal = sem_get($report_key);
        $signal = sem_get($share_key);


        //1.先将上报KEY,存入上报集合中

        // 获得信号量
        sem_acquire($arr_signal);
        if (shm_has_var($shm_id, $report_key)) {
            $arr_str = shm_get_var($shm_id, $report_key);
            $key_arr = explode(" ", $arr_str);
            if (!in_array($share_key, $key_arr)) {
                $arr_str = $arr_str . " " . $share_key;
            }
            shm_put_var($shm_id, $report_key, $arr_str);
        } else {
            $arr_str = "$share_key";
            shm_put_var($shm_id, $report_key, $arr_str);
        }
        //释放信号量
        sem_release($arr_signal);
        // 获得信号量
        sem_acquire($signal);

        if (shm_has_var($shm_id, $share_key)) {
            // 有值,加一
            $count = shm_get_var($shm_id, $share_key);
            $count++;
            shm_put_var($shm_id, $share_key, $count);
        } else {
            // 无值,初始化
            $count = 1;
            shm_put_var($shm_id, $share_key, $count);
        }
        //释放信号量
        sem_release($signal);

        return true;

    }

    public function addValue($name,$value)
    {

        //开辟共享内存
        $shm_key = ftok("abc.txt", 't');
        $shm_id = shm_attach($shm_key, 10240, 0655);

        //hash 上报集合KEY值，然后将16进制数转换为10进制
        $report_name = "report";
        $report_key = base_convert(bin2hex($report_name), 16, 10);

        //设定上报KEY值
        //hash 上报KEY值，然后将16进制数转换为10进制
        $share_key = base_convert(bin2hex($name), 16, 10);

        //设定信号量

        $arr_signal = sem_get($report_key);
        $signal = sem_get($share_key);


        //1.先将上报KEY,存入上报集合中

        // 获得信号量
        sem_acquire($arr_signal);
        if (shm_has_var($shm_id, $report_key)) {
            $arr_str = shm_get_var($shm_id, $report_key);
            $key_arr = explode(" ", $arr_str);
            if (!in_array($share_key, $key_arr)) {
                $arr_str = $arr_str . " " . $share_key;
            }
            shm_put_var($shm_id, $report_key, $arr_str);
        } else {
            $arr_str = "$share_key";
            shm_put_var($shm_id, $report_key, $arr_str);
        }
        //释放信号量
        sem_release($arr_signal);
        // 获得信号量
        sem_acquire($signal);

        if (shm_has_var($shm_id, $share_key)) {
            // 有值,加一
            $count = shm_get_var($shm_id, $share_key);
            $count = $count + $value;
            shm_put_var($shm_id, $share_key, $count);
        } else {
            // 无值,初始化
            $count = 1;
            shm_put_var($shm_id, $share_key, $count);
        }
        //释放信号量
        sem_release($signal);

    }

    public function set($name,$value)
    {

        //开辟共享内存
        $shm_key = ftok("abc.txt", 't');
        $shm_id = shm_attach($shm_key, 10240, 0655);

        //hash 上报集合KEY值，然后将16进制数转换为10进制
        $report_name = "report";
        $report_key = base_convert(bin2hex($report_name), 16, 10);

        //设定上报KEY值
        //hash 上报KEY值，然后将16进制数转换为10进制
        $share_key = base_convert(bin2hex($name), 16, 10);

        //设定信号量

        $arr_signal = sem_get($report_key);
        $signal = sem_get($share_key);


        //1.先将上报KEY,存入上报集合中

        // 获得信号量
        sem_acquire($arr_signal);
        if (shm_has_var($shm_id, $report_key)) {
            $arr_str = shm_get_var($shm_id, $report_key);
            $key_arr = explode(" ", $arr_str);
            if (!in_array($share_key, $key_arr)) {
                $arr_str = $arr_str . " " . $share_key;
            }
            shm_put_var($shm_id, $report_key, $arr_str);
        } else {
            $arr_str = "$share_key";
            shm_put_var($shm_id, $report_key, $arr_str);
        }
        //释放信号量
        sem_release($arr_signal);
        // 获得信号量
        sem_acquire($signal);

        if (shm_has_var($shm_id, $share_key)) {
            // 有值,加一
            $count = shm_get_var($shm_id, $share_key);
            $count = $value;
            shm_put_var($shm_id, $share_key, $count);
        } else {
            // 无值,初始化
            $count = $value;
            shm_put_var($shm_id, $share_key, $count);
        }
        //释放信号量
        sem_release($signal);

    }

}