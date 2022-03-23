<?php

namespace App\Models;

use CodeIgniter\Model;

class MarketingModel extends Model
{
    protected $table = 'tools_marketing';
    protected $primaryKey = 'id_detail';
    protected $allowedFields = ['id_proyek', 'brosur1', 'brosur2', 'brosur3', 'pricelist1', 'pricelist2', 'pricelist3', 'foto1', 'foto2', 'foto3', 'foto4', 'foto5', 'foto6', 'foto7', 'foto8', 'foto9', 'featured', 'video1', 'video2', 'video3'];

    public function getMarketing($id_proyek = false)
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
