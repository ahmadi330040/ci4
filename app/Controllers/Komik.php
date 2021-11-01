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


        // Jika komik tidak ada di tabel
        if(empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik ' . $slug . 'tidak ditemukan.');
        }


        return view('komik/detail', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Komik',
            'validation' => \Config\Services::validation()
        ];

        return view('komik/create', $data);
    }

    public function save() 
    {

        if(!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[blog.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah ada'
                ]
            ],
            'imgpath' => [
                'rules' => 'max_size[imgpath,1024]|is_image[imgpath]|mime_in[imgpath,imgae/jpg,image/jpeg,image/jpg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
            return redirect()->to('/komik/create')->withInput();
        }

        //ambil gambar
        $fileImage = $this->request->getFile('imgpath');

        //apakah tidak ada gambar yang diuplad
        if($fileImage->getError() == 4) {
            $namaImage = 'default.jpg';
        } else {

        // // Generate nama image
        // $namaImage = $fileImage->getRandomName();
        //pindahkan file ke folder img
        $fileImage->move('img');
        //ambil nama file
        $namaImage = $fileImage->getName();

        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->KomikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'deskripsi_display' => $this->request->getVar('deskripsi_display'),
            'imgpath' => $namaImage,
            'content' => $this->request->getVar('content')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/komik');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $komik = $this->KomikModel->find($id);

        // cek jika file gambarnya default.jpg
        if($komik['imgpath'] != 'default.jpg') {
            // Hapus gambar
            unlink('img/' . $komik['imgpath']);
        }

        
        $this->KomikModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/komik');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Komik',
            'validation' => \Config\Services::validation(),
            'komik' => $this->KomikModel->getKomik($slug)
        ];

        return view('komik/edit', $data);
    }

    public function update($id) 
    {

        // Cek judul
        $komikLama = $this->KomikModel->getKomik($this->request->getVar('slug'));
        if($komikLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[blog.judul]';
        }

        if(!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah ada'
                ]
                ],
            'imgpath' => [
                'rules' => 'max_size[imgpath,1024]|is_image[imgpath]|mime_in[imgpath,imgae/jpg,image/jpeg,image/jpg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileImage = $this->request->getFile('imgpath');

        // cek gambar, apakah gambar lama

        if($fileImage->getError() == 4) {
            $namaImage = $this->request->getVar('imgpathLama');
        } else {

            //get nama image
            $namaImage = $fileImage->getName();

            //pindahkan gambar ke folder img
            $fileImage->move('img', $namaImage);

            //Hapus file yang lama
            // unlink('img/' . $this->request->getVar('imgpathLama'));
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->KomikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'deskripsi_display' => $this->request->getVar('deskripsi_display'),
            'imgpath' => $namaImage,
            'content' => $this->request->getVar('content')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/komik');
    }

}
