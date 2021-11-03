<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Aplikasi Pulsa & PPOB My Pay',
        ];
        return view('website/pages/home', $data);
    }

    public function produk()
    {
        $data = [
            'title' => 'Produk'
        ];
        return view('website/pages/produk', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'Contact'
        ];
        return view('website/pages/contact', $data);
    }
    public function panduan()
    {
        $data = [
            'title' => 'Panduan'
        ];
        return view('website/pages/panduan', $data);
    }
    public function blog()
    {
        $data = [
            'title' => 'Blogs'
        ];
        return view('website/pages/blog', $data);
    }
    public function blogDetail()
    {
        $data = [
            'title' => 'Blogs'
        ];
        return view('website/pages/blog-detail', $data);
    }
}
