<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function proses()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $m = new UserModel();

        $user = $m->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {

            session()->set([
                'isLogin' => true,
                'username' => $user['username']
            ]);

            return redirect()->to('/mahasiswa');
        }

        return redirect()->back()
            ->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}