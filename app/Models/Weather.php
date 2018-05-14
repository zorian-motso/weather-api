<?php
/**
 * Created by PhpStorm.
 * User: zmotso
 * Date: 14.05.18
 * Time: 21:14
 */

namespace App\Models;

/**
 * Class Weather
 * @package App\Models
 */
class Weather implements WeatherInterface
{

    /**
     * @var float
     */
    protected $temperature;

    /**
     * @var float
     */
    protected $pressure;

    /**
     * @var float
     */
    protected $humidity;

    /**
     * @var float
     */
    protected $wind;

    /**
     * Weather constructor.
     * @param float $temperature
     * @param float $pressure
     * @param float $humidity
     * @param float $wind
     */
    public function __construct(
        float $temperature,
        float $pressure,
        float $humidity,
        float $wind
    )
    {
        $this->temperature = $temperature;
        $this->pressure = $pressure;
        $this->humidity = $humidity;
        $this->wind = $wind;
    }

    /**
     * @return int
     */
    public function getTemperature(): float
    {
        return $this->temperature;
    }

    /**
     * @return mixed
     */
    public function getPressure(): float
    {
        return $this->pressure;
    }

    /**
     * @return mixed
     */
    public function getHumidity(): float
    {
        return $this->humidity;
    }

    /**
     * @return mixed
     */
    public function getWind(): float
    {
        return $this->wind;
    }
}
