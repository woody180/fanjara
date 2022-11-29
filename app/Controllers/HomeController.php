<?php namespace App\Controllers;

class HomeController {
    
    public function index($req, $res) {
        
        
        $fakeData = [
            [
                'img' => 'https://www.okna.ru/local/templates/kaleva/images/new-index/combo-space.webp',
                'title' => 'KALEVA COMBO SPACE'
            ],
            [
                'img' => 'https://www.okna.ru/local/templates/kaleva/images/new-index/combo-vario.webp',
                'title' => 'KALEVA COMBO VARIO'
            ],
            [
                'img' => 'https://www.okna.ru/local/templates/kaleva/images/new-index/space.webp',
                'title' => 'KALEVA SPACE'
            ],
            [
                'img' => 'https://www.okna.ru/local/templates/kaleva/images/new-index/vario.webp',
                'title' => 'KALEVA VARIO'
            ],
            [
                'img' => 'https://www.okna.ru/local/templates/kaleva/images/new-index/titan.webp',
                'title' => 'KALEVA TITAN'
            ],
            [
                'img' => 'https://www.okna.ru/local/templates/kaleva/images/new-index/deco.webp',
                'title' => 'KALEVA DECO'
            ],
            [
                'img' => 'https://www.okna.ru/local/templates/kaleva/images/new-index/design.webp',
                'title' => 'KALEVA DESIGN'
            ],
            [
                'img' => 'https://www.okna.ru/local/templates/kaleva/images/new-index/vita.webp',
                'title' => 'KALEVA VITA'
            ],
            [
                'img' => 'https://www.okna.ru/local/templates/kaleva/images/new-index/standart.webp',
                'title' => 'KALEVA STANDART'
            ]
        ];

        $res->render('welcome', [
            'fakeData' => $fakeData
        ]);
    }
}