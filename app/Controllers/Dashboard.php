<?php

namespace App\Controllers;

class Dashboard extends BaseSecure
{
    private const ST   = ['Belum Ditangani', 'Dijadwalkan', 'Dalam Perbaikan', 'Selesai'];
    private const ZONE = ['airside', 'tengah', 'kanan', 'kiri'];

    public function index()
    {
        return view('dashboard', ['user' => $this->user, 'isAdmin' => $this->isAdmin(), 'csrf' => session('csrf')]);
    }

    /** GET api/titik: semua titik + status + riwayat (semua user login boleh membaca). */
    public function titik()
    {
        $db   = db_connect();
        $rows = $db->query("SELECT t.id_titik AS id, t.nama AS name, t.alias_survei AS alias, t.kode_zona AS zone,
                t.latitude AS lat, t.longitude AS lon, t.pos_x AS x, t.pos_y AS y, t.jumlah_survei AS n, (SELECT COUNT(*) FROM foto_progres f WHERE f.id_titik = t.id_titik) AS nfoto,
                (t.asal = 'baru') AS custom, p.status AS s, p.pic, DATE_FORMAT(p.target_selesai, '%Y-%m-%d') AS t,
                p.catatan AS note, DATE_FORMAT(p.diperbarui, '%d-%m-%Y %H:%i') AS u
            FROM titik_kebocoran t JOIN penanganan p ON p.id_titik = t.id_titik ORDER BY t.id_titik")->getResultArray();
        $log = [];
        foreach ($db->query("SELECT id_titik, status, DATE_FORMAT(waktu, '%d-%m-%Y %H:%i') AS w FROM riwayat_status ORDER BY id DESC")->getResultArray() as $l) {
            $log[$l['id_titik']][] = ['w' => $l['w'], 'a' => self::ST[(int) $l['status']] ?? '-'];
        }
        foreach ($rows as &$r) {
            $r['log'] = array_slice($log[$r['id']] ?? [], 0, 15);
        }
        return $this->response->setJSON($rows);
    }

    /** POST api/penanganan (admin): ubah status, PIC, target, catatan. */
    public function simpan()
    {
        if ($deny = $this->denyUnlessAdmin()) {
            return $deny;
        }
        $j  = $this->request->getJSON(true) ?? [];
        $id = (string) ($j['id'] ?? '');
        $s  = (int) ($j['s'] ?? -1);
        if ($s < 0 || $s > 3) {
            return $this->response->setStatusCode(422)->setJSON(['error' => 'Status tidak valid']);
        }
        $db = db_connect();
        $p  = $db->table('penanganan')->where('id_titik', $id)->get()->getRowArray();
        if (! $p) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Titik tidak ditemukan']);
        }
        $t = (string) ($j['t'] ?? '');
        $db->transStart();
        $db->table('penanganan')->where('id_titik', $id)->update([
            'status'         => $s,
            'pic'            => mb_substr(trim((string) ($j['pic'] ?? '')), 0, 80),
            'target_selesai' => preg_match('/^\d{4}-\d{2}-\d{2}$/', $t) ? $t : null,
            'catatan'        => mb_substr((string) ($j['n'] ?? ''), 0, 2000),
        ]);
        if ((int) $p['status'] !== $s) {
            $db->table('riwayat_status')->insert(['id_titik' => $id, 'status' => $s, 'oleh' => $this->user['username']]);
        }
        $db->transComplete();
        return $this->response->setJSON(['ok' => true]);
    }

    /** POST api/tambah (admin): titik kebocoran baru. */
    public function tambah()
    {
        if ($deny = $this->denyUnlessAdmin()) {
            return $deny;
        }
        $j    = $this->request->getJSON(true) ?? [];
        $nama = mb_substr(trim((string) ($j['name'] ?? '')), 0, 60);
        $zona = (string) ($j['zone'] ?? '');
        if ($nama === '' || ! in_array($zona, self::ZONE, true) || ! is_numeric($j['lat'] ?? null) || ! is_numeric($j['lon'] ?? null) || abs((float) $j['lat']) > 90 || abs((float) $j['lon']) > 180) {
            return $this->response->setStatusCode(422)->setJSON(['error' => 'Nama, zona, dan koordinat titik wajib diisi dengan benar']);
        }
        $lat = (float) $j['lat'];
        $lon = (float) $j['lon'];

        $db = db_connect();
        $db->transStart();
        $n  = (int) $db->query("SELECT COALESCE(MAX(CAST(SUBSTRING(id_titik,2) AS UNSIGNED)),0)+1 AS n FROM titik_kebocoran WHERE id_titik LIKE 'N%'")->getRow()->n;
        $id = 'N' . str_pad((string) $n, 3, '0', STR_PAD_LEFT);
        $db->table('titik_kebocoran')->insert(['id_titik' => $id, 'nama' => $nama, 'alias_survei' => $nama, 'kode_zona' => $zona,
            'latitude' => $lat, 'longitude' => $lon, 'jumlah_survei' => 1, 'asal' => 'baru']);
        $db->table('penanganan')->insert(['id_titik' => $id]);
        $db->table('riwayat_status')->insert(['id_titik' => $id, 'status' => 0, 'oleh' => $this->user['username']]);
        $db->transComplete();
        return $this->response->setJSON(['id' => $id]);
    }

