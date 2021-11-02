<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blog';
    protected $useTimestaps = true;
    protected $allowedFields = ['judul','slug','author','deskripsi_display','imgpath','content'];

    public function getBlog($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}