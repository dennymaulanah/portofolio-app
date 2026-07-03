<?php

namespace App\Controllers;

use App\Models\ProyekModel;
use App\Models\FotoProyekModel;
use App\Models\ProfilModel;
use App\Models\SkillModel;
use App\Models\KarirModel;

class Admin extends BaseController
{
    public function dashboard(): string
    {
        $proyekModel = new ProyekModel();
        
        $data['totalProyek'] = $proyekModel->countAll();
        $data['totalPublished'] = $proyekModel->where('status', 'published')->countAllResults();
        $data['totalDraft'] = $proyekModel->where('status', 'draft')->countAllResults();
        
        // Get latest 5 projects with thumbnail
        $latest = $proyekModel->getAllWithThumbnail();
        $data['latestProyeks'] = array_slice($latest, 0, 5);

        return view('admin/dashboard', $data);
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
        $profilModel = new ProfilModel();
        $skillModel  = new SkillModel();
        $karirModel  = new KarirModel();
        
        $data['profil'] = $profilModel->first() ?? [
            'id'       => null,
            'nama'     => '',
            'tagline'  => '',
            'biografi' => '',
            'foto'     => '',
            'cv_file'  => '',
            'cv_url'   => ''
        ];
        $data['skills'] = $skillModel->findAll();
        $data['careers'] = $karirModel->orderBy('id', 'DESC')->findAll();
        
        return view('admin/tentang', $data);
    }

