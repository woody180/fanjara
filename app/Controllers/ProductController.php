<?php namespace App\Controllers;



class ProductController {
    
    // Add new view
    public function new($req, $res) {
        
    }


    // Create
    public function create($req, $res) {
       
    }


    // All items
    public function index($req, $res) {
        echo 'All products';
    }
    
    
    // Product list for admins
    public function proudctList($req, $res)
    {
        return $res->render('admin/products/products', [
            'products' => initModel('product')->list()
        ]);
    }


    // Show view
    public function show($req, $res) {
        $id = $req->getSegment(2);
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
        