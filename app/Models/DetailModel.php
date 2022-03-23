<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailModel extends Model
{
    protected $table = 'detail_proyek';
    protected $primaryKey = 'id_detail';
    protected $allowedFields = ['id_proyek', 'fasilitas', 'kamar_tidur', 'kamar_mandi', 'carport', 'luas_bangunan', 'luas_tanah', 'harga_terendah', 'status_proyek', 'informasi_properti', 'deskripsi', 'lokasi_proyek', 'wisata_hiburan', 'fasilitas_kesehatan', 'fasilitas_pendidikan', 'fasilitas_komersil'];

    public function getDetail($id_proyek = false)
    {
        if ($id_proyek == false) {
            return $this->findAll();
        }
        return $this->where(['id_proyek' => $id_proyek])->first();
    }

    public function getIdproyek($id_detail = false)
    {
        if ($id_detail == false) {
            return $this->findAll();
        }
        return $this->where(['id_detail' => $id_detail])->first();
    }
}
