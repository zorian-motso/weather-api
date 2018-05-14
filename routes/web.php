<?php

/** @var \Dingo\Api\Routing\Router $api */
$api = app('Dingo\Api\Routing\Router');


$api->version('v1', function ($api) {

    /** @var \Dingo\Api\Routing\Router $api */
    $api->group(['prefix' => 'v1'], function ($api) {

        /** @var \Dingo\Api\Routing\Router $api */
        $api->get('/', function () {
            return ['api_version' => 1];
        });

        $api->get('/services', 'App\API\v1\Controllers\ServicesController@get');

        $api->get('/services/{service}/{city}', 'App\API\v1\Controllers\WeatherController@getByCity');

    });

    $api->group(['prefix' => 'v2'], function ($api) {
        /** @var \Dingo\Api\Routing\Router $api */
        $api->get('/', function () {
            return ['api_version' => 2];
        });

    });

});
