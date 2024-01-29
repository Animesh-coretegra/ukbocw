<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table            = 'role';
    protected $primaryKey       = 'role_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'role_id', 'role_name', 'status'];

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

    public function getRole($condition = "")
    {
        if (!empty($condition)) {
            return $this->where($condition)->find();
        } else {
            return $this->find();
        }
    }

    public function insertRole($roleData)
    {
        return $this->insert($roleData);
    }
    public function updateRole($roleData, $roleId)
    {
        return $this->update($roleId, $roleData);
    }
}
