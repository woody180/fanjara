<?php
        
class Model_Installer extends RedBean_SimpleModel {

    public function open() {
        
    }

    public function dispense() {
        
    }

    public function update() {
        
    }

    public function after_update() {
        
    }

    public function delete() {
        
    }

    public function after_delete() {
        
    }
    
    
    public function migrate()
    {
        R::exec('SET FOREIGN_KEY_CHECKS = 0;');
        R::nuke();
        
        // Create pages table
        $page = R::dispense('page');
        $page->import([
            'title' => 'title',
            'url' => 'url',
            'description' => 'description',
            'thumbnail' => 'thumbnail',
            'body' => 'body',
            'createdat' => 'createdat',
            'lang' => 'lg'
        ]);
        R::store($page);
        R::trash('page', 1);
        
        
        // Create articles & categories table
        $category = R::dispense('categories');
        $article = R::dispense('articles');
        
        $category->import([
            'title' => 'title',
            'url' => 'url',
            'banner' => 'banner',
            'description' => 'description'
        ]);
        
        $article->import([
            'title' => 'title',
            'url' => 'url',
            'thumbnail' => 'thumbnail',
            'body' => 'body',
            'createdat' => time(),
            'updatedat' => time()
        ]);
        $article->sharedCategoriesList[] = $category;
        R::store($article);
        R::trash('categories', 1);
        R::trash('article', 1);
        
        
        
        // Create products & product category tables
        $product = R::dispense('product');
        $pCategory = R::dispense('productcategory');
        
        $pCategory->import([
            'title' => 'title',
            'url' => 'url',
            'banner' => 'banner',
            'description' => 'description',
            'parentid' => 1
        ]);
        
        $product->import([
            'title' => 'title',
            'url' => 'url',
            'price' => 200,
            'thumbnail' => 'thumbnail',
            'gallery' => 'gallery',
            'body' => 'body',
            'constructorurl' => 'contructorurl',
            'lang' => 'lg',
            'createdat' => time(),
            'updatedat' => time()
        ]);
        
        $product->sharedProductcategoryList[] = $pCategory;
        R::store($product);
        
        R::trash('product', 1);
        R::trash('productcategory', 1);
    }
}