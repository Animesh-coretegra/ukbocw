<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\DatabaseConnector;
use Exception;
class AuthModel extends Model
{
    private $database;
    function __construct()
    {
        $connection = new DatabaseConnector();
        $this->database = $connection->getDatabase();
        
    }
    

    public function checkUserExist($emailAddress,$password)
    {
        $user = $this->database->users->findOne(['user_email' => $emailAddress,'user_password' => $password]);
        if (!$user) 
            throw new Exception('Invalid User Details');

        return $user;
    }
    public function findUserByEmailAddress(string $emailAddress,)
    {
        $user = $this->database->users->findOne(['email' => $emailAddress,'is_active'=>"1"]);

        if (!$user) 
            throw new Exception('User does not exist for specified email address');

        return json_encode($user);
    }
    public function updateUserPassword(string $emailAddress,string $password)
    {
        $user = $this->database->users->findOneAndUpdate(
            ['email' => $emailAddress,'is_active'=>"1"],
            ['$set'=>['password'=>$password]]
        );

        if (!$user) 
            throw new Exception('User does not exist for specified email address');

        return $user;
    }

    public function insertSurveyData($data)
    {
       
        $insertOneResult = $this->database->survey->insertOne($data);
        if (empty($insertOneResult)) 
            throw new Exception('Invalid Menu Data');

        return $insertOneResult->getInsertedId();
    }
}
