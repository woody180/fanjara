<?php
        
class Model_Product extends RedBean_SimpleModel {

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
        $totalPages = R::count('product');
        $currentPage = $_GET["page"] ?? 1;
        if ($currentPage < 1 OR $currentPage > $totalPages) $currentPage = 1;
        $limit = 12;
        $offset = ($currentPage - 1) * $limit;  
        $pagingData = pager([
            'total' => $totalPages,
            'limit' => $limit,
            'current' => $currentPage
        ]); 
        $data = R::find("product", "order by id DESC limit $limit offset $offset");
        
        $obj = new stdClass();
        $obj->pager = $pagingData;
        $obj->data = $data;
        
        return $obj;
    }
}