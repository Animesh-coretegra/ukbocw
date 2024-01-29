<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuMappingModel extends Model
{
    protected $table            = 'menu_mapping';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['menu_id', 'role_id'];

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

    public function insertMenuMapping($menuData)
    {
        return $this->insert($menuData);
    }

    public function getAllMenu($condition = "")
    {
        if (!empty($condition)) {
            return $this->where($condition)->find();
        } else {
            return $this->find();
        }
    }

    public function updateRole($roleData, $roleId, $menuId)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('menu_mapping');
        $builder->where(['role_id' => $roleId, 'menu_id' => $menuId]);
        $update = $builder->update($roleData);
        return $update;
    }
}
