<?php

use App\Engine\Libraries\Router;
use \R as R;

$router = Router::getInstance();

$router->patch('save', function($req, $res) {
   
    //return $res->send(['success' => 'this is it']);
    
    
    $model          = initModel('product');
    $fetchedData    = $req->body();
    $content        = $req->body('content');
    $alias          = $req->body('alias') ?? '';
    
    
    // Get table
    $aliasArr       = explode('.', $alias);
    $table          = $aliasArr[0]; // Table name
    $id             = $aliasArr[1]; // Table determinant 
    $row            = $aliasArr[2]; // Row where content is going to be changed
    
    // Find page to be updated
    $page = R::findOne($table, "id = ? and lang = ?", [$id, $_SESSION['lang']]);
    
    
    // If page not found
    if (!$page) return $res->send(['error' => 'Page was not found.']);
    
    
    ///////////// Save base64 image as file /////////////
    // Check if image inside the content
    preg_match_all('/src="data:image(.*)"/', $content, $matches);

    // Generate image name with save location
    $imageSavePath = assetsUrl('/tinyeditor/filemanager/files');

    if (!empty($matches[1])) {
        // Convert base63 to image and save to the provided location with random name
        $savedImagesArray = base64_to_jpeg($matches[1], $imageSavePath);

        // Replace base64 images to real images
        foreach ($savedImagesArray as $src) 
            $content = preg_replace('#(<img\s(?>(?!src=)[^>])*?src=")data:image/(gif|png|jpeg);base64,([\w=+/]++)("[^>]*>)#', "<img src=\"{$src}\" alt=\"\" title=\"\" />", $content);
    }

    // Prepare image src's to save, create absolute path placeholder '%RELEVANT_PATH%'
    $content = relevantpath($content, false);
    ///////////// Save base64 image as file - END /////////////
    
    
    // Update DB
    $page->{$row} = $content;
    R::store($page);
    return $res->send(["success" => "Content has been updated successfully"]);
});