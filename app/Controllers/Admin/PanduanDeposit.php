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

    public function save()
    {
        if(!$this->validate([
            'nama_bank' => [
                'rules' => 'required|is_unique[panduan_deposit.nama_bank]',
                'errors' => [
                    'required' => '{field} data harus diisi',
                    'is_unique' => '{field} data sudah ada'
                ]
            ],
            'img_bank' => [
                'rules' => 'max_size[img_bank,1024]|is_image[img_bank]|mime_in[img_bank,imgae/jpg,image/jpeg,image/jpg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/admin/tambah-panduan-deposit')->withInput();
        }

        //ambil gambar
        $fileImage = $this->request->getFile('img_bank');

        //apakah tidak ada gambar yang diuplad
        if($fileImage->getError() == 4) {
            $namaImage = 'default.jpg';
        } else {

        //pindahkan file ke folder img
        $fileImage->move('img');

        //ambil nama file
        $namaImage = $fileImage->getName();

        }

        $slug = url_title($this->request->getVar('nama_bank'), '-', true);
        $this->PanDepositModel->save([
            'img_bank' => $namaImage,
            'nama_bank' => $this->request->getVar('nama_bank'),
            'nama_rekening' => $this->request->getVar('nama_rekening'),
            'nomor_rekening' => $this->request->getVar('nomor_rekening')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/panduan-deposit');
    }

    public function delete($id)
    {
        $this->PanDepositModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admin/panduan-deposit');
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Edit data',
            'validation' => \Config\Services::validation(),
            'panduandeposit' => $this->PanDepositModel->getPanduanDeposit($id)
        ];

        return view('/dashboard/pages/edit-panduan-deposit', $data);
        // dd($data);
    }
    
    public function update($id)
    {
        // if(!$this->validate([
        //     'nama_bank' => [
        //         'rules' => 'required|is_unique[panduan_deposit.nama_bank]',
        //         'errors' => [
        //             'required' => '{field} data harus diisi',
        //             'is_unique' => '{field} data sudah ada'
        //         ]
        //     ],
        //     'img_bank' => [
        //         'rules' => 'max_size[img_bank,1024]|is_image[img_bank]|mime_in[img_bank,imgae/jpg,image/jpeg,image/jpg,image/png]',
        //         'errors' => [
        //             'max_size' => 'Ukuran gambar terlalu besar',
        //             'is_image' => 'Yang anda pilih bukan gambar',
        //             'mime_in' => 'Yang anda pilih bukan gambar'
        //         ]
        //     ]
        // ])) {
        //     return redirect()->to('/admin/panduan-deposit/detail/' . $this->request->getVar('id'))->withInput();
        // }

        //ambil gambar
        $fileImage = $this->request->getFile('img_bank');

        // cek gambar, apakah gambar lama

        if($fileImage->getError() == 4) {
            $namaImage = $this->request->getVar('img_bankLama');
        } else {

            //get nama image
            $namaImage = $fileImage->getName();

            //pindahkan gambar ke folder img
            $fileImage->move('img', $namaImage);

            //Hapus file yang lama
            // unlink('img/' . $this->request->getVar('imgpathLama'));
        }
        $this->PanDepositModel->save([
            'id' => $id,
            'img_bank' => $namaImage,
            'nama_bank' => $this->request->getVar('nama_bank'),
            'nama_rekening' => $this->request->getVar('nama_rekening'),
            'nomor_rekening' => $this->request->getVar('nomor_rekening')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/panduan-deposit');
    }
}