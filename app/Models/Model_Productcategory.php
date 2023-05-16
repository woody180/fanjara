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
        return R::find('productcategory', 'order by id desc');
    }
}