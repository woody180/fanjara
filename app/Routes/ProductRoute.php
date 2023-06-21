<?php

use App\Engine\Libraries\Router;


$router = Router::getInstance();

$router->get('product/new',                'ProductController@new', ['Middlewares/checkAdmin']);
$router->post('product',                   'ProductController@create', ['Middlewares/checkAdmin']);
$router->get('product',                    'ProductController@index');
$router->get('productlist',                'ProductController@proudctList', ['Middlewares/checkAdmin']);
$router->put('product/ordering',           'ProductController@ordering', ['Middlewares/checkAdmin']);
$router->get('product/(:segment)',         'ProductController@show');
$router->get('product/(:segment)/edit',    'ProductController@edit', ['Middlewares/checkAdmin']);
$router->put('product/(:segment)',         'ProductController@update', ['Middlewares/checkAdmin']);
$router->patch('product/(:segment)',       'ProductController@update', ['Middlewares/checkAdmin']);
$router->delete('product/(:segment)',      'ProductController@delete', ['Middlewares/checkAdmin']);
        