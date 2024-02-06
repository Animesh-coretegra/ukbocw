<?php

namespace App\Models;

use App\Libraries\DatabaseConnector;
use CodeIgniter\Model;
use Exception;

class RoleModel extends Model
{
    private $database;
    function __construct()
    {
        $connection = new DatabaseConnector();
        $this->database = $connection->getDatabase();
        
    }
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

    public function getRole()
    {
        $role = $this->database->role->find();
        if (!$role) 
            throw new Exception('Invalid role Data');

        return $role;
    }
    public function getSingleRole($condition)
    {
        $role = $this->database->role->findOne($condition);
        if (!$role) 
            throw new Exception('Invalid role Data');

        return $role;
    }

    public function insertRoleData($data)
    {
       
        $insertOneResult = $this->database->role->insertOne($data);
        if (empty($insertOneResult)) 
            throw new Exception('Invalid Menu Data');

        return $insertOneResult->getInsertedId();
    }
    public function insertMenuMapping($data)
    {
       
        $insertOneResult = $this->database->menu_mapping->insertOne($data);
        if (empty($insertOneResult)) 
            throw new Exception('Invalid Menu Data');

        return $insertOneResult->getInsertedId();
    }
    public function updateRole($data, $condition)
    {
        $updateResult = $this->database->role->updateOne(
            $condition,
            ['$set'=>$data]
        );
        if (empty($updateResult->getMatchedCount())) 
            throw new Exception('Invalid Menu Data');

        return $updateResult->getMatchedCount();
    }

    public function getSurvey()
    {
        $survey = $this->database->survey->find();
        if (!$survey) 
            throw new Exception('Invalid survey Data');

        return $survey;
    }

    public function getSurveyById($surveyId)
    {
        $survey = $this->database->survey->findOne(array("survey_id" => $surveyId));
        if (!$survey) 
            throw new Exception('Invalid survey Data');

        return $survey;
    }
    public function checkValidMacAddress($mac)
    {
        $mac_address = $this->database->mac_address->findOne(array("mac_address" => $mac,"status"=>"1"));
        if (!$mac_address) 
            throw new Exception('Invalid mac_address Data');

        return $mac_address;
    }
}
