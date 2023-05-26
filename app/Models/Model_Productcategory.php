<?php
        
class Model_Productcategory extends RedBean_SimpleModel {

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
    
    
    public function list()
    {
        return R::find('productcategory', 'parentid = 0 and lang = ? order by id desc', [$_SESSION['lang']]);
    }
    
    
    public function pagingList()
    {
        $totalPages = R::count('productcategory');
        $currentPage = $_GET["page"] ?? 1;
        if ($currentPage < 1 OR $currentPage > $totalPages) $currentPage = 1;
        $limit = 12;
        $offset = ($currentPage - 1) * $limit;  
        $pagingData = pager([
            'total' => $totalPages,
            'limit' => $limit,
            'current' => $currentPage
        ]); 
        $pages = R::find("productcategory", "lang = ? order by id desc limit $limit offset $offset", [$_SESSION['lang']]);
        
        $obj = new stdClass();
        $obj->pager = $totalPages > $limit ? $pagingData : null;
        $obj->data = $pages;
        
        return $obj;
    }
    
    
    public function categoryProducts(string $url)
    {
        $category = R::findOne('productcategory', 'url = ? and lang = ?', [$url, $_SESSION['lang']]) ?? abort();
        $totalPages = $category->countShared('product');
        $currentPage = $_GET["page"] ?? 1;
        if ($currentPage < 1 OR $currentPage > $totalPages) $currentPage = 1;
        $limit = 12;
        $offset = ($currentPage - 1) * $limit;  
        $pagingData = pager([
            'total' => $totalPages,
            'limit' => $limit,
            'current' => $currentPage
        ]); 
        //$pages = R::find("pages", "order by timestamp asc limit $limit offset $offset");
        $product = $category->with("lang = ? order by id desc limit $limit offset $offset", [$_SESSION['lang']])->sharedProduct;
        
        $obj = new stdClass();
        $obj->pager = $totalPages > $limit ? $pagingData : null;
        $obj->data = $product;
        
        return $obj;
    }
}