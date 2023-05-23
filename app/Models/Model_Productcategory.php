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
    
    
    public function categoryProducts(string $url)
    {
        $category = R::findOne('productcategory', 'url = ?', [$url]) ?? abort();
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
        $product = $category->with("order by id desc limit $limit offset $offset")->sharedProduct;
        
        $obj = new stdClass();
        $obj->pager = $totalPages > $limit ? $pagingData : null;
        $obj->data = $product;
        
        return $obj;
    }
}