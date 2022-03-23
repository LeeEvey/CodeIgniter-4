<?php

namespace App\Models;

use CodeIgniter\Model;

class ProyekModel extends Model
{
    protected $table = 'proyek';
    protected $primaryKey = 'id_proyek';

    public function getProyek($id_proyek = false)
    {
        if ($id_proyek == false) {
            return $this->findAll();
        }
        return $this->where(['id_proyek' => $id_proyek])->first();
    }
}
