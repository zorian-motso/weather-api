<?php
/**
 * Created by PhpStorm.
 * User: zmotso
 * Date: 14.05.18
 * Time: 21:14
 */

namespace App\Models;

/**
 * Interface WeatherInterface
 * @package App\Models
 */
interface WeatherInterface
{
    /**
     * @return float
     */
    public function getTemperature(): float;
}