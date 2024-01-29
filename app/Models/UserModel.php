<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'user_name', 'user_email', 'user_phone', 'user_password', 'user_role', 'status', 'user_profile_image'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function insertUser($userData)
    {
        return $this->insert($userData);
    }
    public function updateUser($userId, $userData)
    {
        return $this->update($userId, $userData);
    }

    public function getAllUser($condition = "")
    {
        if (!empty($condition)) {
            $db      = \Config\Database::connect();
            $builder = $db->table('role');
            $builder->select('*');
            $builder->join('user', 'user.user_role = role.role_id');
            $query =  $builder->get();
            return $query->getResultArray();
        } else {
            return $this->find();
        }
    }
    public function getUser($condition = "")
    {
        if (!empty($condition)) {
            $db      = \Config\Database::connect();
            $builder = $db->table('role');
            $builder->select('*');
            $builder->join('user', 'user.user_role = role.role_id');
            $builder->where($condition);
            $query =  $builder->get();
            return $query->getRow();
        } else {
            return $this->find();
        }
    }
    public function checkValidUser($condition = "")
    {
        return $this->where($condition)->first();
    }
}
