<?php
        
class Model_Slider extends RedBean_SimpleModel {

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
        return R::find('slider', 'order by id desc');
    }
    
    
    public function getOne($id) {
        if (is_numeric($id)) return R::findOne ('slider', 'id = ? and lang = ?', [$id, $_SESSION['lang']]) ?? abort();
        return R::findOne ('slider', 'url = ? and lang = ?', [$id, $_SESSION['lang']]) ?? abort();
    }



    public function listPaging()
    {
        $totalPages = R::count('slider', 'lang = ?', [$_SESSION['lang']]);
        $currentPage = $_GET["page"] ?? 1;
        if ($currentPage < 1 OR $currentPage > $totalPages) $currentPage = 1;
        $limit = 12;
        $offset = ($currentPage - 1) * $limit;  
        $pagingData = pager([
            'total' => $totalPages,
            'limit' => $limit,
            'current' => $currentPage
        ]); 
        $pages = R::find("slider", "lang = ? order by id desc limit $limit offset $offset", [$_SESSION['lang']]);
        
        $obj = new stdClass();
        $obj->pager = $totalPages > $limit ? $pagingData : null;
        $obj->data = $pages;
        return $obj;
    }



    public function save($body)
    {
        $slider = R::dispense('slider');
        $slider->import($body);
        return R::store($slider);
    }
}