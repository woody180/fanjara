<?php

use App\Engine\Libraries\Router;


$router = Router::getInstance();

$router->get('product/new',                'ProductController@new');
$router->post('product',                   'ProductController@create');
$router->get('product',                    'ProductController@index');
$router->get('productlist',                'ProductController@proudctList', ['Middlewares/checkAdmin']);
$router->get('product/(:segment)',         'ProductController@show');
$router->get('product/(:segment)/edit',    'ProductController@edit');
$router->put('product/(:segment)',         'ProductController@update');
$router->patch('product/(:segment)',       'ProductController@update');
$router->delete('product/(:segment)',      'ProductController@delete');
        