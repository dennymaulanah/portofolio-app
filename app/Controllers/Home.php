<?php

namespace App\Controllers;

use App\Models\ProyekModel;
use App\Models\ProfilModel;
use App\Models\SkillModel;
use App\Models\KarirModel;

class Home extends BaseController
{
    public function index(): string
    {
        $proyekModel = new ProyekModel();
        // Get up to 3 published projects for the editor's choice / featured section
        $data['proyeks'] = $proyekModel->getPublishedWithThumbnail(3);
        
        return view('welcome_message', $data);
    }

    public function tentang(): string
    {
        $profilModel = new ProfilModel();
        $skillModel  = new SkillModel();
        $karirModel  = new KarirModel();

        $data['profil'] = $profilModel->first() ?? [
            'tagline'  => '',
            'biografi' => '',
            'foto'     => '',
            'cv_file'  => '',
            'cv_url'   => ''
        ];
        $data['skills'] = $skillModel->findAll();
        $data['careers'] = $karirModel->orderBy('id', 'DESC')->findAll();

        return view('tentang', $data);
    }

    public function portofolio(): string
    {
        $proyekModel = new ProyekModel();
        // Get all published projects for the portfolio catalog page
        $data['proyeks'] = $proyekModel->getPublishedWithThumbnail();
        
        return view('portofolio', $data);
    }

    public function detail($id): string
    {
        $proyekModel = new ProyekModel();
        $proyek = $proyekModel->getWithFoto((int)$id);

        if (!$proyek || $proyek['status'] !== 'published') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('detail_proyek', ['proyek' => $proyek]);
    }

    public function reang(): string
    {
        return view('auth/login');
    }

    public function cvLatest()
    {
        $profilModel = new ProfilModel();
        $profil = $profilModel->first();
        
        if ($profil && !empty($profil['cv_file'])) {
            $filePath = FCPATH . 'uploads/cv/' . $profil['cv_file'];
            if (file_exists($filePath)) {
                $ext = pathinfo($filePath, PATHINFO_EXTENSION);
                $downloadName = 'CV_Latest.' . $ext;
                $content = file_get_contents($filePath);
                return $this->response->download($downloadName, $content);
            }
        }
        
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Berkas CV belum tersedia.');
    }
}
