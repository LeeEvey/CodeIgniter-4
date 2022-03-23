<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_member';
    protected $allowedFields = ['email', 'password', 'role'];

    public function getUser($id_member = false)
    {
        if ($id_member == false) {
            return $this->findAll();
        }
        return $this->where(['id_member' => $id_member])->first();
    }
}
