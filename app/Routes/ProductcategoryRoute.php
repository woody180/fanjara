<?php

use App\Engine\Libraries\Router;


$router = Router::getInstance();

$router->get('productcategory/new',                'ProductcategoryController@new');
$router->post('productcategory',                   'ProductcategoryController@create');
$router->get('productcategory',                    'ProductcategoryController@index');
$router->get('productcategory/(:segment)',         'ProductcategoryController@show');
$router->get('productcategory/(:segment)/edit',    'ProductcategoryController@edit');
$router->put('productcategory/(:segment)',         'ProductcategoryController@update');
$router->patch('productcategory/(:segment)',       'ProductcategoryController@update');
$router->delete('productcategory/(:segment)',      'ProductcategoryController@delete');
        