    public function updateProfil()
    {
        $profilModel = new ProfilModel();
        $profil = $profilModel->first();
        
        $rules = [
            'nama'     => 'required|max_length[100]',
            'tagline'  => 'required|max_length[255]',
            'biografi' => 'required',
        ];
        
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => implode('<br>', $this->validator->getErrors())
            ]);
        }
        
        $data = [
            'nama'     => $this->request->getPost('nama'),
            'tagline'  => $this->request->getPost('tagline'),
            'biografi' => $this->request->getPost('biografi'),
        ];
        
        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            if ($profil && !empty($profil['foto']) && strpos($profil['foto'], 'http') !== 0 && $profil['foto'] !== 'default_profile.png') {
                $oldPath = FCPATH . 'uploads/profil/' . $profil['foto'];
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            
            $uploadPath = FCPATH . 'uploads/profil';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            
            $newName = $foto->getRandomName();
            $foto->move($uploadPath, $newName);
            $data['foto'] = $newName;
        }
        
        if ($profil) {
            $profilModel->update($profil['id'], $data);
        } else {
            $profilModel->insert($data);
        }
        
        // Fetch updated photo URL/name to return
        $updatedProfil = $profilModel->first();
        $photoSrc = '';
        if ($updatedProfil && !empty($updatedProfil['foto'])) {
            $photoSrc = (strpos($updatedProfil['foto'], 'http') === 0) ? $updatedProfil['foto'] : base_url('uploads/profil/' . $updatedProfil['foto']);
        }
        
        return $this->response->setJSON([
            'status'   => 'success',
            'message'  => 'Profil berhasil disimpan!',
            'foto_url' => $photoSrc
        ]);
    }

    public function updateCV()
    {
        $profilModel = new ProfilModel();
        $profil = $profilModel->first();
        
        $data = [];
        
        $cvFile = $this->request->getFile('cv_file');
        if ($cvFile && $cvFile->isValid() && !$cvFile->hasMoved()) {
            if ($profil && !empty($profil['cv_file']) && $profil['cv_file'] !== 'Curriculum_Vitae_Azeria.pdf') {
                $oldPath = FCPATH . 'uploads/cv/' . $profil['cv_file'];
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            
            $uploadPath = FCPATH . 'uploads/cv';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            
            $newName = $cvFile->getRandomName();
            $cvFile->move($uploadPath, $newName);
            $data['cv_file'] = $newName;
        }
        
        if (!empty($data)) {
            if ($profil) {
                $profilModel->update($profil['id'], $data);
            } else {
                $profilModel->insert($data);
            }
        }
        
        $updatedProfil = $profilModel->first();
        
        return $this->response->setJSON([
            'status'     => 'success',
            'message'    => 'CV berhasil diperbarui!',
            'cv_file'    => $updatedProfil['cv_file'] ?? null,
            'updated_at' => ($updatedProfil && $updatedProfil['updated_at']) ? date('d M Y', strtotime($updatedProfil['updated_at'])) : date('d M Y')
        ]);
    }

    public function tambahSkill()
    {
        $skillModel = new SkillModel();
        
        $rules = [
            'nama'  => 'required|max_length[100]',
            'ikon'  => 'required|max_length[50]',
            'level' => 'required|integer|greater_than_equal_to[0]|less_than_equal_to[100]',
        ];
        
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => implode('<br>', $this->validator->getErrors())
            ]);
        }
        
        $data = [
            'nama'  => $this->request->getPost('nama'),
            'ikon'  => $this->request->getPost('ikon'),
            'level' => (int)$this->request->getPost('level'),
        ];
        
        $skillModel->insert($data);
        $insertId = $skillModel->getInsertID();
        
        return $this->response->setJSON([
            'status'   => 'success',
            'message'  => 'Keahlian berhasil ditambahkan!',
            'id'       => $insertId,
            'skill'    => $data
        ]);
    }

    public function updateSkill($id)
    {
        $skillModel = new SkillModel();
        $skill = $skillModel->find($id);
        if (!$skill) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Keahlian tidak ditemukan.'
            ]);
        }
        
        $rules = [
            'nama'  => 'permit_empty|max_length[100]',
            'ikon'  => 'permit_empty|max_length[50]',
            'level' => 'permit_empty|integer|greater_than_equal_to[0]|less_than_equal_to[100]',
        ];
        
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => implode('<br>', $this->validator->getErrors())
            ]);
        }
        
        $data = [];
        if ($this->request->getPost('nama') !== null) {
            $data['nama'] = $this->request->getPost('nama');
        }
        if ($this->request->getPost('ikon') !== null) {
            $data['ikon'] = $this->request->getPost('ikon');
        }
        if ($this->request->getPost('level') !== null) {
            $data['level'] = (int)$this->request->getPost('level');
        }
        
        if (!empty($data)) {
            $skillModel->update($id, $data);
        }
        
        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Keahlian berhasil diperbarui!'
        ]);
    }

    public function hapusSkill($id)
    {
        $skillModel = new SkillModel();
        if (!$skillModel->find($id)) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Keahlian tidak ditemukan.'
            ]);
        }
        
        $skillModel->delete($id);
        
        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Keahlian berhasil dihapus!'
        ]);
    }

    public function tambahKarir()
    {
        $karirModel = new KarirModel();
        
        $rules = [
            'periode'    => 'required|max_length[100]',
            'posisi'     => 'required|max_length[255]',
            'perusahaan' => 'required|max_length[255]',
            'deskripsi'  => 'permit_empty',
            'tags'       => 'permit_empty|max_length[255]',
        ];
        
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => implode('<br>', $this->validator->getErrors())
            ]);
        }
        
        $data = [
            'periode'    => $this->request->getPost('periode'),
            'posisi'     => $this->request->getPost('posisi'),
            'perusahaan' => $this->request->getPost('perusahaan'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
            'tags'       => $this->request->getPost('tags'),
        ];
        
        $karirModel->insert($data);
        $insertId = $karirModel->getInsertID();
        
        return $this->response->setJSON([
            'status'   => 'success',
            'message'  => 'Jejak karir berhasil ditambahkan!',
            'id'       => $insertId,
            'career'   => $data
        ]);
    }

    public function updateKarir($id)
    {
        $karirModel = new KarirModel();
        $career = $karirModel->find($id);
        if (!$career) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Jejak karir tidak ditemukan.'
            ]);
        }
        
        $rules = [
            'periode'    => 'required|max_length[100]',
            'posisi'     => 'required|max_length[255]',
            'perusahaan' => 'required|max_length[255]',
            'deskripsi'  => 'permit_empty',
            'tags'       => 'permit_empty|max_length[255]',
        ];
        
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => implode('<br>', $this->validator->getErrors())
            ]);
        }
        
        $data = [
            'periode'    => $this->request->getPost('periode'),
            'posisi'     => $this->request->getPost('posisi'),
            'perusahaan' => $this->request->getPost('perusahaan'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
            'tags'       => $this->request->getPost('tags'),
        ];
        
        $karirModel->update($id, $data);
        
        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Jejak karir berhasil diperbarui!'
        ]);
    }

    public function hapusKarir($id)
    {
        $karirModel = new KarirModel();
        if (!$karirModel->find($id)) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Jejak karir tidak ditemukan.'
            ]);
        }
        
        $karirModel->delete($id);
        
        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Jejak karir berhasil dihapus!'
        ]);
    }

    public function pengaturan(): string
    {
        $settingsModel = new \App\Models\PengaturanModel();
        $data['pengaturan'] = $settingsModel->first() ?? [
            'id'             => null,
            'nama_situs'     => '',
            'email_kontak'   => '',
            'telepon_kontak' => '',
            'github_url'     => '',
            'linkedin_url'   => '',
            'instagram_url'  => '',
        ];
        return view('admin/pengaturan', $data);
    }

    public function updatePengaturan()
    {
        $settingsModel = new \App\Models\PengaturanModel();
        $settings = $settingsModel->first();

        $rules = [
            'nama_situs'     => 'required|max_length[100]',
            'email_kontak'   => 'permit_empty|valid_email|max_length[100]',
            'telepon_kontak' => 'permit_empty|max_length[30]',
            'github_url'     => 'permit_empty|valid_url|max_length[255]',
            'linkedin_url'   => 'permit_empty|valid_url|max_length[255]',
            'instagram_url'  => 'permit_empty|valid_url|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => implode('<br>', $this->validator->getErrors())
            ]);
        }

        $data = [
            'nama_situs'     => $this->request->getPost('nama_situs'),
            'email_kontak'   => $this->request->getPost('email_kontak'),
            'telepon_kontak' => $this->request->getPost('telepon_kontak'),
            'github_url'     => $this->request->getPost('github_url'),
            'linkedin_url'   => $this->request->getPost('linkedin_url'),
            'instagram_url'  => $this->request->getPost('instagram_url'),
        ];

        if ($settings) {
            $settingsModel->update($settings['id'], $data);
        } else {
            $settingsModel->insert($data);
        }

        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Pengaturan berhasil diperbarui!'
        ]);
    }
}
