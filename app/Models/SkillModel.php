<?php

namespace App\Models;

use CodeIgniter\Model;

class SkillModel extends Model
{
    protected $table            = 'skills';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['nama', 'ikon', 'level'];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
}
