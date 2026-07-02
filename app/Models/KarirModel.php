<?php

namespace App\Models;

use CodeIgniter\Model;

class KarirModel extends Model
{
    protected $table            = 'karir';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['periode', 'posisi', 'perusahaan', 'deskripsi', 'tags'];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
}
