<?php namespace App\Controllers;

use App\Engine\Libraries\Validation;
use App\Engine\Libraries\ImageResize\ImageResize;
use Cocur\Slugify\Slugify;
use \R as R;


class ProductController {
    
    // Add new view
    public function new($req, $res) {
        
        return $res->render('admin/products/new');
    }


    // Create
    public function create($req, $res)
    {
        initModel('product');
        
        $body = $req->body();
        $body['thumbnail'] = $req->files('thumbnail')->show();
        
        $validation = new Validation();
        $errors = $validation
            ->with($body)
            ->rules([
                'title|Title' => 'required|string|max[100]',
                'url|Url' => 'min[4]|max[20]|valid_url',
                'thumbnail|Thumbnail' => 'required|ext[jpg,jpeg,png,webp]',
                'gallery|Gallery' => 'string|max[400]',
                'body|Content' => 'string|max[500]',
                'constructorurl|Calculation url' => 'valid_url|max[500]',
                'productcategory|Product category' => 'required|numeric|max[3]',
                'lang|Lanugage' => 'min[2]|max[3]|alpha'
            ])
            ->validate();
        
        unset($body['productcategory']);
        unset($body['thumbnail']);
        
        // If errors
        if (!empty($errors)) {
            setFlashData('error', $errors);
            setForm($body);
            return $res->redirect(baseUrl("product/new"));
        }
        
        
        // Working with url
        $slugify = new Slugify();
        if (empty($body['url'])) {
            $body['url'] = $slugify->slugify($req->body('title'));
        } else {
            $body['url'] = $slugify->slugify($body['url']);
        }
        
        
        
        // Upload files
        $filePath = dirname(APPROOT) . "/public/assets/tinyeditor/filemanager/files/thumbnails";
        $image = $req->files('thumbnail')->upload($filePath);
        $body['thumbnail'] = explode('files/', $image)[1];
        
        // Resize image
        $resImage = new ImageResize($image);
        $resImage->quality_jpg = 75;
        $resImage->resizeToLongSide(400);
        $resImage->save($image);
        
        
        ///////////////////// Save product /////////////////////
        $page_placeholder = file_get_contents(APPROOT . "/Views/admin/placeholder_layouts/page_body_placeholder.html");
        $body['body'] = $page_placeholder;
        $product = R::dispense('product');
        $product->import($body);
        $category = R::load('productcategory', $req->body('productcategory'));
        $product->sharedProductcategoryList[] = $category;
        
        $body['createdat'] = time();
        $body['updatedat'] = time();
        
        $pID = R::store($product);
        
        $product = R::load('product', $pID);
        if ($product->lang != $_SESSION['lang']) $_SESSION['lang'] = $product->lang;
        /////////////////////////////////////////////////////////
        
        
        $message = \App\Engine\Libraries\Languages::translate([
            'en' => 'Product has been saved successfully.',
            'ge' => 'პროდუქტი იქნა შენახული წარმატებით.',
            'ru' => 'Продукт был успешно сохранен.'
        ]);
        setFlashData('success', $message);
        return $res->redirect(baseUrl('productlist'));
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
    public function show($req, $res)
    {
        return $res->render('products/product', [
            'product' => initModel('product')->show($req->getSegment(2))
        ]);
    }


    // Edit view
    public function edit($req, $res) {
        
        initModel('product');
        
        return $res->render("admin/products/edit", [
            'product' => R::findOne('product', 'id = ?', [$req->getSegment(2)]) ?? abort()
        ]);
    }


    // Update
    public function update($req, $res) {
                
        initModel('product');
        
        $id = $req->getSegment(2);
        
        $body = $req->body();
        $body['thumbnail'] = ($req->files('thumbnail')->show('error') === 0) ? $req->files('thumbnail')->show() : $body['thumbnail'];
        
        $validation = new Validation();
        $errors = $validation
            ->with($body)
            ->rules([
                'title|Title' => 'required|string|max[100]',
                'url|Url' => 'min[4]|max[20]|valid_url',
                'thumbnail|Thumbnail' => 'required|ext[jpg,jpeg,png,webp]',
                'gallery|Gallery' => 'string|max[400]',
                'body|Content' => 'string|max[500]',
                'constructorurl|Calculation url' => 'valid_url|max[500]',
                'productcategory|Product category' => 'required|numeric|max[3]',
                'lang|Lanugage' => 'min[2]|max[3]|alpha'
            ])
            ->validate();
        
        unset($body['productcategory']);
        
        $product = R::findOne('product', 'id = ?', [$id]);
        
        // If errors
        if (!empty($errors)) {
            setFlashData('error', $errors);
            setForm($body);
            return $res->redirect(baseUrl("product/{$product->id}/edit"));
        }
        
        
        // Working with url
        $slugify = new Slugify();
        if (empty($body['url'])) {
            $body['url'] = $slugify->slugify($req->body('title'));
        } else {
            $body['url'] = $slugify->slugify($body['url']);
        }

        
        
        // Upload thumbnail
        // Check if file not exists
        if ($req->files('thumbnail')->show('error') === 0)
        {
            $filePath = dirname(APPROOT) . "/public/assets/tinyeditor/filemanager/files/thumbnails";
            $image = $req->files('thumbnail')->upload($filePath);
            $body['thumbnail'] = explode('files/', $image)[1];

            // Resize image
            $resImage = new ImageResize($image);
            $resImage->quality_jpg = 75;
            $resImage->resizeToLongSide(400);
            $resImage->save($image);
        }
        
        // Get product
        $product->import($body);
        $product->sharedProductcategory = [];
        $product->sharedProductcategoryList[] = R::findOne('productcategory', 'id = ?', [$req->body('productcategory')]);
        R::store($product);
        
        if ($_SESSION['lang'] != $body['lang']) $_SESSION['lang'] = $body['lang'];
        
        setFlashData('success', \App\Engine\Libraries\Languages::translate([
            'ge' => 'პროდუქტი წარმატებით განახლდას.',
            'en' => 'Product updated successfully.',
            'ru' => 'Продукт успешно обновлен.'
        ]));
        
        return $res->redirect(baseUrl("product/{$product->id}/edit"));
    }


    // Delete
    public function delete($req, $res) {
        $id = $req->getSegment(2);
        
        initModel('product');
        
        R::trash('product', $id);
        
        return $res->redirect(baseUrl("productlist"));
    }

}