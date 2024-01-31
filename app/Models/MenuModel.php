<?php

namespace App\Models;

use App\Libraries\DatabaseConnector;
use CodeIgniter\Model;
use Exception;

class MenuModel extends Model
{
    private $database;
    function __construct()
    {
        $connection = new DatabaseConnector();
        $this->database = $connection->getDatabase();
        
    }

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

  
    
    public function getNavigation($condition)
    {
       
        $menuMapping = $this->database->menu_mapping->find($condition);
        if (!$menuMapping) 
            throw new Exception('Invalid Menu Data');

        return $menuMapping;
    }
    public function getMenu($condition)
    {
        $menu = $this->database->menu->findOne($condition);
        // if (empty($menu)) {
        //     throw new Exception('Invalid Menu Data');
        // }

        return $menu;
    }
    public function getAllMenu($condition)
    {
       
        $menu = $this->database->menu->find($condition);
        if (!$menu) 
            throw new Exception('Invalid Menu Data');

        return $menu;
    }
    public function getAllMenuIcon()
    {
       
        $menu = $this->database->menu_icons->find();
        if (!$menu) 
            throw new Exception('Invalid Menu Data');

        return $menu;
    }
    public function insertMenuData($data)
    {
       
        $insertOneResult = $this->database->menu->insertOne($data);
        if (empty($insertOneResult)) 
            throw new Exception('Invalid Menu Data');

        return $insertOneResult->getInsertedId();
    }
    public function updateMenuData($data,$condition)
    {
       
        $updateResult = $this->database->menu->updateOne(
            $condition,
            ['$set'=>$data]
        );
        if (empty($updateResult->getMatchedCount())) 
            throw new Exception('Invalid Menu Data');

        return $updateResult->getMatchedCount();
    }
}
