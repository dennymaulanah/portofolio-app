<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function dashboard(): string
    {
        return view('admin/dashboard');
    }

    public function proyek(): string
    {
        return view('admin/proyek');
    }
}
