<!DOCTYPE html>
<html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kelola Pengguna – Monitoring Kebocoran Atap</title>
<style>
:root{color-scheme:light dark;--bg:#eef2f7;--card:#fff;--ink:#0d1b36;--mut:#5b6882;--line:#d9e0ec;--navy:#0b2a5b;--inp:#f6f8fc;--red:#c8202f}
@media(prefers-color-scheme:dark){:root{--bg:#0a1325;--card:#111d36;--ink:#e8eefb;--mut:#93a1bf;--line:#243252;--navy:#7fa6ff;--inp:#0c1730;--red:#ef4a58}}
*{box-sizing:border-box}body{margin:0;background:var(--bg);color:var(--ink);font:14px/1.5 system-ui,-apple-system,"Segoe UI",sans-serif}
header{background:#0b2a5b;color:#fff;padding:16px clamp(14px,3vw,32px);display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap}
header h1{margin:0;font-size:20px}header a{color:#fff;font-weight:600}
main{max-width:1100px;margin:auto;padding:18px clamp(14px,3vw,32px) 40px;display:grid;gap:16px}
.card{background:var(--card);border:1px solid var(--line);border-radius:12px;padding:16px}h2{margin:0 0 12px;font-size:15px}
.row{display:grid;grid-template-columns:1fr 1.2fr .8fr 1.2fr auto;gap:8px;align-items:end}
label{display:grid;gap:3px;font-size:12px;color:var(--mut);font-weight:600}
input,select{padding:8px 10px;border:1px solid var(--line);border-radius:8px;background:var(--inp);color:var(--ink);font:inherit;min-width:0}
button{border:0;border-radius:8px;padding:9px 13px;background:var(--navy);color:var(--card);font:inherit;font-weight:700;cursor:pointer}
button.d{background:transparent;color:var(--red);border:1px solid var(--red)}
.u{border-top:1px solid var(--line);padding:12px 0}.u:first-of-type{border-top:0}
.u form{display:grid;grid-template-columns:1.1fr 1fr .8fr .7fr 1.2fr auto auto;gap:8px;align-items:end}
.chk{display:flex;align-items:center;gap:6px;padding-bottom:8px}.chk input{width:auto}
.msg{padding:9px 12px;border-radius:8px}.ok{background:#e1f5e4;color:#1b6b2a}.er{background:#fde8ea;color:#9b1c28}
.note{color:var(--mut);font-size:12.5px}
@media(max-width:900px){.row,.u form{grid-template-columns:1fr 1fr}}
:focus-visible{outline:3px solid #f5a524;outline-offset:2px}
</style></head><body>
<header><h1>Kelola pengguna dan hak akses</h1><span><a href="<?= site_url('/') ?>">Kembali ke dashboard</a> · <a href="<?= site_url('logout') ?>">Keluar</a></span></header>
<main>
<?php if ($ok): ?><div class="msg ok" role="status"><?= esc($ok) ?></div><?php endif ?>
<?php if ($err): ?><div class="msg er" role="alert"><?= esc($err) ?></div><?php endif ?>
<section class="card"><h2>Tambah pengguna</h2>
<form class="row" method="post" action="<?= site_url('users/simpan') ?>"><input type="hidden" name="csrf" value="<?= esc($csrf) ?>">
<label>Username<input name="username" required pattern="[A-Za-z0-9_.\-]{3,40}"></label>
<label>Nama<input name="nama"></label>
<label>Hak akses<select name="role"><option value="user">User (hanya lihat)</option><option value="admin">Admin (ubah data)</option></select></label>
<label>Password (min. 8)<input name="password" type="password" minlength="8" required autocomplete="new-password"></label>
<button type="submit">Tambah</button></form></section>
<section class="card"><h2>Daftar pengguna</h2>
<?php foreach ($rows as $r): $self = (int) $r['id'] === (int) $me['id']; ?>
<div class="u"><form method="post" action="<?= site_url('users/ubah/' . $r['id']) ?>"><input type="hidden" name="csrf" value="<?= esc($csrf) ?>">
<label>Username<input value="<?= esc($r['username']) ?>" disabled></label>
<label>Nama<input name="nama" value="<?= esc($r['nama']) ?>"></label>
<label>Hak akses<select name="role" <?= $self ? 'disabled' : '' ?>><option value="user" <?= $r['role'] === 'user' ? 'selected' : '' ?>>User (hanya lihat)</option><option value="admin" <?= $r['role'] === 'admin' ? 'selected' : '' ?>>Admin</option></select></label>
<label class="chk"><input type="checkbox" name="aktif" value="1" <?= $r['aktif'] ? 'checked' : '' ?> <?= $self ? 'disabled' : '' ?>>Aktif</label>
<label>Reset password<input name="password" type="password" minlength="8" placeholder="kosongkan jika tidak" autocomplete="new-password"></label>
<button type="submit">Simpan</button>
<?php if (! $self): ?><button class="d" type="submit" formaction="<?= site_url('users/hapus/' . $r['id']) ?>" onclick="return confirm('Hapus pengguna <?= esc($r['username'], 'js') ?>?')">Hapus</button><?php else: ?><span class="note">Akun Anda</span><?php endif ?>
</form><div class="note">Login terakhir: <?= $r['last_login'] ? esc($r['last_login']) : 'belum pernah' ?></div></div>
<?php endforeach ?></section>
<p class="note">Admin dapat mengubah status penanganan, menambah dan menghapus titik, serta mengelola pengguna. User hanya dapat melihat dashboard dan mengunduh data.</p>
</main></body></html>
