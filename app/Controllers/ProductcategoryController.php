<?php namespace App\Controllers;

use \R as R;
use  App\Engine\Libraries\Validation;
use Cocur\Slugify\Slugify;

class ProductcategoryController {

    
    public function list($req, $res)
    {   
        return $res->render('admin/product_categories/list', [
            'categories' => initModel('productcategory')->pagingList()
        ]);
    }

    
    // Add new view
    public function new($req, $res)
    {
        return $res->render('admin/product_categories/new');
    }


    // Create view
    public function create($req, $res)
    {
        $validation = new Validation();
        
        // Get request data
        $body = $req->body();

        // Valdiate request data
        $errors = $validation
                ->with($body)
                ->rules([
                    'title|Title' => 'required|string|min[3]|max[150]',
                    'description|Description' => 'string|max[350]',
                    'banner|Banner' => 'required|string|min[2]|max[350]',
                    'lang|Language' => 'required|min[1]|max[5]|valid_input'
                ])
                ->validate();
    
        
        if (!empty($errors)) {
            setForm($body);
            setFlashData('error', $errors);
            return $res->redirectBack();
        }
        
        
        // Save
        if (initModel('Productcategory')->save($body)) {
            setFlashData('success', 'Product category added successfully.');
            return $res->redirect(baseUrl("productcategory/list"));
        }
        
        setFlashData('danger', 'Something went wrong!..');
        return $res->redirect(baseUrl("productcategory/list"));
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
        
        return $res->render('admin/product_categories/edit', [
            'category' => initModel('productcategory')->getProductCategory($req->getSegment(2))
        ]);
    }


    // Update
    public function update($req, $res)
    {    
        $validation = new Validation();
        
        // Get request data
        $body = $req->body();

        // Valdiate request data
        $errors = $validation
                ->with($body)
                ->rules([
                    'title|Title' => 'required|string|min[3]|max[150]',
                    'description|Description' => 'string|max[350]',
                    'banner|Banner' => 'required|string|min[2]|max[350]',
                    'lang|Language' => 'required|min[1]|max[5]|valid_input'
                ])
                ->validate();
    
        
        if (!empty($errors)) {
            setForm($body);
            setFlashData('error', $errors);
            return $res->redirectBack();
        }
        
        
        $pc = initModel('productcategory')->getProductCategory($req->getSegment(2));
        $slugify = new Slugify();
        $body['url'] = $slugify->slugify($body['title']);
        $pc->import($body);
        R::store($pc);
        
        return $res->redirect(baseUrl("productcategory/list"));
    }


    // Delete
    public function delete($req, $res) {
        initModel('productcategory');
        R::trash('productcategory', $req->getSegment(2));
        
        return $res->redirectBack();
    }

}