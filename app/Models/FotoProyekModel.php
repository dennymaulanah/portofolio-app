<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoProyekModel extends Model
{
    protected $table            = 'foto_proyek';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['proyek_id', 'nama_file'];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = '';

    /**
     * Get all photos for a specific proyek
     */
    public function getByProyekId(int $proyekId)
    {
        return $this->where('proyek_id', $proyekId)->findAll();
    }
}
