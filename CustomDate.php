<?php
/**
 *
 *
 *
 *
 */

$timestamp = time();//当前时间时间戳
$now = date('Y-m-d H:i:s');//当前格式化后的时间
$nowYear = date("Y");// m,d 对应的月份、日
//echo $now . PHP_EOL;

//获取指定日期的第一天和最后一天
//按照指定的格式返回：Y:m:d H:i:s,Y:m:d 00:00:00/23:59:59,Y:m:d

$cd = new CustomDate();

echo $cd->firstDay(time(),'timestamp') . PHP_EOL;

class CustomDate
{

    public function firstDay($date, $format = 'format')
    {
        if ($format == 'format') {
            $result = date('Y-m-01', $date);
        } else if ($format == 'timestamp') {
            $result = strtotime("2018-11-01 00:00:00");
//            $result = strtotime(date('Y-m-01 00:00:00', $date));
        }
        return $result;
    }

    public function lastDay()
    {

    }
}
