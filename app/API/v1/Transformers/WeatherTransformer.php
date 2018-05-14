<?php
/**
 * Created by PhpStorm.
 * User: zmotso
 * Date: 14.05.18
 * Time: 20:41
 */

namespace App\API\v1\Transformers;


use App\Models\Weather;
use League\Fractal\TransformerAbstract;

/**
 * Class WeatherTransformer
 * @package App\API\v1\Transformers
 */
class WeatherTransformer extends TransformerAbstract
{
    /**
     * @param Weather $weather
     * @return array
     */
    public function transform(Weather $weather)
    {
        return [
            'temperature' => $weather->getTemperature(),
            'pressure' => $weather->getPressure(),
            'humidity' => $weather->getHumidity(),
            'wind' => $weather->getWind()
        ];
    }
}