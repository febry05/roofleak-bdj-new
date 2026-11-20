<!DOCTYPE html>
<html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Masuk – Monitoring Kebocoran Atap</title>
<style>
:root{color-scheme:light dark;--bg:#eef2f7;--card:#fff;--ink:#0d1b36;--mut:#5b6882;--line:#d9e0ec;--navy:#0b2a5b}
@media(prefers-color-scheme:dark){:root{--bg:#0a1325;--card:#111d36;--ink:#e8eefb;--mut:#93a1bf;--line:#243252;--navy:#7fa6ff}}
*{box-sizing:border-box}body{margin:0;min-height:100vh;display:grid;place-items:center;background:var(--bg);color:var(--ink);font:14px/1.5 system-ui,-apple-system,"Segoe UI",sans-serif;padding:16px}
form{width:min(380px,100%);background:var(--card);border:1px solid var(--line);border-radius:14px;padding:26px;display:grid;gap:14px}
h1{margin:0;font-size:20px}p{margin:0;color:var(--mut)}label{display:grid;gap:4px;font-weight:600;font-size:12.5px;color:var(--mut)}
input{padding:10px 12px;border:1px solid var(--line);border-radius:8px;background:transparent;color:var(--ink);font:inherit}
button{background:var(--navy);color:var(--card);border:0;border-radius:8px;padding:11px;font:inherit;font-weight:700;cursor:pointer}
.err{background:#fde8ea;color:#9b1c28;border-radius:8px;padding:9px 12px}:focus-visible{outline:3px solid #f5a524;outline-offset:2px}
</style></head><body>
<form method="post" action="<?= site_url('login') ?>">
<div><h1>Monitoring Kebocoran Atap</h1><p>Bandara Internasional Syamsudin Noor</p></div>
<?php if (! empty($error)): ?><div class="err" role="alert"><?= esc($error) ?></div><?php endif ?>
<label>Username<input name="username" autocomplete="username" required autofocus></label>
<label>Password<input name="password" type="password" autocomplete="current-password" required></label>
<button type="submit">Masuk</button>
</form></body></html>
