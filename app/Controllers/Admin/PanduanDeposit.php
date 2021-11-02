<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\PanDepositModel;

class PanduanDeposit extends BaseController
{
protected $PanDepositModel;

    public function __construct()
    {
        $this->PanDepositModel = new PanDepositModel();
    }

    public function index()
    {
        {
            $data = [
            'title' => 'Panduan Deposit',
            'deposit' => $this->PanDepositModel->getPanduanDeposit()
        ];
    
        return view('dashboard/pages/panduan-deposit', $data,);
        }
    }

    public function tambahPanduan()
    {
        {
            $data = [
            'title' => 'Tambah Panduan Deposit',
            'validation' => \Config\Services::validation()
        ];
        
        return view('dashboard/pages/tambah-panduan-deposit', $data,);
        }
    }
    
}