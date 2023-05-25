<?php namespace App\Controllers;

use  App\Engine\Libraries\Validation;
use \R as R;

class ProjectsController {
    
    // Add new view
    public function new($req, $res) {
        
        return $res->render('admin/projects/new');
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
                    'title|Title' => 'required|valid_input|min[3]|max[100]',
                    'cover|Projects cover' => 'required|string|max[200]',
                    'gallery|Projects Gallery' => 'required|string|max[2000]',
                    'lang|Language' => 'required|string|max[5]',
                ])
                ->validate();
        
        
        if (!empty($errors)) {
            setFlashData('errors', $errors);
            setForm($body);
            return $res->redirectBack();
        }
        
        if (initModel('projects')->save($body)) {
            setFlashData('success', 'Project with gallery added successfully.');
            return $res->redirectBack();
        }
        
        setFlashData('error', 'Something whent wrong while saving data');
        return $res->redirectBack();
    }


    // All items
    public function index($req, $res) {
       
        return $res->render('project/projects', [
            'projects' => initModel('projects')->projectsList()
        ]);
    }


    // Show view
    public function show($req, $res) {
        return $res->render('project/project', [
            'project' => initModel('projects')->getProjet($req->getSegment(2))
        ]);
    }


    // Edit view
    public function edit($req, $res) {
        return $res->render('admin/projects/edit', [
            'project' => initModel('projects')->getProjet($req->getSegment(2))
        ]);
    }


    // Update
    public function update($req, $res) {
        
        $project = initModel('projects')->getProject($req->getSegment(2));
        $project->import($req->body());
        R::store($project);

        return $res->redirectBack();
    }


    // Delete
    public function delete($req, $res) {
        $id = $req->getSegment(2);
    }

}