<?php

namespace App\Controllers;

use App\Models\ProyekModel;
use App\Models\FotoProyekModel;

class Admin extends BaseController
{
    public function dashboard(): string
    {
        return view('admin/dashboard');
    }

    public function proyek(): string
    {
        $proyekModel = new ProyekModel();
        $data['proyeks'] = $proyekModel->getAllWithThumbnail();
        $data['totalProyek'] = $proyekModel->countAll();
        $data['totalPublished'] = $proyekModel->where('status', 'published')->countAllResults(false);
        $data['totalDraft'] = $proyekModel->where('status', 'draft')->countAllResults();

        return view('admin/proyek', $data);
    }

    public function tambahProyek(): string
    {
        return view('admin/tambah_proyek');
    }

    public function simpanProyek()
    {
        $rules = [
            'judul'     => 'required|max_length[255]',
            'kategori'  => 'required|max_length[100]',
            'deskripsi' => 'permit_empty',
            'teknologi' => 'permit_empty',
            'status'    => 'required|in_list[published,draft]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $proyekModel = new ProyekModel();
        $fotoModel   = new FotoProyekModel();

        // Validate photo count
        $fotos = $this->request->getFileMultiple('foto');
        $newPhotoCount = 0;
        if ($fotos) {
            foreach ($fotos as $foto) {
                if ($foto->isValid()) {
                    $newPhotoCount++;
                }
            }
        }

        if ($newPhotoCount > 10) {
            return redirect()->back()->withInput()->with('errors', ['foto' => 'Maksimal 10 foto yang diperbolehkan per proyek.']);
        }

        // Save proyek
        $proyekData = [
            'judul'     => $this->request->getPost('judul'),
            'kategori'  => $this->request->getPost('kategori'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'teknologi' => $this->request->getPost('teknologi'),
            'status'    => $this->request->getPost('status'),
        ];

        $proyekModel->insert($proyekData);
        $proyekId = $proyekModel->getInsertID();

        // Handle new foto uploads
        if ($newPhotoCount > 0) {
            $this->uploadFoto($fotoModel, $proyekId);
        }

        return redirect()->to('/admin/proyek')->with('success', 'Proyek berhasil ditambahkan!');
    }

    public function editProyek($id): string
    {
        $proyekModel = new ProyekModel();
        $proyek = $proyekModel->getWithFoto($id);

        if (!$proyek) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/edit_proyek', ['proyek' => $proyek]);
    }

    public function updateProyek($id)
    {
        $proyekModel = new ProyekModel();
        $proyek = $proyekModel->find($id);

        if (!$proyek) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'judul'     => 'required|max_length[255]',
            'kategori'  => 'required|max_length[100]',
            'deskripsi' => 'permit_empty',
            'teknologi' => 'permit_empty',
            'status'    => 'required|in_list[published,draft]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fotoModel = new FotoProyekModel();

        // Calculate final photo count
        $existingFotos = $fotoModel->getByProyekId($id);
        $existingCount = count($existingFotos);

        $hapusFoto = $this->request->getPost('hapus_foto');
        $deletedCount = $hapusFoto ? count($hapusFoto) : 0;

        $newFotos = $this->request->getFileMultiple('foto');
        $newPhotoCount = 0;
        if ($newFotos) {
            foreach ($newFotos as $foto) {
                if ($foto->isValid()) {
                    $newPhotoCount++;
                }
            }
        }

        $finalPhotoCount = ($existingCount - $deletedCount) + $newPhotoCount;

        if ($finalPhotoCount > 10) {
            return redirect()->back()->withInput()->with('errors', ['foto' => 'Jumlah total foto setelah diperbarui melebihi batas 10 foto.']);
        }

        // Update proyek data
        $proyekData = [
            'judul'     => $this->request->getPost('judul'),
            'kategori'  => $this->request->getPost('kategori'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'teknologi' => $this->request->getPost('teknologi'),
            'status'    => $this->request->getPost('status'),
        ];

        $proyekModel->update($id, $proyekData);

        // Handle delete existing photos
        if ($hapusFoto) {
            foreach ($hapusFoto as $fotoId) {
                $foto = $fotoModel->find($fotoId);
                if ($foto) {
                    $filePath = FCPATH . 'uploads/proyek/' . $foto['nama_file'];
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                    $fotoModel->delete($fotoId);
                }
            }
        }

        // Handle new foto uploads
        if ($newPhotoCount > 0) {
            $this->uploadFoto($fotoModel, $id);
        }

        return redirect()->to('/admin/proyek')->with('success', 'Proyek berhasil diperbarui!');
    }

    public function hapusProyek($id)
    {
        $proyekModel = new ProyekModel();
        $fotoModel   = new FotoProyekModel();

        $proyek = $proyekModel->find($id);
        if (!$proyek) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Delete all photos from disk
        $fotos = $fotoModel->getByProyekId($id);
        foreach ($fotos as $foto) {
            $filePath = FCPATH . 'uploads/proyek/' . $foto['nama_file'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Delete proyek (CASCADE will delete foto_proyek rows)
        $proyekModel->delete($id);

        return redirect()->to('/admin/proyek')->with('success', 'Proyek berhasil dihapus!');
    }

    /**
     * Helper: upload multiple photos for a proyek
     */
    private function uploadFoto(FotoProyekModel $fotoModel, int $proyekId): void
    {
        $fotos = $this->request->getFileMultiple('foto');
        if ($fotos) {
            $uploadPath = FCPATH . 'uploads/proyek';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            foreach ($fotos as $foto) {
                if ($foto->isValid() && !$foto->hasMoved()) {
                    $namaFile = $foto->getRandomName();
                    $foto->move($uploadPath, $namaFile);

                    $fotoModel->insert([
                        'proyek_id' => $proyekId,
                        'nama_file' => $namaFile,
                    ]);
                }
            }
        }
    }

    public function tentang(): string
    {
        return view('admin/tentang');
    }
}
