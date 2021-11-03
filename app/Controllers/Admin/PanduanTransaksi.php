<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\PanTransaksiModel;
use Error;

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
        
        return view('dashboard/pages/tambah-panduan-transaksi', $data);
        }
    }

    public function delete($id)
    {     
        $this->PanTransaksiModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admin/panduan-transaksi');
    }

    public function save() 
    {
        $this->PanTransaksiModel->save([
            'judul_trx' => $this->request->getVar('judul_trx'),
            'format_trx' => $this->request->getVar('format_trx'),
            'contoh_trx' => $this->request->getVar('contoh_trx')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/panduan-transaksi');
    }
    
}