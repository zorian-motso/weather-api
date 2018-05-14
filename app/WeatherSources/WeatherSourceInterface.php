<?php
/**
 * Created by PhpStorm.
 * User: zmotso
 * Date: 14.05.18
 * Time: 21:13
 */

namespace App\WeatherSources;


use App\Models\WeatherInterface;

/**
 * Interface WeatherSourceInterface
 * @package App\WeatherSources
 */
interface WeatherSourceInterface
{
    /**
     * @param string $cityName
     * @return WeatherInterface
     */
    public function getWeatherByCity(string $cityName): WeatherInterface;
}
