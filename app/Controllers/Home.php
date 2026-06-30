<?php

namespace App\Controllers;

use App\Models\ProyekModel;

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
        return view('tentang');
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
}
