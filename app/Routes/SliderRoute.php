<?php

use App\Engine\Libraries\Router;


$router = Router::getInstance();

$router->get('slider/new',                'SliderController@new', ['Middlewares/checkAdmin']);
$router->post('slider',                   'SliderController@create', ['Middlewares/checkAdmin']);
$router->get('slider',                    'SliderController@index', ['Middlewares/checkAdmin']);
$router->get('slider/(:segment)',         'SliderController@show');
$router->get('slider/(:segment)/edit',    'SliderController@edit', ['Middlewares/checkAdmin']);
$router->put('slider/(:segment)',         'SliderController@update', ['Middlewares/checkAdmin']);
$router->patch('slider/(:segment)',       'SliderController@update', ['Middlewares/checkAdmin']);
$router->delete('slider/(:segment)',      'SliderController@delete', ['Middlewares/checkAdmin']);
        