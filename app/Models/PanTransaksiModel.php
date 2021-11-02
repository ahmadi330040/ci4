<?php

namespace App\Models;

use CodeIgniter\Model;

class PanTransaksiModel extends Model
{
    protected $table = 'panduan_transaksi';
    protected $useTimestaps = true;
    protected $allowedFields = ['judul_trx','format_trx','contoh_trx'];

    public function getPanduanTransaksi()
    {
            return $this->findAll();
    }
}