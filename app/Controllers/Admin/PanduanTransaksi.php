<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\PanTransaksiModel;

class PanduanTransaksi extends BaseController
{
protected $PanTransaksiModel;

    public function __construct()
    {
        $this->PanTransaksiModel = new PanTransaksiModel();
    }

    public function index()
    {
        {
            $data = [
            'title' => 'Panduan Transaksi',
            'transaksi' => $this->PanTransaksiModel->getPanduanTransaksi()
        ];
    
        return view('dashboard/pages/panduan-transaksi', $data);
        }
    }

    public function tambahPanduan()
    {
        {
            $data = [
            'title' => 'Tambah Panduan Deposit',
            'validation' => \Config\Services::validation()
        ];
        
        return view('dashboard/pages/tambah-panduan-transaksi', $data,);
        }
    }

    public function save() 
    {

        if(!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[panduan-transaksi.judul_trx]',
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah ada'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
            return redirect()->to('/admin/tambah-panduan-transaksi')->withInput();
        }

        $this->KomikModel->save([
            'judul_trx' => $this->request->getVar('judul_trx'),
            'format_trx' => $this->request->getVar('format_trx'),
            'contoh_trx' => $this->request->getVar('contoh_trx')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/panduan-transaksi');
    }
    
}