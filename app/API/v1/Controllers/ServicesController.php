<?php

namespace App\API\v1\Controllers;

use App\API\v1\Transformers\WeatherServicesTransformer;
use App\Http\Controllers\BaseController;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\Collection;

/**
 * Class ServicesController
 * @package App\API\v1\Controllers
 * @todo create models for weather services
 */
class ServicesController extends BaseController
{
    /**
     * @var Repository
     */
    private $config;

    /**
     * ServicesController constructor.
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    /**
     * @return \Dingo\Api\Http\Response
     */
    public function get()
    {
        $services = (new Collection(
            array_keys(
                $this->config->get('weather-services')
            )
        ))->map(function($value) {
            return (object)['name' => $value];
        });

        return $this->response->collection($services, new WeatherServicesTransformer());
    }
}
