<?php

namespace App\Models;

use CodeIgniter\Model;

class ProspekModel extends Model
{
    protected $table = 'prospek';
    protected $primaryKey = 'id_prospek';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_customer', 'status_hubungan', 'no_telepon', 'proyek_diminati', 'range_harga', 'jadwal_survei', 'status_prospek', 'keterangan'];

    public function getProspek($id_prospek = false)
    {
        if ($id_prospek == false) {
            return $this->findAll();
        }
        return $this->where(['id_prospek' => $id_prospek])->first();
    }
}
