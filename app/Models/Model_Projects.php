<?php
        
use Cocur\Slugify\Slugify;

class Model_Projects extends RedBean_SimpleModel {

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
    
    
    
    public function projectsList() {
        $totalPages = R::count('projects', 'lang = ?', [$_SESSION['lang']]);
        $currentPage = $_GET["page"] ?? 1;
        if ($currentPage < 1 OR $currentPage > $totalPages) $currentPage = 1;
        $limit = 12;
        $offset = ($currentPage - 1) * $limit;  
        $pagingData = pager([
            'total' => $totalPages,
            'limit' => $limit,
            'current' => $currentPage
        ]); 
        $pages = R::find("projects", "lang = ? order by id desc limit $limit offset $offset", [$_SESSION['lang']]);
        
        $obj = new stdClass();
        $obj->pager = $totalPages > $limit ? $pagingData : null;
        $obj->data = $pages;
        
        return $obj;
    }
    
    
    
    public function getProjet($id)
    {
        if (is_numeric($id)) return R::findOne ('projects', 'id = ? and lang = ?', [$id, $_SESSION['lang']]) ?? abort();
        return R::findOne ('projects', 'url = ? and lang = ?', [$id, $_SESSION['lang']]) ?? abort();
    }
    
    
    
    public function save($data) {
        
        $slugify = new Slugify();
        
        $projects = R::dispense('projects');
        
        $projects->title = $data['title'];
        $projects->url = $slugify->slugify($data['title']);
        $projects->cover = $data['cover'];
        $projects->gallery = $data['gallery'];
        $projects->lang = $data['lang'];
        
        return R::store($projects);
    }
}