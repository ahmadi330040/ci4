<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $KomikModel;

    public function __construct()
    {
        $this->KomikModel = new KomikModel();
    }
    public function index()
    {
        // $data = $this->KomikModel->findAll();

        $data = [
        'title' => 'Daftar Komik',
        'komik' => $this->KomikModel->getKomik()
    ];

    return view('komik/index', $data,);
    }


    public function detail($slug) 
    {
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->KomikModel->getKomik($slug)
        ];
        return view('komik/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Komik'
        ];

        return view('komik/create', $data);
    }

}
