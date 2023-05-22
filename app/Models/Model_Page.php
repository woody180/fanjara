<?php
        
class Model_Page extends RedBean_SimpleModel {

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
        if (is_string($url)) return R::findOne ('page', 'url = ? and lang = ?', [$url, $_SESSION['lang']]) ?? abort();
        return R::findOne('page', 'id = ? and lang = ?', [$url, $_SESSION['lang']]) ?? abort();
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
        $pages = R::find("page", "order by id desc limit $limit offset $offset");
        
        $obj = new stdClass();
        $obj->pager = $totalPages > $limit ? $pagingData : null;
        $obj->pages = $pages;
        
        return $obj;
    }
    
    
    
    public function save($body)
    {
        $slugify = new Cocur\Slugify\Slugify();    
        
        $page_placeholder = file_get_contents(APPROOT . "/Views/admin/placeholder_layouts/page_body_placeholder.html");
        
        $page = R::dispense('page');
        $page->title = $body['title'];
        $page->url = empty($body['url']) ? $slugify->slugify($body['title']) :  $slugify->slugify($body['url']);
        $page->description = $body['description'];
        $page->body = $page_placeholder;
        $page->lang = $body['lang'];
        $page->createdat = time();
        
        return R::store($page); // Returns page ID
    }
}