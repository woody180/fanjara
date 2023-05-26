<?php

use App\Engine\Libraries\Router;


$router = Router::getInstance();

$router->get('productcategory/list',               'ProductcategoryController@list', ['Middlewares/checkAdmin']);
$router->get('productcategory/new',                'ProductcategoryController@new', ['Middlewares/checkAdmin']);
$router->post('productcategory',                   'ProductcategoryController@create', ['Middlewares/checkAdmin']);
$router->get('productcategory',                    'ProductcategoryController@index');
$router->get('productcategory/(:segment)',         'ProductcategoryController@show');
$router->get('productcategory/(:segment)/edit',    'ProductcategoryController@edit', ['Middlewares/checkAdmin']);
$router->put('productcategory/(:segment)',         'ProductcategoryController@update', ['Middlewares/checkAdmin']);
$router->patch('productcategory/(:segment)',       'ProductcategoryController@update', ['Middlewares/checkAdmin']);
$router->delete('productcategory/(:segment)',      'ProductcategoryController@delete', ['Middlewares/checkAdmin']);
        