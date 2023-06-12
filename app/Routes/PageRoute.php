<?php

use App\Engine\Libraries\Router;


$router = Router::getInstance();

$router->get('page/contact', function($req, $res) {
    $res->render('contact');
});

$router->get('page/new',                'PageController@new', ['Middlewares/checkAdmin']);
$router->post('page',                   'PageController@create', ['Middlewares/checkAdmin']);
$router->get('page',                    'PageController@index', ['Middlewares/checkAdmin']);

$router->get('site-management', function($req, $res)
{
    $files = [];
    $dir = dirname(APPROOT) . "/public/assets/tinyeditor/filemanager/files/videos";
    if (is_dir($dir)) $files = glob("{$dir}/*.mp4");
    
    return $res->render('video_instructions', [
        'files' => $files
    ]);
}, ['Middlewares/checkAdmin']);

$router->get('page/(:segment)',         'PageController@show');
$router->get('page/(:segment)/edit',    'PageController@edit', ['Middlewares/checkAdmin']);
$router->put('page/(:segment)',         'PageController@update', ['Middlewares/checkAdmin']);
$router->patch('page/(:segment)',       'PageController@update', ['Middlewares/checkAdmin']);
$router->delete('page/(:segment)',      'PageController@delete', ['Middlewares/checkAdmin']);
        
