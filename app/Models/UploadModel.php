<?php

namespace App\Models;

use CodeIgniter\Model;

class UploadModel extends Model
{
    protected $table = 'dokumen_upload';
    protected $primaryKey = 'id_upload';
    protected $allowedFields = ['id_proyek', 'jenis_file', 'nama_file'];


    public function insert_upload($data)
    {
        return $this->db->table('dokumen_upload')->insert($data);
    }

    public function getBrosur()
    {
        $db = \Config\Database::connect();

        $query   = $db->query("SELECT nama_file FROM dokumen_upload WHERE jenis_file = 'brosur'");
        $results = $query->getResultArray();
        return $results;
    }

    public function getFoto()
    {
        $db = \Config\Database::connect();

        $query   = $db->query("SELECT nama_file FROM dokumen_upload WHERE jenis_file = 'foto'");
        $results = $query->getResultArray();
        return $results;
    }

    public function getFeatured()
    {
        $db = \Config\Database::connect();

        $query   = $db->query("SELECT nama_file FROM dokumen_upload WHERE jenis_file = 'featured'");
        $results = $query->getResultArray();
        return $results;
    }

    public function getPricelist()
    {
        $db = \Config\Database::connect();

        $query   = $db->query("SELECT nama_file FROM dokumen_upload WHERE jenis_file = 'pricelist'");
        $results = $query->getResultArray();
        return $results;
    }
}
