<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/** Basis semua halaman yang wajib login. Peran dibaca ulang dari DB di setiap request. */
abstract class BaseSecure extends BaseController
{
    protected array $user = [];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        // Cegah browser/proxy menyimpan cache halaman dan data API
        $this->response->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')->setHeader('Pragma', 'no-cache');
        $u = session('user');
        if (! $u) {
            $this->toLogin();
        }
        $row = db_connect()->table('users')->select('role,aktif')->where('id', $u['id'])->get()->getRowArray();
        if (! $row || (int) $row['aktif'] !== 1) {
            session()->destroy();
            $this->toLogin();
        }
        $u['role'] = $row['role'];
        $this->user = $u;
    }

    /** Alihkan ke halaman login. Class RedirectException pindah namespace di CI 4.4+, jadi dicek dulu. */
    private function toLogin(): void
    {
        $cls = class_exists(\CodeIgniter\HTTP\Exceptions\RedirectException::class)
            ? \CodeIgniter\HTTP\Exceptions\RedirectException::class
            : \CodeIgniter\Router\Exceptions\RedirectException::class;
        throw new $cls(redirect()->to(site_url('login')));
    }

    protected function isAdmin(): bool
    {
        return ($this->user['role'] ?? '') === 'admin';
    }

    protected function csrfOk(): bool
    {
        $t = $this->request->getHeaderLine('X-CSRF') ?: (string) $this->request->getPost('csrf');
        return $t !== '' && hash_equals((string) session('csrf'), $t);
    }

    /** Untuk endpoint JSON yang menulis data: kembalikan response error bila bukan admin / token salah. */
    protected function denyUnlessAdmin(): ?ResponseInterface
    {
        if (! $this->isAdmin()) {
            return $this->response->setStatusCode(403)->setJSON(['error' => 'Akun Anda hanya memiliki hak lihat.']);
        }
        if (! $this->csrfOk()) {
            return $this->response->setStatusCode(403)->setJSON(['error' => 'Token keamanan tidak valid. Muat ulang halaman.']);
        }
        return null;
    }
}