    /** POST api/hapus (admin): hanya titik buatan pengguna (asal = baru). */
    public function hapus()
    {
        if ($deny = $this->denyUnlessAdmin()) {
            return $deny;
        }
        $id = (string) ($this->request->getJSON(true)['id'] ?? '');
        $db = db_connect();
        if ($db->table('titik_kebocoran')->where('id_titik', $id)->where('asal', 'baru')->countAllResults() > 0) {
            foreach ($db->table('foto_progres')->where('id_titik', $id)->get()->getResultArray() as $f) {
                @unlink(FCPATH . 'uploads/foto/' . basename($f['file']));
            }
            $db->table('titik_kebocoran')->where('id_titik', $id)->delete();
        }
        return $this->response->setJSON(['ok' => true]);
    }

    /** GET api/foto/{id}: daftar foto progres satu titik (semua user login). */
    public function fotoList(string $id)
    {
        $rows = db_connect()->query("SELECT id, file, keterangan, diunggah_oleh, DATE_FORMAT(waktu, '%d-%m-%Y %H:%i') AS w
            FROM foto_progres WHERE id_titik = ? ORDER BY id", [$id])->getResultArray();
        return $this->response->setJSON(array_map(static fn ($r) => [
            'id' => (int) $r['id'], 'url' => base_url('uploads/foto/' . $r['file']),
            'ket' => $r['keterangan'], 'w' => $r['w'], 'oleh' => $r['diunggah_oleh'],
        ], $rows));
    }

    /** POST api/foto-upload (admin): satu atau banyak foto (field foto[]). */
    public function fotoUpload()
    {
        if ($deny = $this->denyUnlessAdmin()) {
            return $deny;
        }
        $id = (string) $this->request->getPost('id_titik');
        $db = db_connect();
        if ($db->table('titik_kebocoran')->where('id_titik', $id)->countAllResults() === 0) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Titik tidak ditemukan']);
        }
        $files = $this->request->getFileMultiple('foto') ?: [];
        if (! $files || count($files) > 10) {
            return $this->response->setStatusCode(422)->setJSON(['error' => 'Pilih 1 sampai 10 foto.']);
        }
        $dir = FCPATH . 'uploads/foto/';
        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        $ket = mb_substr(trim((string) $this->request->getPost('ket')), 0, 200);
        $ext = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'];
        $ok  = 0;
        $err = [];
        foreach ($files as $f) {
            $nm = $f->getClientName();
            if (! $f->isValid() || $f->hasMoved()) {
                $err[] = "$nm: gagal diunggah (cek batas upload_max_filesize di php.ini)";
                continue;
            }
            $mime = $f->getMimeType();
            if ($f->getSize() > 5 * 1024 * 1024 || ! isset($ext[$mime]) || @getimagesize($f->getTempName()) === false) {
                $err[] = "$nm: harus berupa gambar JPG/PNG/WebP maksimal 5 MB";
                continue;
            }
            $file = bin2hex(random_bytes(12)) . '.' . $ext[$mime];
            $f->move($dir, $file);
            $db->table('foto_progres')->insert([
                'id_titik' => $id, 'file' => $file, 'nama_asli' => mb_substr($nm, 0, 150),
                'keterangan' => $ket, 'diunggah_oleh' => $this->user['username'],
            ]);
            $ok++;
        }
        return $this->response->setJSON(['ok' => $ok, 'errors' => $err]);
    }

    /** POST api/foto-hapus (admin). */
    public function fotoHapus()
    {
        if ($deny = $this->denyUnlessAdmin()) {
            return $deny;
        }
        $id  = (int) ($this->request->getJSON(true)['id'] ?? 0);
        $db  = db_connect();
        $row = $db->table('foto_progres')->where('id', $id)->get()->getRowArray();
        if ($row) {
            @unlink(FCPATH . 'uploads/foto/' . basename($row['file']));
            $db->table('foto_progres')->where('id', $id)->delete();
        }
        return $this->response->setJSON(['ok' => true]);
    }
}
