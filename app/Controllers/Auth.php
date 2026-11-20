<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        if (session('user')) {
            return redirect()->to(site_url('/'));
        }
        return view('login', ['error' => session()->getFlashdata('error')]);
    }

    public function attempt()
    {
        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');
        $db  = db_connect();
        $row = $db->table('users')->where('username', $username)->where('aktif', 1)->get()->getRowArray();

        if ($row && password_verify($password, $row['password_hash'])) {
            session()->regenerate();
            session()->set([
                'user' => ['id' => (int) $row['id'], 'username' => $row['username'], 'nama' => $row['nama'], 'role' => $row['role']],
                'csrf' => bin2hex(random_bytes(16)),
            ]);
            $db->table('users')->where('id', $row['id'])->update(['last_login' => date('Y-m-d H:i:s')]);
            return redirect()->to(site_url('/'));
        }
        usleep(400000); // perlambat tebak-tebakan password
        return redirect()->to(site_url('login'))->with('error', 'Username atau password salah, atau akun nonaktif.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('login'));
    }
}
