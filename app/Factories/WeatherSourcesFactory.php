<?php
/**
 * Created by PhpStorm.
 * User: zmotso
 * Date: 14.05.18
 * Time: 21:29
 */

namespace App\Factories;


use App\WeatherSources\DarkSky;
use App\WeatherSources\OpenWeatherMap;
use App\WeatherSources\Sinoptik;
use App\WeatherSources\WeatherSourceInterface;
use Illuminate\Contracts\Config\Repository;

class WeatherSourcesFactory
{

    const OPEN_WEATHER_MAP = 'openweathermap';

    const DARK_SKY = 'darksky';

    const SINOPTIK = 'sinoptik';

    private $config;

    /**
     * WeatherSourcesFactory constructor.
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $type
     * @return WeatherSourceInterface
     */
    public function createSource(string $type): WeatherSourceInterface
    {
        switch ($type) {
            case self::OPEN_WEATHER_MAP:
                return new OpenWeatherMap($this->getConfig(self::OPEN_WEATHER_MAP));
            case self::DARK_SKY:
                return new Sinoptik();
            case self::SINOPTIK:
                return new DarkSky();
            default:
                throw new \InvalidArgumentException("$type is not a valid");
        }
    }

    /**
     * @param string $key
     * @return string
     */
    protected function getConfig(string $key): string
    {
        $token = $this->config->get("weather-services.$key.token");
        if ($token === null) {
            throw new \UnexpectedValueException('Config was not found');
        }
        return $token;
    }
}
