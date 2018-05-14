<?php

namespace App\API\v1\Controllers;

use App\API\v1\Transformers\WeatherTransformer;
use App\Factories\WeatherSourcesFactory;
use Dingo\Api\Routing\Helpers;
use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Class WeatherController
 * @package App\API\v1\Controllers
 */
class WeatherController extends BaseController
{
    use Helpers;

    /**
     * @var WeatherSourcesFactory
     */
    private $factory;

    /**
     * WeatherController constructor.
     * @param WeatherSourcesFactory $factory
     */
    public function __construct(WeatherSourcesFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param $service
     * @param $city
     * @return \Dingo\Api\Http\Response
     */
    public function getByCity($service, $city)
    {

        $source = $this->factory->createSource($service);

        $weather = $source->getWeatherByCity($city);

        return $this->response->item($weather, new WeatherTransformer());
    }
}
