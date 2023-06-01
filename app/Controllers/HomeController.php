<?php namespace App\Controllers;

class HomeController {
    
    public function index($req, $res) {
        
        $pc = initModel('productcategory')->list();
        $pc = array_values($pc);
        
        $res->render('welcome', [
            'categories' => $pc
        ]);
    }
}