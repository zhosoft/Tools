<?php

/**
* 记录日志
* @param $variate
* @param $data
*/
function write($variate, $data)
{
    $path = Env::get('app_path') . "log/";//定义日志记录的目录
    if (!is_dir($path)) {
        mkdir($path, '0777', true);
    }
    file_put_contents($path . date("Ym") . '-log' . '.txt', date('Y-m-d H:i:s') . PHP_EOL . $variate . ":" . PHP_EOL . print_r($data, true) . PHP_EOL, FILE_APPEND);
}


/**
 * @param string $type 要生成编号的表名
 * @param string $prefix 编号前缀
 * @return string 返回是一个新的编号
 */
function setNumber($type = 'credit_apply', $prefix = 'ED')
{
    $date = date('Y-m-d');
    $data_str = date('ymd');//180521
    switch ($type) {
        case 'financing_order':
            $result = Db::name('financing_order')->whereLike('create_time', $date . "%")->count('financing_order_id');
            if (!empty($result)) {
                $number = $prefix . $data_str . str_pad(($result + 1), 3, '0', STR_PAD_LEFT);
            } else {
                $number = $prefix . $data_str . '001';
            }
            break;
        case 'credit_apply':
            $result = Db::name('credit_apply')->whereLike('create_time', $date . "%")->count('application_id');
            if (!empty($result)) {
                $number = $prefix . $data_str . str_pad(($result + 1), 3, '0', STR_PAD_LEFT);
            } else {
                $number = $prefix . $data_str . '001';
            }
            break;
        default:
            $number = '';
            break;
    }
    return $number;
}