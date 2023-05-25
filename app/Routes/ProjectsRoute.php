<?php

use App\Engine\Libraries\Router;


$router = Router::getInstance();

$router->get('projects/new',                'ProjectsController@new', ['Middlewares/checkAdmin']);
$router->post('projects',                   'ProjectsController@create', ['Middlewares/checkAdmin']);
$router->get('projects',                    'ProjectsController@index');
$router->get('projects/(:segment)',         'ProjectsController@show');
$router->get('projects/(:segment)/edit',    'ProjectsController@edit', ['Middlewares/checkAdmin']);
$router->put('projects/(:segment)',         'ProjectsController@update', ['Middlewares/checkAdmin']);
$router->patch('projects/(:segment)',       'ProjectsController@update', ['Middlewares/checkAdmin']);
$router->delete('projects/(:segment)',      'ProjectsController@delete', ['Middlewares/checkAdmin']);