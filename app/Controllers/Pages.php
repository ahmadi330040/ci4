<?php

namespace App\Controllers;

use App\Models\PanDepositModel;
use App\Models\PanTransaksiModel;
use App\Models\BlogModel;

class Pages extends BaseController
{

protected $PanDepositModel;
protected $PanTransaksiModel;
protected $BlogModel;

    public function __construct()
    {
        $this->PanDepositModel = new PanDepositModel();
        $this->PanTransaksiModel = new PanTransaksiModel();
        $this->BlogModel = new BlogModel();
    }

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
            'title' => 'Panduan',
            'deposit' => $this->PanDepositModel->getPanduanDeposit(),
            'transaksi' => $this->PanTransaksiModel->getPanduanTransaksi(),
        ];
        return view('website/pages/panduan', $data);
    }
    public function blog()
    {
        $data = [
            'title' => 'Blogs',
            'blog' => $this->BlogModel->getBlog()
        ];
        return view('website/pages/blog', $data);
    }
    public function blogDetail($slug)
    {
        $data = [
            'title' => 'Blogs',
            'blog' => $this->BlogModel->getBlog($slug),
            'blogall' => $this->BlogModel->getBlog()
        ];
        return view('website/pages/blog-detail', $data);
    }
}
