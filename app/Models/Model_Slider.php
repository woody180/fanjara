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






    public function save($body)
    {
        $slider = R::dispense('slider');
        $slider->import($body);
        return R::store($slider);
    }
}