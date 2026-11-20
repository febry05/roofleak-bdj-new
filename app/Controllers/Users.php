<?php

namespace App\Controllers;

class Users extends BaseSecure
{
    private function guard()
    {
        if (! $this->isAdmin()) {
            return redirect()->to(site_url('/'));
        }
        if ($this->request->is('post') && ! $this->csrfOk()) {
            return redirect()->to(site_url('users'))->with('err', 'Token keamanan tidak valid.');
        }
        return null;
    }

    private function adminCount(): int
    {
        return db_connect()->table('users')->where('role', 'admin')->where('aktif', 1)->countAllResults();
    }

    public function index()
    {
        if ($g = $this->guard()) {
            return $g;
        }
        return view('users', [
            'me'   => $this->user,
            'rows' => db_connect()->table('users')->orderBy('role')->orderBy('username')->get()->getResultArray(),
            'ok'   => session()->getFlashdata('ok'),
            'err'  => session()->getFlashdata('err'),
            'csrf' => session('csrf'),
        ]);
    }

    public function simpan()
    {
        if ($g = $this->guard()) {
            return $g;
        }
        $un   = strtolower(trim((string) $this->request->getPost('username')));
        $pw   = (string) $this->request->getPost('password');
        $role = $this->request->getPost('role') === 'admin' ? 'admin' : 'user';
        $db   = db_connect();
        if (! preg_match('/^[a-z0-9_.-]{3,40}$/', $un) || strlen($pw) < 8) {
            return redirect()->to(site_url('users'))->with('err', 'Username 3-40 karakter (huruf/angka/_.-) dan password minimal 8 karakter.');
        }
        if ($db->table('users')->where('username', $un)->countAllResults() > 0) {
            return redirect()->to(site_url('users'))->with('err', 'Username sudah dipakai.');
        }
        $db->table('users')->insert([
            'username' => $un, 'nama' => mb_substr(trim((string) $this->request->getPost('nama')) ?: $un, 0, 80),
            'role' => $role, 'password_hash' => password_hash($pw, PASSWORD_DEFAULT), 'aktif' => 1,
        ]);
        return redirect()->to(site_url('users'))->with('ok', "Pengguna $un ditambahkan.");
    }

    public function ubah(int $id)
    {
        if ($g = $this->guard()) {
            return $g;
        }
        $db  = db_connect();
        $row = $db->table('users')->where('id', $id)->get()->getRowArray();
        if (! $row) {
            return redirect()->to(site_url('users'))->with('err', 'Pengguna tidak ditemukan.');
        }
        $upd  = ['nama' => mb_substr(trim((string) $this->request->getPost('nama')) ?: $row['username'], 0, 80)];
        if ($id !== (int) $this->user['id']) {
            $role  = $this->request->getPost('role') === 'admin' ? 'admin' : 'user';
            $aktif = $this->request->getPost('aktif') ? 1 : 0;
            if ($row['role'] === 'admin' && $row['aktif'] && ($role !== 'admin' || ! $aktif) && $this->adminCount() <= 1) {
                return redirect()->to(site_url('users'))->with('err', 'Minimal harus ada satu admin aktif.');
            }
            $upd['role']  = $role;
            $upd['aktif'] = $aktif;
        }
        $pw = (string) $this->request->getPost('password');
        if ($pw !== '') {
            if (strlen($pw) < 8) {
                return redirect()->to(site_url('users'))->with('err', 'Password baru minimal 8 karakter.');
            }
            $upd['password_hash'] = password_hash($pw, PASSWORD_DEFAULT);
        }
        $db->table('users')->where('id', $id)->update($upd);
        return redirect()->to(site_url('users'))->with('ok', 'Pengguna ' . $row['username'] . ' diperbarui.');
    }

    public function hapus(int $id)
    {
        if ($g = $this->guard()) {
            return $g;
        }
        if ($id === (int) $this->user['id']) {
            return redirect()->to(site_url('users'))->with('err', 'Anda tidak dapat menghapus akun sendiri.');
        }
        db_connect()->table('users')->where('id', $id)->delete();
        return redirect()->to(site_url('users'))->with('ok', 'Pengguna dihapus.');
    }
}
