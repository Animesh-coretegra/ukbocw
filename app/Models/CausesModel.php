<?php

namespace App\Models;

use CodeIgniter\Model;

class CausesModel extends Model
{
    protected $table            = 'causes';
    protected $primaryKey       = 'cause_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['cause_id', 'cause_title', 'raised_amount', 'goal_amount', 'cause_short_description', 'cause_long_description', 'thumbnail_image', 'details_images', 'cause_thumbnail_image', 'is_urgent', 'is_latest', 'status', 'created_at', 'modified_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'modified_at';
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

    public function insertCause($causeData)
    {
        return $this->insert($causeData);
    }
    public function getCauses($condition = "")
    {
        if (!empty($condition)) {
            return $this->where($condition)->find();
        } else {
            return $this->find();
        }
    }
    public function getCause($condition = "")
    {
        if (!empty($condition)) {
            return $this->where($condition)->first();
        } else {
            return $this->find();
        }
    }
    public function updateCause($causeData, $causeId)
    {
        return $this->update($causeId, $causeData);
    }
}
