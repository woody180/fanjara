<?php namespace App\Controllers;

use \R as R;

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
        initModel('productcategory');
        
        $cat = R::findOne('productcategory', 'url = ?', [$req->getSegment(2)]);
        $catID = $cat->id;
        
        
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
        