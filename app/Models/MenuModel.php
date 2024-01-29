<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{

    protected $table            = 'menu';
    protected $primaryKey       = 'menu_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'menu_id', 'menu_name', 'menu_url', 'parent_id', 'menu_icon', 'status'];

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

    public function getAllMenu($condition = "")
    {
        if (!empty($condition)) {
            return $this->where($condition)->find();
        } else {
            return $this->find();
        }
    }

    public function getMenu($condition = "")
    {
        if (!empty($condition)) {
            return $this->where($condition)->first();
        } else {
            return $this->find();
        }
    }

    public function insertMenu($menuData)
    {
        return $this->insert($menuData);
    }
    public function updateMenu($menuData, $menuId)
    {
        return $this->update($menuId, $menuData);
    }

    public function getMenuIcon()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('menu_icons');
        $builder->select('*');
        $query =  $builder->get();
        return $query->getResultArray();
    }
    public function getNavigation($condition)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('menu_mapping');
        $builder->select('*');
        $builder->where($condition);
        $query =  $builder->get();
        return $query->getResultArray();
    }
}
