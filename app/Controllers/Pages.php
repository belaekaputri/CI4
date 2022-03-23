<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        // $faker = \Faker\Factory::create(); //digunakan library faker untuk memanggil data random
        //dd($faker->name);
        $data = [
            'title' => 'Pages|Bela Eka Putri'

        ];
        echo view('pages/home', $data);
        //pai ka metho view??? arahkan ka folder(namespace) views method home
    }
    public function about()
    {
        $data = [
            'title' => 'ABOUT|Bela Eka Putri',
            'tes' =>  'bela eka puri'

        ];

        echo view('pages/about', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'at' => [
                [
                    'tipe' => 'rumah',
                    'alamat' => 'Jl Agam no xx',
                    'kota' => 'padang'
                ],
                [
                    'tipe' => 'rumah',
                    'alamat' => 'Jl Pariaman no xx',
                    'kota' => 'padang'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
