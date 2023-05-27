<?php namespace App\Controllers;

use  App\Engine\Libraries\Validation;
use \R as R;

class SliderController {
    
    
    // Add new view
    public function new($req, $res) {
        return $res->render('admin/slider/new');
    }


    // Create view
    public function create($req, $res) {
        $validation = new Validation();
        
        // Get request data
        $body = $req->body();

        // Valdiate request data
        $errors = $validation
                ->with($body)
                ->rules([
                    'title|Title' => 'string|max[200]',
                    'url|url' => 'valid_url',
                    'description|Description' => 'min[3]|string|max[300]',
                    'slide|Slide' => 'required|min[3]|string|max[300]',
                ])
                ->validate();
        
        
        if (!empty($errors))
        {
            setFlashData('error', $errors);
            setForm($body);
            return $res->redirect(baseUrl("slider/new"));
        }
        
        $slideID = initModel('slider')->save($body);
        if ($slideID)
        {
            $slide = R::load('slider', $slideID);
            if ($_SESSION['lang'] != $slide->lang) $_SESSION['lang'] = $slide->lang;
            
            setFlashData('success', 'Slider added successfully');
            return $res->redirect(baseUrl("slider"));
        }
    }


    // All items
    public function index($req, $res)
    {
        return $res->render('admin/slider/list', [
            'slides' => initModel('slider')->listPaging()
        ]);
    }


    // Show view
    public function show($req, $res) {
        $id = $req->getSegment(2);
    }


    // Edit view
    public function edit($req, $res) {
        return $res->render('admin/slider/edit', [
            'slide' => initModel('slider')->getOne($req->getSegment(2))
        ]);
    }


    // Update
    public function update($req, $res) {
        $validation = new Validation();
        
        // Get request data
        $body = $req->body();

        // Valdiate request data
        $errors = $validation
                ->with($body)
                ->rules([
                    'title|Title' => 'min[3]|string|max[200]',
                    'url|url' => 'valid_url',
                    'description|Description' => 'min[3]|string|max[300]',
                    'slide|Slide' => 'required|min[3]|string|max[300]',
                ])
                ->validate();
        
        
        if (!empty($errors))
        {
            setFlashData('error', $errors);
            setForm($body);
            return $res->redirect(baseUrl("slider/{$req->getSegment(2)}/edit"));
        }
        
        
        $slide = initModel('slider')->getOne($req->getSegment(2));
        $slide->import($body);
        R::store($slide);
        
        if ($_SESSION['lang'] != $body['lang']) $_SESSION['lang'] = $body['lang'];
        
        return $res->redirect(baseUrl("slider/{$req->getSegment(2)}/edit"));
    }


    // Delete
    public function delete($req, $res) {
        initModel('slider');
        R::trash('slider', $req->getSegment(2));
        return $res->redirect(baseUrl("slider"));
    }

}