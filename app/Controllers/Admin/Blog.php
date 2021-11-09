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

    public function tambahBlog()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data',
            'validation' => \Config\Services::validation()
        ];

        return view('/dashboard/pages/tambah-blog', $data);
    }

    public function save()
    {
        if(!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[blog.judul]',
                'errors' => [
                    'required' => '{field} data harus diisi',
                    'is_unique' => '{field} data sudah ada'
                ]
            ],
            'imgpath' => [
                'rules' => 'max_size[imgpath,2024]|is_image[imgpath]|mime_in[imgpath,imgae/jpg,image/jpeg,image/jpg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/admin/blog/tambah-blog')->withInput();
        }

        //ambil gambar
        $fileImage = $this->request->getFile('imgpath');

        //apakah tidak ada gambar yang diuplad
        if($fileImage->getError() == 4) {
            $namaImage = 'default-blog.jpg';
        } else {

        //pindahkan file ke folder img
        $fileImage->move('img');
        //ambil nama file
        $namaImage = $fileImage->getName();

        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->BlogModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'deskripsi_display' => $this->request->getVar('deskripsi_display'),
            'imgpath' => $namaImage,
            'content' => $this->request->getVar('content')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/blog');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $blog = $this->BlogModel->find($id);

        // cek jika file gambarnya default.jpg
        if($blog['imgpath'] != 'default-blog.jpg') {
            // Hapus gambar
            unlink('img/' . $blog['imgpath']);
        }

        
        $this->BlogModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admin/blog');
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Form Ubah Data',
            'validation' => \Config\Services::validation(),
            'blog' => $this->BlogModel->getBlog($slug)
        ];

        return view('/dashboard/pages/edit-blog', $data);
    }

    public function update($id)
    {

        // Cek judul
        $imgpathLama = $this->BlogModel->getBlog($this->request->getVar('slug'));
        if($imgpathLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[blog.judul]';
        }

        if(!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
                ],
            'imgpath' => [
                'rules' => 'max_size[imgpath,2024]|is_image[imgpath]|mime_in[imgpath,imgae/jpg,image/jpeg,image/jpg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/admin/blog/detail/' . $this->request->getVar('slug'))->withInput();
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
        $this->BlogModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'deskripsi_display' => $this->request->getVar('deskripsi_display'),
            'imgpath' => $namaImage,
            'content' => $this->request->getVar('content')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/admin/blog');
    }
    
}