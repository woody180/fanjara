<?php

use App\Engine\Libraries\Router;


$router = Router::getInstance();

$router->get('language/switch/(:alpha)', function($req, $res) {
    $languageCode = urlSegments('last', TRUE);
    App\Engine\Libraries\Languages::switch($languageCode);
    
    $prevUrl = explode('/', getFlashData('previous_url'));
    array_shift($prevUrl);
    array_unshift($prevUrl, $languageCode);
    $newurl = join('/',$prevUrl);
    
    return $res->redirect(URLROOT . "/{$newurl}");
});