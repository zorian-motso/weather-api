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
 * Class OpenWeatherMap
 * @package App\WeatherSources
 */
class OpenWeatherMap extends WeatherSource
{

    /**
     * @var string
     */
    private $token;

    /**
     * OpenWeatherMap constructor.
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @param string $cityName
     * @return WeatherInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @todo refactoring
     */
    public function getWeatherByCity(string $cityName): WeatherInterface
    {

        $response = $this->getClient()->request(
            'GET',
            'https://samples.openweathermap.org/data/2.5/weather',
            [
                'query' => [
                    'q' => $cityName,
                    'appid' => $this->token
                ]
            ]
        );

        $data = json_decode($response->getBody()->getContents(), true);
        if (!isset($data['main']) || !isset($data['wind'])) {
            throw new \UnexpectedValueException('Data was not found');
        }

        return new Weather(
            $this->convertToCelsius($data['main']['temp']),
            $data['main']['pressure'],
            $data['main']['humidity'],
            $data['wind']['speed']
        );
    }

    /**
     * @param float $temp
     * @return float
     */
    protected function convertToCelsius(float $temp): float
    {
        return (float)($temp - 273.15);
    }
}
