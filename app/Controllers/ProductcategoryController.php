<?php namespace App\Controllers;



class ProductcategoryController {
    
    // Add new view
    public function new($req, $res) {
        
    }


    // Create view
    public function create($req, $res) {
       
    }


    // All items
    public function index($req, $res) {
        
    }


    // Show view
    public function show($req, $res)
    {
        return $res->render('products/list', [
            'products' => initModel('Productcategory')
                ->categoryProducts($req->getSegment(2))
        ]);
    }


    // Edit view
    public function edit($req, $res) {
        $id = $req->getSegment(2);
    }


    // Update
    public function update($req, $res) {
        $id = $req->getSegment(2);
    }


    // Delete
    public function delete($req, $res) {
        $id = $req->getSegment(2);
    }

}
        