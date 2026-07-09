<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        // 1. Form validation
        $rules = [
            'email' => [
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required'    => 'Alamat email wajib diisi.',
                    'valid_email' => 'Format alamat email tidak valid.',
                ],
            ],
            'password' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kata sandi wajib diisi.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => implode('<br>', $this->validator->getErrors()),
            ]);
        }

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // 2. Database query
        $db   = \Config\Database::connect();
        $user = $db->table('users')->where('email', $email)->get()->getRowArray();

        // 3. Verify user and password
        if (!$user || !password_verify($password, $user['password'])) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Alamat email atau kata sandi salah!',
            ]);
        }

        // 4. Set session
        session()->set([
            'logged_in' => true,
            'user_id'   => $user['id'],
            'username'  => $user['username'],
            'email'     => $user['email'],
        ]);

        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Login berhasil! Mengarahkan ke Dashboard...',
        ]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin');
    }
}
