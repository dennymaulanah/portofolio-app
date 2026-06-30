<?php

namespace App\Models;

use CodeIgniter\Model;

class ProyekModel extends Model
{
    protected $table            = 'proyek';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['judul', 'kategori', 'deskripsi', 'teknologi', 'status'];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    /**
     * Get proyek with its photos
     */
    public function getWithFoto(int $id)
    {
        $proyek = $this->find($id);
        if ($proyek) {
            $fotoModel = new FotoProyekModel();
            $proyek['foto'] = $fotoModel->where('proyek_id', $id)->findAll();
        }
        return $proyek;
    }

    /**
     * Get all proyek with first photo for thumbnail
     */
    public function getAllWithThumbnail()
    {
        $proyeks = $this->orderBy('created_at', 'DESC')->findAll();
        $fotoModel = new FotoProyekModel();

        foreach ($proyeks as &$proyek) {
            $proyek['thumbnail'] = $fotoModel->where('proyek_id', $proyek['id'])
                                              ->orderBy('id', 'ASC')
                                              ->first();
        }

        return $proyeks;
    }

    /**
     * Get published projects with thumbnails
     */
    public function getPublishedWithThumbnail($limit = null)
    {
        $query = $this->where('status', 'published')->orderBy('created_at', 'DESC');
        if ($limit !== null) {
            $query = $query->limit($limit);
        }
        $proyeks = $query->findAll();
        $fotoModel = new FotoProyekModel();

        foreach ($proyeks as &$proyek) {
            $proyek['thumbnail'] = $fotoModel->where('proyek_id', $proyek['id'])
                                              ->orderBy('id', 'ASC')
                                              ->first();
        }

        return $proyeks;
    }
}
