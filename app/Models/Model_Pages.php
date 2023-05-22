<?php
        
class Model_Pages extends RedBean_SimpleModel {

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
        $page = R::dispense('page');
        $page->import([
            'title' => 'title',
            'url' => 'url',
            'description' => 'description',
            'thumbnail' => 'thumbnail',
            'body' => 'body',
            'createdat' => 'createdat'
        ]);
        R::store($page);
    }
    
    
    
    public function getPage($url)
    {
        if (is_string($url)) return R::findOne ('page', 'url = ?', [$url]) ?? abort();
        return R::findOne('page', 'id = ?', [$url]) ?? abort();
    }
    
    
    public function list()
    {
        $totalPages = R::count('page');
        $currentPage = $_GET["page"] ?? 1;
        if ($currentPage < 1 OR $currentPage > $totalPages) $currentPage = 1;
        $limit = 12;
        $offset = ($currentPage - 1) * $limit;  
        $pagingData = pager([
            'total' => $totalPages,
            'limit' => $limit,
            'current' => $currentPage
        ]); 
        $pages = R::find("page", "order by timestamp id desc $limit offset $offset");
        
        $obj = new stdClass();
        $obj->pager = $totalPages > $limit ? $pagingData : null;
        $obj->data = $pages;
        
        return $obj;
    }
}