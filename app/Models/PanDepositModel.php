<?php

namespace App\Models;

use CodeIgniter\Model;

class PanDepositModel extends Model
{
    protected $table = 'panduan_deposit';
    protected $useTimestaps = true;
    protected $allowedFields = ['img_bank','nama_bank','nama_rekening','nomor_rekening'];

    public function getPanduanDeposit()
    {
            return $this->findAll();
    }
}