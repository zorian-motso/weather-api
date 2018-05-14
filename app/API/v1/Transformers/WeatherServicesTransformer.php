<?php
/**
 * Created by PhpStorm.
 * User: zmotso
 * Date: 14.05.18
 * Time: 20:41
 */

namespace App\API\v1\Transformers;

use League\Fractal\TransformerAbstract;

/**
 * Class WeatherServicesTransformer
 * @package App\API\v1\Transformers
 */
class WeatherServicesTransformer extends TransformerAbstract
{
    /**
     * @param $service
     * @return array
     */
    public function transform($service)
    {
        return [
            'name' => $service->name
        ];
    }
}