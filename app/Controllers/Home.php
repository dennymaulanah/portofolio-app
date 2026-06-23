<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function tentang(): string
    {
        return view('tentang');
    }

    public function portofolio(): string
    {
        return view('portofolio');
    }
}
