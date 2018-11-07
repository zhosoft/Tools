<?php
/**
 * 对于日期的各种处理，统一转换为时间戳进行操作最为方便，
 *
 * 获取指定日期的第一天和最后一天，按照指定的格式返回：Y:m:d H:i:s,Y:m:d 00:00:00/23:59:59,Y:m:d
 */
//设置时区
date_default_timezone_set('asia/shanghai');
//$cd = new CustomDate();
//echo $cd->getYear(time()) . PHP_EOL;
//echo $cd->getMonth(time()) . PHP_EOL;
//echo $cd->getDay(time()) . PHP_EOL;

class CustomDate
{
    /**
     * 获取指定日期所在月份的第一天 返回的格式有两种，根据第二个参数的传值来决定
     * @param $date 传时间戳格式
     * @param string $format format-格式化 timestamp-时间戳
     * @return false|int|string
     */
    public function firstDay($date, $format = 'format')
    {
        if ($format == 'format') {
            $result = date('Y-m-01', $date);
        } else if ($format == 'timestamp') {
            $result = strtotime(date('Y-m-01 00:00:00', $date));
        }
        return $result;
    }

    /**
     * 获取指定日期所在月份的第后一天 返回的格式有两种，根据第二个参数的传值来决定
     * @param $date 传时间戳格式
     * @param string $format format-格式化 timestamp-时间戳
     * @return false|int|string
     */
    public function lastDay($date, $format = 'format')
    {
        $_date = strtotime(date('Y-m-01', $date) . '+1 month -1 day');
        if ($format == 'format') {
            $result = date('Y-m-d', $_date);
        } else if ($format == 'timestamp') {
            $result = strtotime(date('Y-m-d 23:59:59', $_date));
        }
        return $result;
    }

    /**
     * 获取字符串的长度
     * @param string $string
     * @return int
     */
    private function getStrLen($string = '')
    {
        return strlen($string);
    }

    /**
     * 获取指定日期的年份
     * @param $date
     * @return bool|false|string
     */
    public function getYear($date)
    {
        if ($this->getStrLen($date) == '10') {
            return date('Y', $date);
        } else {
            return false;
        };
    }

    /**
     * 获取指定日期的月份
     * @param $date
     * @return bool|false|string
     */
    public function getMonth($date)
    {
        if ($this->getStrLen($date) == '10') {
            return date('m', $date);
        } else {
            return false;
        };
    }

    /**
     * 获取指定日期的天
     * @param $date
     * @return bool|false|string
     */
    public function getDay($date)
    {
        if ($this->getStrLen($date) == '10') {
            return date('d', $date);
        } else {
            return false;
        };
    }
}