<?php

namespace App\Models;

use CodeIgniter\Model;

class KomisiModel extends Model
{
    protected $table = 'komisi';
    protected $primaryKey = 'id_prospek';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_member', 'komisi', 'keterangan', 'status_pencairan', 'status_prospek'];

    public function getKomisi($id_prospek = false)
    {
        if ($id_prospek == false) {
            return $this->findAll();
        }
        return $this->where(['id_prospek' => $id_prospek])->first();
    }
}
