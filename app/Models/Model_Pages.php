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
    
    
    
    public function getPage($url) {
        if (is_string($url)) return R::findOne ('page', 'url = ?', [$url]) ?? abort();
        return R::findOne('page', 'id = ?', [$url]) ?? abort();
    }
}