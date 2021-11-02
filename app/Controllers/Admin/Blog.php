<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\BlogModel;

class Blog extends BaseController
{
protected $BlogModel;

    public function __construct()
    {
        $this->BlogModel = new BlogModel();
    }

    public function index()
    {
        {
            $data = [
            'title' => 'Daftar Blog',
            'blog' => $this->BlogModel->getBlog()
        ];
    
        return view('dashboard/pages/blogs', $data,);
        }
    }
    
}