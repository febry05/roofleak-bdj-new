<!DOCTYPE html>
<html lang="id"><head><meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Monitoring Penanganan Kebocoran Atap – Bandara Syamsudin Noor</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px);
--bg:#eef2f7;--card:#fff;--ink:#0d1b36;--mut:#5b6882;--line:#d9e0ec;--navy:#0b2a5b;--p1:#c8202f;--p2:#e8920c;--p3:#2f8f3e;--map:#dde6f1;--bld:#f7faff;
--s0:#8791a5;--s1:#3b6fd8;--s2:#7a4fd0;--s3:#0f9d8a;--inp:#f6f8fc}
@media (prefers-color-scheme:dark){:root:not([data-theme="light"]){color-scheme:dark;--bg:#0a1325;--card:#111d36;--ink:#e8eefb;--mut:#93a1bf;--line:#243252;--navy:#7fa6ff;--map:#14213c;--bld:#1b2c4f;--inp:#0c1730;--p1:#ef4a58;--p2:#f5a524;--p3:#4ab35a;--s0:#8d98b0;--s1:#6b9bff;--s2:#a58aff;--s3:#2dc9b2}}
:root[data-theme="dark"]{color-scheme:dark;--bg:#0a1325;--card:#111d36;--ink:#e8eefb;--mut:#93a1bf;--line:#243252;--navy:#7fa6ff;--map:#14213c;--bld:#1b2c4f;--inp:#0c1730;--p1:#ef4a58;--p2:#f5a524;--p3:#4ab35a;--s0:#8d98b0;--s1:#6b9bff;--s2:#a58aff;--s3:#2dc9b2}
html{scroll-padding-top:env(safe-area-inset-top,0px)}
*{box-sizing:border-box}
body{margin:0;background:var(--bg);color:var(--ink);font:14px/1.45 'Plus Jakarta Sans',system-ui,-apple-system,'Segoe UI',sans-serif}
header{background:#0b2a5b;color:#fff;padding:18px clamp(14px,3vw,32px)}
header .in{max-width:1280px;margin:auto;display:flex;gap:16px;align-items:center;justify-content:space-between;flex-wrap:wrap}
h1{font-size:clamp(18px,2.4vw,26px);margin:0;font-weight:800;letter-spacing:-.01em}
header p{margin:2px 0 0;opacity:.8;font-size:13px}
.sy{font-size:12px;font-weight:600;padding:6px 10px;border-radius:99px;background:rgba(255,255,255,.14);color:#fff}.sy[data-ok="1"]::before,.sy[data-ok="0"]::before{content:"";display:inline-block;width:8px;height:8px;border-radius:50%;margin-right:6px;background:#f5a524}.sy[data-ok="1"]::before{background:#4ade80}
.maph{display:flex;justify-content:space-between;align-items:center;gap:8px;margin-bottom:12px;flex-wrap:wrap}.maph h2{margin:0}.add{background:var(--navy);color:var(--card);border:0;border-radius:8px;padding:7px 12px;font-weight:700;cursor:pointer}.af{margin-top:12px;border:2px dashed var(--navy);border-radius:10px;padding:12px}.af[hidden]{display:none}.btnl{border:1px solid var(--line);background:var(--inp);border-radius:8px;padding:7px 12px;font-weight:600;cursor:pointer}.dng{color:var(--p1);border-color:var(--p1)}svg.map.adding{cursor:crosshair}
a.btn{text-decoration:none}.ro{background:var(--inp);border:1px solid var(--line);border-radius:8px;padding:8px 12px;font-size:12.5px;color:var(--mut)}
.btns{display:flex;gap:8px;flex-wrap:wrap}
button,select,input,textarea{font:inherit;color:inherit}
.btn{background:rgba(255,255,255,.12);color:#fff;border:1px solid rgba(255,255,255,.3);border-radius:8px;padding:7px 12px;cursor:pointer;font-weight:600}
.btn:hover{background:rgba(255,255,255,.22)}
:focus-visible{outline:3px solid #f5a524;outline-offset:2px}
main{max-width:1280px;margin:auto;padding:18px clamp(14px,3vw,32px) 40px;display:grid;gap:16px}
.card{background:var(--card);border:1px solid var(--line);border-radius:12px;padding:16px}
h2{font-size:15px;margin:0 0 12px;font-weight:700}
.kpis{display:grid;grid-template-columns:1.3fr repeat(4,1fr);gap:12px}
.kpi{border-left:5px solid var(--c,var(--line))}
.kpi b{display:block;font-size:30px;line-height:1.1;font-weight:800}
.kpi span{color:var(--mut);font-size:12.5px}
.prog{display:flex;align-items:center;gap:14px}
.bar{height:10px;border-radius:6px;background:var(--line);overflow:hidden;display:flex;margin-top:8px}
.bar i{display:block;height:100%}
.grid{display:grid;grid-template-columns:minmax(0,1.05fr) minmax(0,1fr);gap:16px}
svg.map{width:100%;height:auto;background:var(--map);border-radius:8px;display:block}
.mk{cursor:pointer}
.mk text{font-size:13px;font-weight:700;fill:#fff;pointer-events:none}
.legend{display:flex;flex-wrap:wrap;gap:6px 14px;margin-top:10px;font-size:12px;color:var(--mut)}
.dot{display:inline-block;width:11px;height:11px;border-radius:50%;vertical-align:-1px;margin-right:5px}
.zones{display:grid;grid-template-columns:repeat(4,1fr);gap:8px;margin-top:12px}
.z{border:1px solid var(--line);border-radius:8px;padding:8px 10px;cursor:pointer;background:var(--inp);text-align:left}
.z[aria-pressed=true]{border-color:var(--navy);box-shadow:0 0 0 2px var(--navy) inset}
.z b{font-size:12px;display:block}.z small{color:var(--mut)}
.tools{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:10px}
.tools input,.tools select{background:var(--inp);border:1px solid var(--line);border-radius:8px;padding:7px 10px;min-width:0}
.tools input{flex:1 1 130px}
.tw{max-height:430px;overflow:auto;border:1px solid var(--line);border-radius:8px}
table{width:100%;border-collapse:collapse;font-size:13px}
th,td{padding:8px 10px;text-align:left;border-bottom:1px solid var(--line);white-space:nowrap}
th{position:sticky;top:0;background:var(--card);font-size:12px;color:var(--mut)}
tr.r{cursor:pointer}tr.r:hover,tr.sel{background:var(--inp)}
.pill{display:inline-block;padding:2px 9px;border-radius:99px;font-size:12px;font-weight:700;color:#fff;background:var(--c)}
.pr{display:inline-block;width:22px;height:22px;border-radius:6px;color:#fff;text-align:center;font-weight:800;font-size:12px;line-height:22px;background:var(--c)}
.late{color:var(--p1);font-weight:700}
.det{display:grid;grid-template-columns:1fr 1fr;gap:12px 16px}
.det label{display:grid;gap:4px;font-size:12px;color:var(--mut);font-weight:600}
.det input,.det select,.det textarea{background:var(--inp);border:1px solid var(--line);border-radius:8px;padding:8px 10px;color:var(--ink);width:100%}
.full{grid-column:1/-1}
.sbtn{display:flex;gap:6px;flex-wrap:wrap}
.sbtn button{flex:1;border:2px solid var(--c);background:transparent;color:var(--c);border-radius:8px;padding:7px 8px;font-weight:700;cursor:pointer}
.sbtn button[aria-pressed=true]{background:var(--c);color:#fff}
a{color:var(--navy);font-weight:600}
.note{font-size:12px;color:var(--mut)}
@media(max-width:900px){.kpis{grid-template-columns:1fr 1fr}.kpis .prog{grid-column:1/-1}.grid{grid-template-columns:1fr}.zones{grid-template-columns:1fr 1fr}.det{grid-template-columns:1fr}}
.tabs{display:flex;border:1px solid var(--line);border-radius:8px;overflow:hidden}.tabs button{border:0;background:var(--inp);padding:6px 12px;font-weight:600;cursor:pointer}.tabs button[aria-pressed=true]{background:var(--navy);color:var(--card)}
.kb{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:8px;max-height:470px;overflow:auto}.kb[hidden]{display:none}
.col{border:1px solid var(--line);border-radius:8px;background:var(--inp);padding:8px;min-height:120px}.col.over{outline:2px dashed var(--c)}.col h3{margin:0 0 8px;font-size:12.5px;color:var(--c)}
.kc{background:var(--card);border:1px solid var(--line);border-left:5px solid var(--c);border-radius:8px;padding:8px;margin-bottom:6px;cursor:grab;font-size:12.5px}.kc:active{cursor:grabbing}.kc b{display:block}.kc small{color:var(--mut)}.kc .mv{display:flex;justify-content:space-between;margin-top:4px}.kc .mv button{border:1px solid var(--line);background:var(--inp);border-radius:6px;cursor:pointer;padding:0 8px}
.sumg{display:grid;grid-template-columns:auto 1fr;gap:24px;align-items:center}.lgd{display:grid;gap:4px;margin-top:8px}.lgd button{display:flex;align-items:center;gap:6px;border:0;background:none;text-align:left;cursor:pointer;padding:2px 4px;border-radius:6px;font-size:12.5px}.lgd button:hover,.lgd button[aria-pressed=true]{background:var(--inp)}
.zr{display:grid;grid-template-columns:150px 1fr 46px;gap:10px;align-items:center;margin-bottom:8px;cursor:pointer;font-size:12.5px;border:0;background:none;width:100%;text-align:left;padding:2px}.zr .bar{margin:0;height:14px}.zr[aria-pressed=true]{background:var(--inp);border-radius:6px}
@media(max-width:900px){.sumg{grid-template-columns:1fr}.kb{grid-template-columns:1fr}.zr{grid-template-columns:100px 1fr 40px}}
</style><script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script></head><body>
<header><div class="in"><div><h1>Monitoring Penanganan Kebocoran Atap</h1><p>Bandara Internasional Syamsudin Noor · Sumber: survei ArcGIS Field Maps, November 2026</p></div>
<div class="btns"><span class="sy" data-ok="1"><?= esc($user["nama"]) ?> · <?= $isAdmin ? "Admin" : "Hanya lihat" ?></span><button class="btn" id="xl">Unduh Excel</button><button class="btn" id="exp">Unduh CSV</button><?php if ($isAdmin): ?><a class="btn" href="<?= site_url("users") ?>">Kelola pengguna</a><?php endif ?><a class="btn" href="<?= site_url("logout") ?>">Keluar</a><span class="sy" id="sy" data-ok="0">Menyambung…</span></div></div></header>
<main>
<section class="kpis" id="kpis"></section>
<section class="card" id="sum"></section>
<section class="grid">
<div class="card"><div class="maph"><h2>Peta sebaran titik – Bandara Syamsudin Noor</h2><button class="add" id="ab">+ Titik baru</button></div><svg class="map" id="map" viewBox="0 0 893 875" role="img" aria-label="Peta sebaran titik kebocoran"></svg>
<div class="legend" id="lg"></div><div class="zones" id="zones"></div><div class="af det" id="af" hidden></div></div>
<div class="card"><div class="maph"><h2>Daftar titik</h2><div class="tabs" id="tabs"><button data-v="tabel" aria-pressed="true">Tabel</button><button data-v="kanban" aria-pressed="false">Kanban</button></div></div><div class="tools"><input id="q" type="search" placeholder="Cari titik, PIC, catatan" aria-label="Cari"><select id="fs" aria-label="Filter status"></select></div>
<div class="tw"><table><thead><tr><th>Titik</th><th>Prio</th><th>Zona</th><th>Status</th><th>Target</th></tr></thead><tbody id="tb"></tbody></table></div>
<div class="kb" id="kb" hidden></div><p class="note" id="cnt"></p></div></section>
<section class="card" id="dc"><h2 id="dh">Detail penanganan</h2><div id="dd"></div></section>
<p class="note">Data tersimpan di database MySQL dan diperbarui otomatis setiap 20 detik. Admin dapat mengubah data, sedangkan akun user hanya dapat melihat. Zona dan prioritas ditentukan dari posisi koordinat sesuai legenda peta: Airside dan Tengah-Atas Prioritas 1, Sayap Kanan Prioritas 2, Sayap Kiri Prioritas 3.</p>
</main>
<script>
const CAN=<?= $isAdmin ? "true" : "false" ?>,CSRF="<?= esc($csrf) ?>",API="<?= site_url("api") ?>";let D=[];
const POS={};
const Z={airside:{l:'Airside / Atap Datar',p:1},tengah:{l:'Tengah-Atas',p:1},kanan:{l:'Sayap Kanan',p:2},kiri:{l:'Sayap Kiri',p:3}};
const S=['Belum Ditangani','Dijadwalkan','Dalam Perbaikan','Selesai'];
const SC=['--s0','--s1','--s2','--s3'];
const PC={1:'--p1',2:'--p2',3:'--p3'};
const pos=d=>POS[d.id]||[d.x,d.y];
const KEY='sn-leak-monitor-v1';
let st={},zf=null,sel=null;
let col=null,addMode=false,addPos=null;
const setSync=(m,ok)=>{$('sy').textContent=m;$('sy').dataset.ok=ok?1:0};
const g=d=>st[d.id]||{s:0,pic:'',t:'',n:'',u:'',log:[]};
const $=id=>document.getElementById(id);
const esc=s=>String(s).replace(/[&<>"]/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;'}[c]));
const today=new Date().toISOString().slice(0,10);
const late=d=>{const x=g(d);return x.t&&x.t<today&&x.s<3};
const list=()=>{const q=$('q').value.toLowerCase(),f=$('fs').value;
return D.filter(d=>{const x=g(d);return(!zf||d.zone===zf)&&(f===''||x.s==f)&&(!q||(d.alias.join(' ')+x.pic+x.n+Z[d.zone].l).toLowerCase().includes(q))})
.sort((a,b)=>Z[a.zone].p-Z[b.zone].p||a.id.localeCompare(b.id))};
function kpis(){const c=[0,0,0,0];D.forEach(d=>c[g(d).s]++);const n=D.length,pct=Math.round(c[3]/n*100);
const p1=D.filter(d=>Z[d.zone].p==1),p1d=p1.filter(d=>g(d).s==3).length,ov=D.filter(late).length;
$('kpis').innerHTML=`<div class="card prog kpi" style="--c:var(--navy)"><div style="flex:1"><span>Progres penanganan</span><b>${pct}%</b><div class="bar">${c.map((v,i)=>`<i style="width:${v/n*100}%;background:var(${SC[i]})"></i>`).reverse().join('')}</div><span>${c[3]} dari ${n} lokasi selesai · ${ov} lewat target</span></div></div>`+
S.slice(0,3).map((s,i)=>`<div class="card kpi" style="--c:var(${SC[i]})"><b>${c[i]}</b><span>${s}</span></div>`).join('')+
`<div class="card kpi" style="--c:var(--p1)"><b>${p1d}/${p1.length}</b><span>Prioritas 1 selesai</span></div>`}
function map(){let h=`<image href="<?= base_url("assets/peta_bandara.jpg") ?>?v=<?= @filemtime(FCPATH . "assets/peta_bandara.jpg") ?>" x="0" y="0" width="893" height="875"/>`;
const vis=new Set(list().map(d=>d.id));
D.forEach(d=>{const[x,y]=pos(d),x_=g(d),on=vis.has(d.id);
h+=`<g class="mk" tabindex="0" role="button" data-id="${d.id}" opacity="${on?1:.22}"><title>${esc(d.alias.join(', '))} · ${S[x_.s]}</title>${sel===d.id?`<circle cx="${x}" cy="${y}" r="25" fill="none" stroke="#fff" stroke-width="4"/><circle cx="${x}" cy="${y}" r="25" fill="none" stroke="#0d1b36" stroke-width="2"/>`:''}<circle cx="${x}" cy="${y}" r="16" fill="var(${PC[Z[d.zone].p]})" stroke="var(${SC[x_.s]})" stroke-width="5"/><circle cx="${x}" cy="${y}" r="18.5" fill="none" stroke="#fff" stroke-width="1.5"/><text x="${x}" y="${y+4.5}" text-anchor="middle">${x_.s==3?'✓':(d.lab||d.id.slice(1))}</text></g>`});
if(addPos)h+=`<g pointer-events="none"><circle cx="${addPos[0]}" cy="${addPos[1]}" r="18" fill="#fff" stroke="var(--navy)" stroke-width="4" stroke-dasharray="5 3"/><text x="${addPos[0]}" y="${addPos[1]+5}" text-anchor="middle" style="fill:#0b2a5b;font-size:15px;font-weight:800">+</text></g>`;
$('map').innerHTML=h;$('map').classList.toggle('adding',addMode);
$('map').querySelectorAll('.mk').forEach(e=>{e.onclick=()=>pick(e.dataset.id);e.onkeydown=ev=>{if(ev.key==='Enter'||ev.key===' '){ev.preventDefault();pick(e.dataset.id)}}})}
function zones(){$('zones').innerHTML=Object.keys(Z).map(k=>{const a=D.filter(d=>d.zone===k),dn=a.filter(d=>g(d).s==3).length;
return `<button class="z" data-z="${k}" aria-pressed="${zf===k}"><b><span class="dot" style="background:var(${PC[Z[k].p]})"></span>${Z[k].l}</b><small>Prioritas ${Z[k].p} · ${dn}/${a.length} selesai</small></button>`}).join('');
$('zones').querySelectorAll('.z').forEach(b=>b.onclick=()=>{zf=zf===b.dataset.z?null:b.dataset.z;all()})}
function table(){const a=list();$('tb').innerHTML=a.map(d=>{const x=g(d);return `<tr class="r ${sel===d.id?'sel':''}" data-id="${d.id}" tabindex="0"><td><b>${d.name}</b>${d.n>1?` <small class="note">(${d.n}x survei)</small>`:''}</td><td><span class="pr" style="--c:var(${PC[Z[d.zone].p]})">${Z[d.zone].p}</span></td><td>${Z[d.zone].l}</td><td><span class="pill" style="--c:var(${SC[x.s]})">${S[x.s]}</span></td><td class="${late(d)?'late':''}">${x.t||'–'}${late(d)?' ⚠':''}</td></tr>`}).join('')||'<tr><td colspan="5">Tidak ada titik yang cocok dengan filter.</td></tr>';
$('cnt').textContent=`Menampilkan ${a.length} dari ${D.length} lokasi`;
$('tb').querySelectorAll('tr.r').forEach(r=>{r.onclick=()=>pick(r.dataset.id);r.onkeydown=e=>{if(e.key==='Enter')pick(r.dataset.id)}})}
function detail(){const d=D.find(x=>x.id===sel);if(!d){$('dh').textContent='Detail penanganan';$('dd').innerHTML='<p class="note">Pilih titik pada peta atau tabel untuk memperbarui status, PIC, target, dan catatan.</p>';return}
const x=g(d),c=d.lat!=null&&d.lon!=null?(+d.lat).toFixed(6)+','+(+d.lon).toFixed(6):null;
$('dh').textContent=d.alias.join(', ')+' · '+Z[d.zone].l;
$('dd').innerHTML=`<div class="det"><div class="full"><div class="sbtn">${S.map((s,i)=>`<button style="--c:var(${SC[i]})" data-s="${i}" aria-pressed="${x.s==i}">${s}</button>`).join('')}</div></div>
<label>PIC / Penanggung jawab<input id="fp" value="${esc(x.pic)}" placeholder="Nama tim atau vendor"></label>
<label>Target selesai<input id="ft" type="date" value="${x.t}"></label>
<label class="full">Catatan penanganan<textarea id="fn" rows="3" placeholder="Penyebab, metode perbaikan, material, hasil uji">${esc(x.n)}</textarea></label>
<div class="full note">${c?`Koordinat ${c} · `:'Koordinat belum diisi · '}Prioritas ${Z[d.zone].p}${x.u?' · Diperbarui '+x.u:''}${c?` · <a target="_blank" rel="noopener" href="https://www.google.com/maps/search/?api=1&query=${c}">Google Maps</a> · <a target="_blank" rel="noopener" href="https://earth.google.com/web/@${c},50a,300d,35y,0h,0t,0r">Google Earth</a>`:''}</div>
${(x.log||[]).length?`<div class="full note"><b>Riwayat status:</b> ${x.log.slice(0,5).map(l=>esc(l.a)+' ('+esc(l.w)+')').join(' → ')}</div>`:''}
${d.custom&&CAN?'<div class="full"><button class="btnl dng" id="del">Hapus titik ini</button></div>':''}</div>`;
if(!CAN)$('dd').querySelectorAll('input,textarea,.sbtn button').forEach(e=>e.disabled=true);
const up=(k,v)=>{if(!CAN)return;const o={...g(d)};o[k]=v;o.u=new Date().toLocaleString('id-ID',{dateStyle:'medium',timeStyle:'short'});if(k==='s')o.log=[{w:o.u,a:S[v]}].concat(o.log||[]).slice(0,15);put(d.id,o);kpis();map();zones();table()};
$('dd').querySelectorAll('[data-s]').forEach(b=>b.onclick=()=>{up('s',+b.dataset.s);detail()});
$('fp').onchange=e=>up('pic',e.target.value);$('ft').onchange=e=>{up('t',e.target.value)};$('fn').onchange=e=>up('n',e.target.value);
if($('del'))$('del').onclick=()=>{if(confirm('Hapus titik '+d.name+' dari database?')){remove(d.id)}}}
function pick(id){sel=id;all();$('dc').scrollIntoView({behavior:'smooth',block:'nearest'})}
let view='tabel';
function all(keep){summary();kanban();kpis();map();zones();table();if(!(keep&&document.activeElement&&$('dd').contains(document.activeElement)))detail()}
$('fs').innerHTML='<option value="">Semua status</option>'+S.map((s,i)=>`<option value="${i}">${s}</option>`).join('');
$('lg').innerHTML=[1,2,3].map(p=>`<span><i class="dot" style="background:var(${PC[p]})"></i>Prioritas ${p}</span>`).join('')+S.map((s,i)=>`<span><i class="dot" style="background:transparent;border:3px solid var(${SC[i]})"></i>${s}</span>`).join('');
$('q').oninput=all;$('fs').onchange=all;

function summary(){const c=[0,0,0,0];D.forEach(d=>c[g(d).s]++);const n=D.length||1,R_=48,C=2*Math.PI*R_;let off=0;
const f=$('fs').value;
let seg='';c.forEach((v,i)=>{const L=v/n*C;seg+=`<circle cx="70" cy="70" r="${R_}" fill="none" stroke="var(${SC[i]})" stroke-width="20" stroke-dasharray="${L} ${C-L}" stroke-dashoffset="${-off}" transform="rotate(-90 70 70)" data-s="${i}" style="cursor:pointer"><title>${S[i]}: ${v}</title></circle>`;off+=L});
const z=Object.keys(Z).map(k=>{const a=D.filter(d=>d.zone===k),cs=[0,0,0,0];a.forEach(d=>cs[g(d).s]++);
return `<button class="zr" data-z="${k}" aria-pressed="${zf===k}"><span><span class="dot" style="background:var(${PC[Z[k].p]})"></span>${Z[k].l}</span><span class="bar">${cs.map((v,i)=>`<i style="width:${v/(a.length||1)*100}%;background:var(${SC[i]})"></i>`).join('')}</span><span>${cs[3]}/${a.length}</span></button>`}).join('');
$('sum').innerHTML=`<div class="sumg"><div><svg width="140" height="140" viewBox="0 0 140 140" role="img" aria-label="Distribusi status">${seg}<text x="70" y="68" text-anchor="middle" font-size="24" font-weight="800" fill="var(--ink)">${Math.round(c[3]/n*100)}%</text><text x="70" y="86" text-anchor="middle" font-size="10" fill="var(--mut)">selesai</text></svg></div>
<div><h2>Ringkasan status dan zona</h2>${z}<div class="lgd" style="grid-template-columns:repeat(4,auto);justify-content:start;gap:4px 14px">${S.map((s,i)=>`<button data-s="${i}" aria-pressed="${f===String(i)}"><i class="dot" style="background:var(${SC[i]})"></i>${s} (${c[i]})</button>`).join('')}</div></div></div>`;
$('sum').querySelectorAll('[data-s]').forEach(e=>e.onclick=()=>{const v=e.dataset.s;$('fs').value=$('fs').value===v?'':v;all()});
$('sum').querySelectorAll('.zr').forEach(e=>e.onclick=()=>{zf=zf===e.dataset.z?null:e.dataset.z;all()})}
function setStatus(id,s){if(!CAN)return;const d=D.find(x=>x.id===id);if(!d||g(d).s===s)return;const o={...g(d)};o.s=s;o.u=new Date().toLocaleString('id-ID',{dateStyle:'medium',timeStyle:'short'});o.log=[{w:o.u,a:S[s]}].concat(o.log||[]).slice(0,15);put(id,o);all()}
function kanban(){const a=list();$('kb').innerHTML=S.map((s,i)=>`<div class="col" data-c="${i}" style="--c:var(${SC[i]})"><h3>${s} (${a.filter(d=>g(d).s===i).length})</h3>${a.filter(d=>g(d).s===i).map(d=>{const x=g(d);return `<div class="kc" draggable="${CAN}" data-id="${d.id}" style="--c:var(${PC[Z[d.zone].p]})"><b>${esc(d.name)}</b><small>${Z[d.zone].l}${x.pic?' · '+esc(x.pic):''}${x.t?' · '+x.t:''}${late(d)?' ⚠':''}</small><div class="mv" ${CAN?"":"hidden"}><button data-m="-1" aria-label="Mundur" ${i==0?'disabled':''}>‹</button><button data-m="1" aria-label="Maju" ${i==3?'disabled':''}>›</button></div></div>`}).join('')}</div>`).join('');
$('kb').querySelectorAll('.kc').forEach(k=>{k.ondragstart=e=>e.dataTransfer.setData('text/plain',k.dataset.id);k.onclick=e=>{if(e.target.closest('button'))return;pick(k.dataset.id)};
k.querySelectorAll('button').forEach(b=>b.onclick=()=>{const d=D.find(x=>x.id===k.dataset.id);setStatus(d.id,Math.max(0,Math.min(3,g(d).s+ +b.dataset.m)))})});
$('kb').querySelectorAll('.col').forEach(c=>{c.ondragover=e=>{e.preventDefault();c.classList.add('over')};c.ondragleave=()=>c.classList.remove('over');c.ondrop=e=>{e.preventDefault();c.classList.remove('over');setStatus(e.dataTransfer.getData('text/plain'),+c.dataset.c)}})}
document.querySelectorAll('#tabs button').forEach(b=>b.onclick=()=>{view=b.dataset.v;document.querySelectorAll('#tabs button').forEach(x=>x.setAttribute('aria-pressed',x===b));document.querySelector('.tw').hidden=view!=='tabel';$('kb').hidden=view!=='kanban'});
function saveFile(name,data){const u=URL.createObjectURL(new Blob([data]));const a=document.createElement('a');a.href=u;a.download=name;a.click();setTimeout(()=>URL.revokeObjectURL(u),3000)}
$('xl').onclick=()=>{if(typeof XLSX==='undefined'){setSync('Pustaka Excel gagal dimuat',0);return}
const wb=XLSX.utils.book_new(),A=(n,r)=>XLSX.utils.book_append_sheet(wb,XLSX.utils.json_to_sheet(r),n),rw=[];
A('titik_kebocoran',D.map(d=>({id_titik:d.id,nama:d.name,alias_survei:d.alias.join(', '),kode_zona:d.zone,zona:Z[d.zone].l,prioritas:Z[d.zone].p,latitude:d.lat??'',longitude:d.lon??'',pos_x:pos(d)[0],pos_y:pos(d)[1],jumlah_survei:d.n,asal:d.custom?'baru':'survei'})));
A('penanganan',D.map(d=>{const x=g(d);return{id_titik:d.id,nama:d.name,status:S[x.s],pic:x.pic,target_selesai:x.t,catatan:x.n,diperbarui:x.u}}));
D.forEach(d=>(g(d).log||[]).forEach(l=>rw.push({id_titik:d.id,waktu:l.w,status:l.a})));A('riwayat_status',rw);
saveFile('database_kebocoran_atap.xlsx',XLSX.write(wb,{type:'array',bookType:'xlsx'}))};
$('exp').onclick=()=>{const rows=[['Titik','Alias survei','Zona','Prioritas','Latitude','Longitude','Status','PIC','Target','Catatan','Diperbarui']];
D.forEach(d=>{const x=g(d);rows.push([d.name,d.alias.join(' / '),Z[d.zone].l,Z[d.zone].p,d.lat,d.lon,S[x.s],x.pic,x.t,x.n,x.u])});
const csv=rows.map(r=>r.map(v=>'"'+String(v).replace(/"/g,'""')+'"').join(',')).join('\n');
saveFile('monitoring_kebocoran_atap.csv','\ufeff'+csv)};

async function api(path,body){const r=await fetch(API+'/'+path,{method:body?'POST':'GET',headers:{'Content-Type':'application/json','X-CSRF':CSRF,'X-Requested-With':'XMLHttpRequest'},body:body?JSON.stringify(body):undefined,credentials:'same-origin',cache:'no-store'});
if(r.status===403){const j=await r.json().catch(()=>({}));throw new Error(j.error||'Akses ditolak')}
if(r.redirected||!r.ok)throw new Error(r.redirected?'Sesi berakhir. Muat ulang dan masuk lagi.':'Kesalahan server ('+r.status+')');return r.json()}
function applyRows(rows,keep){st={};D=[];const cu=[];rows.forEach(r=>{st[r.id]={s:+r.s,pic:r.pic||'',t:r.t||'',n:r.note||'',u:r.u||'',log:r.log||[]};
const d={id:r.id,name:r.name,alias:String(r.alias||r.name).split(', '),zone:Z[r.zone]?r.zone:'kiri',lat:r.lat==null?null:+r.lat,lon:r.lon==null?null:+r.lon,n:+r.n,x:+r.x,y:+r.y,custom:!!+r.custom};D.push(d);if(d.custom)cu.push(d)});
cu.forEach((d,i)=>d.lab='N'+(i+1));if(sel&&!D.find(d=>d.id===sel))sel=null;all(keep)}
async function load(keep){try{applyRows(await api('titik'),keep);setSync(CAN?'Terhubung ke MySQL (mode admin)':'Terhubung ke MySQL (hanya lihat)',1)}catch(e){setSync(e.message,0)}}
async function put(id,v){if(!CAN)return;st[id]=v;try{setSync('Menyimpan…',1);await api('penanganan',{id,s:v.s,pic:v.pic,t:v.t,n:v.n});await load(true);setSync('Tersimpan di database MySQL',1)}catch(e){setSync(e.message,0);load(true)}}
async function remove(id){try{await api('hapus',{id});sel=null;await load()}catch(e){setSync(e.message,0)}}
// tambah titik baru
function openAdd(){addMode=true;addPos=null;sel=null;const af=$('af');af.hidden=false;
af.innerHTML=`<div class="full"><b>Titik kebocoran baru</b><div class="note" id="ap">Klik lokasi pada peta untuk menaruh titik.</div></div>
<label>Nama titik<input id="an" placeholder="Contoh: Titik 29"></label>
<label>Zona<select id="az">${Object.keys(Z).map(k=>`<option value="${k}">${Z[k].l} (Prioritas ${Z[k].p})</option>`).join('')}</select></label>
<label>Latitude (opsional)<input id="ala" inputmode="decimal" placeholder="-3.437210"></label>
<label>Longitude (opsional)<input id="alo" inputmode="decimal" placeholder="114.762249"></label>
<div class="full sbtn"><button class="btnl" id="asv" style="flex:0 0 auto;background:var(--navy);color:var(--card)">Simpan titik</button><button class="btnl" id="acn" style="flex:0 0 auto">Batal</button></div>`;
$('acn').onclick=closeAdd;
$('asv').onclick=async()=>{const nm=$('an').value.trim();if(!nm){$('ap').textContent='Isi nama titik dulu.';return}if(!addPos){$('ap').textContent='Klik lokasi pada peta dulu.';return}
const num=s=>{const v=parseFloat(String(s).replace(',','.'));return isFinite(v)?v:null};
try{const r=await api('tambah',{name:nm,zone:$('az').value,lat:num($('ala').value),lon:num($('alo').value),x:addPos[0],y:addPos[1]});closeAdd();await load();pick(r.id)}catch(e){$('ap').textContent=e.message}};
map();$('af').scrollIntoView({behavior:'smooth',block:'nearest'})}
function closeAdd(){addMode=false;addPos=null;$('af').hidden=true;map()}
$('ab').onclick=()=>addMode?closeAdd():openAdd();
$('map').addEventListener('click',e=>{if(!addMode||e.target.closest('.mk'))return;const sv=$('map'),p=sv.createSVGPoint();p.x=e.clientX;p.y=e.clientY;const q=p.matrixTransform(sv.getScreenCTM().inverse());
addPos=[Math.max(0,Math.min(893,Math.round(q.x))),Math.max(0,Math.min(875,Math.round(q.y)))];$('ap').textContent='Posisi dipilih. Klik lagi untuk memindahkan, lalu simpan.';map()});
if(!CAN){$('ab').hidden=true;$('map').insertAdjacentHTML('beforebegin','<p class="ro">Akun Anda hanya dapat melihat data. Hubungi admin untuk mengubah status penanganan.</p>')}
all();load();setInterval(()=>{if(!document.hidden)load(true)},20000);
</script></body></html>
