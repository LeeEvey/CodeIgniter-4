<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'member_profile';
    protected $primaryKey = 'id_member';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_member', 'alamat', 'handphone', 'whatsapp', 'usia', 'jenis_kelamin', 'pekerjaan', 'rekomendasi', 'foto_ktp', 'fotodiri_ktp', 'foto_profile', 'foto_rekening', 'nama_rekening', 'nama_bank', 'no_rekening', 'status_member'];

    public function getMember($id_member = false)
    {
        if ($id_member == false) {
            return $this->findAll();
        }
        return $this->where(['id_member' => $id_member])->first();
    }
}
