<?php
namespace App\Utils;

/**
 * Created by PhpStorm.
 * User: luis
 * Date: 27/01/15
 * Time: 13:41
 */
class Date
{
    /**
     * Return a date d/m/Y
     *
     * @param $value
     * @return bool|string
     */
    public static function toView($value)
    {
        return date('d/m/Y', strtotime($value));
    }
    /**
     * Format the date for d/m/y
     *
     * @param $value
     * @return bool|string
     */
    public static function toTimestamps($value)
    {
        return date('Y-m-d - H:i:s', strtotime($value));
    }
    /**
     * @param $value
     * @return string
     */
    public static function toTime($value)
    {
       $value = implode("-",array_reverse(explode("/",$value)));        // troca barra por traço
        return date('Y-m-d', strtotime($value)). ' ' . date("H:i:s");
    }
    /**
     * Soma dias em data
     * @param  int $days Dias
     * @param  date $date Data
     * @return  date    [description]
     */
    public static function sumDay($days , $date)
    {
        return   date('Y-m-d', strtotime("+". $days ."days",strtotime($date)));
    }
 /**
     * Subittrai dias em data
     * @param  int $days Dias
     * @param  date $date Data
     * @return  date    [description]
     */
    public static function subDay($days , $date)
    {
        return   date('Y-m-d', strtotime("-". $days ."days",strtotime($date)));
    }
}