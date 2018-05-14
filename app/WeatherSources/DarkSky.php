<?php
/**
 * Created by PhpStorm.
 * User: zmotso
 * Date: 14.05.18
 * Time: 21:44
 */

namespace App\WeatherSources;

use App\Models\Weather;
use App\Models\WeatherInterface;

/**
 * Class DarkSky
 * @package App\WeatherSources
 */
class DarkSky extends WeatherSource
{

    /**
     * @param string $cityName
     * @return WeatherInterface
     * @todo implement darksky api call
     */
    public function getWeatherByCity(string $cityName): WeatherInterface
    {

        return new Weather(
            20,
            900,
            60,
            3.3
        );
    }
}
