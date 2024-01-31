<?php

namespace App\Models;

use App\Libraries\DatabaseConnector;
use CodeIgniter\Model;
use Exception;

class MenuMappingModel extends Model
{
    private $database;
    function __construct()
    {
        $connection = new DatabaseConnector();
        $this->database = $connection->getDatabase();
        
    }
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
        $insertOneResult = $this->database->menu_mapping->insertOne($menuData);
        if (empty($insertOneResult)) 
            throw new Exception('Invalid Menu Data');

        return $insertOneResult->getInsertedId();
    }

    public function getAllMenu($condition = "")
    {
        $role = $this->database->menu_mapping->findOne($condition);
        return $role;
    }

    public function updateRole($condition,$data)
    {
        $updateResult = $this->database->menu_mapping->updateOne(
            $condition,
            ['$set'=>$data]
        );
        if (empty($updateResult->getMatchedCount())) 
            throw new Exception('Invalid Menu Data');

        return $updateResult->getMatchedCount();
    }
}
