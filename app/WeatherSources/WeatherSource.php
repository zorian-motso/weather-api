<?php
/**
 * Created by PhpStorm.
 * User: zmotso
 * Date: 14.05.18
 * Time: 21:13
 */

namespace App\WeatherSources;

use GuzzleHttp\ClientInterface;

/**
 * Class WeatherSource
 * @package App\WeatherSources
 */
abstract class WeatherSource implements WeatherSourceInterface
{
    /**
     * @return ClientInterface
     */
    protected function getClient(): ClientInterface
    {
        return new \GuzzleHttp\Client();
    }
}
