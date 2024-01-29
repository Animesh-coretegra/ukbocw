<?php

namespace App\Models;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Model;

class GeneralModel extends Model
{
    protected $table            = 'generals';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

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
    private $database;
    public function __construct()
    {
        $this->database = \Config\Database::connect();
    }

    public function fetch_data($tablename, $condition = array(), $fields = null, $orderby = array(), $limit = array())
    {
        $fields = !empty($fields) ? $fields : '*';
        $builder = $this->database->table($tablename);
        $builder->select($fields);
        if (!empty($condition)) {
            foreach ($condition as $key => $value) {
                $builder->where($key, $value);
            }
        }
        if (!empty($orderby)) {
            foreach ($orderby as $key => $value) {
                $builder->orderBy($key, $value);
            }
        }
        if (!empty($limit)) {
            $builder->limit($limit[0]);
        }
        $query = $builder->get();
        // echo $this->database->getLastQuery();
        // die;
        return $query->getResultArray();
    }
    public function fetch_single_data($tablename, $condition = array(), $fields = null, $orderby = array())
    {
        $fields = !empty($fields) ? $fields : '*';
        $builder = $this->database->table($tablename);
        $builder->select($fields);
        if (!empty($condition)) {
            foreach ($condition as $key => $value) {
                $builder->where($key, $value);
            }
        }
        if (!empty($orderby)) {
            foreach ($orderby as $key => $value) {
                $builder->orderBy($key, $value);
            }
        }
        $query = $builder->get();
        // echo $this->database->getLastQuery();
        // die;
        return $query->getRowArray();
    }

    public function record_count($tablename, $condition = null)
    {
        $builder = $this->database->table($tablename);
        if ($condition == null) {
            return  $builder->countAll(); //$this->db->count_all('banner_master');
        } else {
            return  $builder->where($condition)->countAllResults(); //$this->db->count_all('banner_master');
        }
    }

    public function insert_data($table = '', $value = '')
    {
        $builder = $this->database->table($table);
        if ($this->database->fieldExists('created_at', $table)) {
            $value['created_at'] =  new RawSql('CURRENT_TIMESTAMP()');
        }

        if ($builder->insert($value)) {
            return $this->database->InsertId();
        } else {
            return FALSE;
        }
    }
    public function upsert_data($table = '', $value = '')
    {
        $builder = $this->database->table($table);
        if ($this->database->fieldExists('created_at', $table)) {
            $value['created_at'] =  new RawSql('CURRENT_TIMESTAMP()');
        }

        if ($builder->upsert($value)) {
            return $this->database->InsertId();
        } else {
            return FALSE;
        }
    }

    public function update_data($table = '', $value = '', $condition = '')
    {
        $builder = $this->database->table($table);
        if ($this->database->fieldExists('modified_at', $table)) {
            $value['modified_at'] =  new RawSql('CURRENT_TIMESTAMP()');
        }
        if ($condition != '') {
            $builder->set($value, false);
            $builder->where($condition);
            $builder->update();
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function delete_data($tablename = '', $condition = array())
    {
        $builder = $this->database->table($tablename);
        if (!empty($condition)) {
            //$this->db->where($condition);
            //$this->db->delete($table);

            if (!empty($condition)) {
                if (array_key_exists('condition', $condition)) {

                    foreach ($condition['condition'] as $key => $value) {
                        $builder->where($key, $value);
                    }
                }

                if (array_key_exists('condition_not_in', $condition)) {

                    foreach ($condition['condition_not_in'] as $key => $value) {
                        $builder->whereNotIn($key, $value);
                    }
                }

                if (array_key_exists('condition_in', $condition)) {

                    foreach ($condition['condition_in'] as $key => $value) {
                        $builder->whereIn($key, $value);
                    }
                }
            }


            $builder->delete();
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
