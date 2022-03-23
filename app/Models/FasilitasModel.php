<?php

namespace App\Models;

use CodeIgniter\Model;

class FasilitasModel extends Model
{
    protected $table = 'fasilitas';
    protected $primaryKey = 'id_fasilitas';
    protected $allowedFields = ['nama_fasilitas', 'icon'];

    public function getFasilitas($id_fasilitas = false)
    {
        if ($id_fasilitas == false) {
            return $this->findAll();
        }
        return $this->where(['id_fasilitas' => $id_fasilitas])->first();
    }
}
