<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard Penyewa - ALIVARE</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  body{font-family:'Inter',system-ui,sans-serif}
  .nav-item{display:flex;align-items:center;gap:12px;padding:12px 16px;border-radius:12px;color:#334155;font-weight:500;cursor:pointer;width:100%;text-align:left}
  .nav-item:hover{background:#f8fafc}
  .nav-item.active{background:#eff6ff;color:#2563eb}
  .card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 1px 2px rgba(15,23,42,.04)}
  .badge{display:inline-block;padding:2px 10px;border-radius:999px;font-size:12px;font-weight:600}
  .input{width:100%;border:1px solid #e2e8f0;border-radius:12px;padding:10px 14px;background:#fff;outline:none}
  .input:focus{border-color:#2563eb;box-shadow:0 0 0 3px #dbeafe}
  .btn{background:#2563eb;color:#fff;font-weight:600;padding:10px 20px;border-radius:12px}
  .btn:hover{background:#1d4ed8}
  .page{display:none}.page.active{display:block}
</style>
</head>
<body class="bg-slate-50 text-slate-900">

<!-- Header -->
<header class="bg-white border-b border-slate-200 h-20 flex items-center px-6 gap-6 fixed top-0 inset-x-0 z-20">
  <div class="w-56 text-2xl font-bold tracking-tight text-slate-900">Alivare</div>
  <div class="relative flex-1 max-w-xl hidden md:block">
    <input class="input pl-11 bg-slate-50" placeholder="Cari tagihan, pengaduan, atau pengumuman...">
    <svg class="w-5 h-5 absolute left-4 top-3 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4-4"/></svg>
  </div>
  <div class="ml-auto flex items-center gap-4">
    <button onclick="show('pengumuman')" class="relative text-slate-500" aria-label="Notifikasi">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 8a6 6 0 1 1 12 0c0 7 3 9 3 9H3s3-2 3-9M10 21h4"/></svg>
      <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full"></span>
    </button>
    <div class="w-11 h-11 rounded-full bg-blue-100 text-blue-700 font-bold flex items-center justify-center border border-blue-200">S</div>
  </div>
</header>

<!-- Sidebar -->
<aside class="hidden lg:block fixed top-20 bottom-0 left-0 w-72 bg-white border-r border-slate-200 p-6">
  <p class="text-xs font-semibold text-slate-500 tracking-wide mb-4 px-1">MENU UTAMA</p>
  <nav class="space-y-1" id="nav"></nav>
</aside>

<main class="lg:ml-72 pt-28 pb-12 px-6 lg:px-12">

<!-- KAMAR & KONTRAK -->
<section id="kamar" class="page">
  <h1 class="text-3xl font-bold">Kamar &amp; Kontrak</h1>
  <p class="text-slate-500 mt-2">Lihat detail kamar, tanggal jatuh tempo sewa, dan kontrak Anda.</p>

  <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mt-8" id="stats"></div>

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-5 mt-6">
    <div class="card p-6">
      <h2 class="font-bold text-lg mb-4">Detail kamar</h2>
      <dl class="divide-y divide-slate-100 text-sm" id="roomDetail"></dl>
    </div>
    <div class="card p-6">
      <h2 class="font-bold text-lg mb-4">Detail kontrak</h2>
      <dl class="divide-y divide-slate-100 text-sm" id="contractDetail"></dl>
      <div class="mt-5">
        <div class="flex justify-between text-sm mb-2"><span class="text-slate-500">Masa kontrak berjalan</span><span class="font-semibold">7 dari 12 bulan</span></div>
        <div class="h-2 bg-slate-100 rounded-full"><div class="h-2 bg-blue-600 rounded-full" style="width:58%"></div></div>
      </div>
    </div>
  </div>
</section>

<!-- PEMBAYARAN -->
<section id="pembayaran" class="page">
  <h1 class="text-3xl font-bold">Pembayaran</h1>
  <p class="text-slate-500 mt-2">Lihat riwayat tagihan dan bayar langsung lewat payment gateway.</p>

  <div class="card mt-8 p-6 flex flex-wrap items-center justify-between gap-4 border-blue-200 bg-blue-50/50">
    <div>
      <p class="text-sm text-slate-500">Tagihan yang harus dibayar</p>
      <p class="text-3xl font-bold mt-1">Rp 1.500.000</p>
      <p class="text-sm text-slate-500 mt-1">Sewa November 2026 · jatuh tempo 25 Nov 2026</p>
    </div>
    <button class="btn" onclick="openPay('INV-2026-11')">Bayar sekarang</button>
  </div>

  <div class="card mt-6 overflow-hidden">
    <div class="px-6 py-5 flex justify-between items-center border-b border-slate-200">
      <h2 class="font-bold text-lg">Riwayat tagihan</h2>
      <span class="text-sm text-slate-500" id="invCount"></span>
    </div>
    <div class="overflow-x-auto">
      <table class="w-full text-sm">
        <thead class="text-left text-slate-500 bg-slate-50"><tr>
          <th class="px-6 py-3 font-medium">No. tagihan</th><th class="px-6 py-3 font-medium">Periode</th>
          <th class="px-6 py-3 font-medium">Jatuh tempo</th><th class="px-6 py-3 font-medium">Jumlah</th>
          <th class="px-6 py-3 font-medium">Status</th><th class="px-6 py-3"></th></tr></thead>
        <tbody id="invBody" class="divide-y divide-slate-100"></tbody>
      </table>
    </div>
  </div>
</section>

<!-- PENGADUAN -->
<section id="pengaduan" class="page">
  <h1 class="text-3xl font-bold">Pengaduan</h1>
  <p class="text-slate-500 mt-2">Kirim permintaan perbaikan atau pemeliharaan ke pengelola.</p>

  <div class="grid grid-cols-1 xl:grid-cols-5 gap-5 mt-8">
    <div class="card p-6 xl:col-span-2 self-start">
      <h2 class="font-bold text-lg mb-4">Buat pengaduan baru</h2>
      <div class="space-y-4">
        <div><label class="text-sm font-medium block mb-1.5" for="cJudul">Judul</label>
          <input id="cJudul" class="input" placeholder="Contoh: Lampu kamar mati"></div>
        <div><label class="text-sm font-medium block mb-1.5" for="cKat">Kategori</label>
          <select id="cKat" class="input"><option>Listrik</option><option>Air &amp; sanitasi</option><option>AC</option><option>Furnitur</option><option>Lainnya</option></select></div>
        <div><label class="text-sm font-medium block mb-1.5" for="cDesk">Deskripsi</label>
          <textarea id="cDesk" rows="4" class="input" placeholder="Jelaskan masalahnya..."></textarea></div>
        <button class="btn w-full" onclick="addComplaint()">Kirim pengaduan</button>
      </div>
    </div>
    <div class="card xl:col-span-3 overflow-hidden">
      <div class="px-6 py-5 flex justify-between items-center border-b border-slate-200">
        <h2 class="font-bold text-lg">Pengaduan saya</h2><span class="text-sm text-slate-500" id="cCount"></span>
      </div>
      <ul id="cList" class="divide-y divide-slate-100"></ul>
    </div>
  </div>
</section>

<!-- PENGUMUMAN -->
<section id="pengumuman" class="page">
  <h1 class="text-3xl font-bold">Informasi &amp; Pengumuman</h1>
  <p class="text-slate-500 mt-2">Notifikasi dari pengelola, seperti pemadaman listrik dan acara.</p>
  <div class="space-y-4 mt-8 max-w-3xl" id="annList"></div>
</section>

</main>

<!-- Modal pembayaran -->
<div id="payModal" class="fixed inset-0 bg-slate-900/40 hidden items-center justify-center z-30 p-4">
  <div class="card p-6 w-full max-w-md">
    <h2 class="font-bold text-xl">Pilih metode pembayaran</h2>
    <p class="text-sm text-slate-500 mt-1" id="payInfo"></p>
    <div class="space-y-2 mt-5" id="payMethods"></div>
    <div class="flex gap-3 mt-6">
      <button class="flex-1 border border-slate-200 rounded-xl py-2.5 font-semibold text-slate-700 hover:bg-slate-50" onclick="closePay()">Batal</button>
      <button class="btn flex-1" onclick="confirmPay()">Lanjut bayar</button>
    </div>
  </div>
</div>

<div id="toast" class="fixed bottom-6 right-6 bg-slate-900 text-white text-sm px-4 py-3 rounded-xl hidden z-40"></div>

<script>
const I = {
  kamar:'<path d="M3 20V8m0 6h18v6M3 14h18M7 11h4"/>',
  bayar:'<path d="M7 3h8l4 4v14H7zM15 3v4h4M10 12h6M10 16h6"/>',
  aduan:'<path d="M14.7 6.3a4 4 0 0 0-5 5L3 18l3 3 6.7-6.7a4 4 0 0 0 5-5l-2.5 2.5-2-2z"/>',
  info:'<path d="M3 11v2a1 1 0 0 0 1 1h3l6 4V6L7 10H4a1 1 0 0 0-1 1zM17 9a4 4 0 0 1 0 6"/>',
  door:'<path d="M5 21V4h10v17M3 21h18M12 12v1"/>',
  cal:'<rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 10h18M8 3v4M16 3v4"/>',
  clock:'<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
  wallet:'<path d="M3 7h16a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2zM3 7l12-3v3M17 14h2"/>'
};
const svg = (p,c='w-5 h-5') => `<svg class="${c}" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">${p}</svg>`;

const pages = [['kamar','Kamar & Kontrak',I.kamar],['pembayaran','Pembayaran',I.bayar],['pengaduan','Pengaduan',I.aduan],['pengumuman','Pengumuman',I.info]];
document.getElementById('nav').innerHTML = pages.map(([id,l,ic]) =>
  `<button class="nav-item" data-id="${id}" onclick="show('${id}')">${svg(ic,'w-6 h-6')}<span>${l}</span></button>`).join('');

function show(id){
  document.querySelectorAll('.page').forEach(p => p.classList.toggle('active', p.id===id));
  document.querySelectorAll('.nav-item').forEach(n => n.classList.toggle('active', n.dataset.id===id));
  location.hash = id;
}

// Data contoh (ganti dengan data dari backend)
const stats = [
  ['Nomor kamar','A-203',I.door,'bg-blue-50 text-blue-600'],
  ['Jatuh tempo sewa','25 Nov 2026',I.cal,'bg-amber-50 text-amber-500'],
  ['Sisa kontrak','5 bulan',I.clock,'bg-purple-50 text-purple-600'],
  ['Tagihan aktif','1',I.wallet,'bg-emerald-50 text-emerald-500']];
document.getElementById('stats').innerHTML = stats.map(([l,v,ic,c]) =>
  `<div class="card p-6 flex justify-between items-center"><div><p class="text-sm font-medium text-slate-600">${l}</p><p class="text-3xl font-bold mt-2">${v}</p></div><div class="w-14 h-14 rounded-xl flex items-center justify-center ${c}">${svg(ic,'w-7 h-7')}</div></div>`).join('');

const row = (k,v) => `<div class="flex justify-between py-3"><dt class="text-slate-500">${k}</dt><dd class="font-medium text-right">${v}</dd></div>`;
document.getElementById('roomDetail').innerHTML = [
  ['Properti','Kost Melati Residence'],['Alamat','Jl. Kemang Raya No. 12, Jakarta'],['Nomor kamar','A-203 (lantai 2)'],
  ['Tipe kamar','AC'],['Harga sewa','Rp 1.500.000 / bulan'],['Fasilitas','Kasur, lemari, kamar mandi dalam, Wi-Fi'],
  ['Status','<span class="badge bg-emerald-50 text-emerald-600">Terisi</span>']].map(r=>row(...r)).join('');
document.getElementById('contractDetail').innerHTML = [
  ['No. kontrak','KTR-2026-0421'],['Tanggal check-in','25 Apr 2026'],['Tanggal berakhir','24 Apr 2027'],
  ['Durasi','12 bulan'],['Deposit','Rp 1.500.000'],['Tanggal jatuh tempo','Setiap tanggal 25']].map(r=>row(...r)).join('');

const rp = n => 'Rp ' + n.toLocaleString('id-ID');
const status = {Lunas:'bg-emerald-50 text-emerald-600',Belum:'bg-amber-50 text-amber-600',Terlambat:'bg-red-50 text-red-600'};
const invoices = [
  ['INV-2026-11','November 2026','25 Nov 2026',1500000,'Belum'],
  ['INV-2026-10','Oktober 2026','25 Okt 2026',1500000,'Lunas'],
  ['INV-2026-09','September 2026','25 Sep 2026',1500000,'Lunas'],
  ['INV-2026-08','Agustus 2026','25 Agu 2026',1500000,'Lunas'],
  ['INV-2026-07','Juli 2026','25 Jul 2026',1500000,'Lunas']];
document.getElementById('invCount').textContent = invoices.length + ' tagihan';
document.getElementById('invBody').innerHTML = invoices.map(([no,p,d,a,s]) =>
  `<tr><td class="px-6 py-4 font-medium">${no}</td><td class="px-6 py-4">${p}</td><td class="px-6 py-4">${d}</td><td class="px-6 py-4">${rp(a)}</td>
  <td class="px-6 py-4"><span class="badge ${status[s]}">${s==='Belum'?'Belum dibayar':s}</span></td>
  <td class="px-6 py-4 text-right">${s==='Lunas'?'<button class="text-blue-600 font-medium" onclick="toast(\'Mengunduh bukti '+no+'\')">Unduh bukti</button>':'<button class="btn !py-1.5 !px-4 text-sm" onclick="openPay(\''+no+'\')">Bayar</button>'}</td></tr>`).join('');

// Pembayaran
const methods = ['Virtual Account Bank','QRIS','E-wallet (GoPay, OVO, DANA)','Kartu kredit / debit'];
let payInv = null, payMethod = 0;
function renderMethods(){
  document.getElementById('payMethods').innerHTML = methods.map((m,i) =>
    `<label class="flex items-center gap-3 p-3 border rounded-xl cursor-pointer ${i===payMethod?'border-blue-600 bg-blue-50':'border-slate-200'}"><input type="radio" name="pm" ${i===payMethod?'checked':''} onchange="payMethod=${i};renderMethods()" class="accent-blue-600"><span class="font-medium text-sm">${m}</span></label>`).join('');
}
function openPay(no){ payInv=no; payMethod=0; renderMethods();
  document.getElementById('payInfo').textContent = no + ' · ' + rp(1500000);
  const m=document.getElementById('payModal'); m.classList.remove('hidden'); m.classList.add('flex'); }
function closePay(){ const m=document.getElementById('payModal'); m.classList.add('hidden'); m.classList.remove('flex'); }
function confirmPay(){ closePay(); toast('Mengarahkan ke payment gateway untuk ' + payInv); /* TODO: panggil endpoint payment gateway */ }

// Pengaduan
const cStatus = {Pending:'bg-amber-50 text-amber-600','Dalam proses':'bg-blue-50 text-blue-600',Selesai:'bg-emerald-50 text-emerald-600'};
const complaints = [
  ['Keran wastafel bocor','Air & sanitasi','12 Nov 2026','Dalam proses'],
  ['AC tidak dingin','AC','28 Okt 2026','Selesai']];
function renderComplaints(){
  document.getElementById('cCount').textContent = complaints.length + ' pengaduan';
  document.getElementById('cList').innerHTML = complaints.map(([t,k,d,s]) =>
    `<li class="px-6 py-4 flex justify-between items-center gap-4"><div><p class="font-semibold">${t}</p><p class="text-sm text-slate-500 mt-0.5">${k} · diajukan ${d}</p></div><span class="badge whitespace-nowrap ${cStatus[s]}">${s}</span></li>`).join('');
}
function addComplaint(){
  const t=document.getElementById('cJudul'), d=document.getElementById('cDesk');
  if(!t.value.trim() || !d.value.trim()){ toast('Isi judul dan deskripsi terlebih dahulu'); return; }
  const now = new Date().toLocaleDateString('id-ID',{day:'numeric',month:'short',year:'numeric'});
  complaints.unshift([t.value.trim(), document.getElementById('cKat').value, now, 'Pending']);
  t.value=''; d.value=''; renderComplaints(); toast('Pengaduan terkirim');
}
renderComplaints();

// Pengumuman
const ann = [
  ['Pemadaman listrik terjadwal','Sabtu, 21 Nov 2026, pukul 09.00-13.00 untuk perawatan panel utama.','15 Nov 2026','Penting'],
  ['Kumpul penghuni bulanan','Minggu, 29 Nov 2026 pukul 16.00 di area bersama lantai 1.','10 Nov 2026','Acara'],
  ['Pembersihan tangki air','Air akan mati sementara pada Rabu, 18 Nov 2026, pukul 10.00-12.00.','8 Nov 2026','Info']];
const aCol = {Penting:'bg-red-50 text-red-600',Acara:'bg-purple-50 text-purple-600',Info:'bg-blue-50 text-blue-600'};
document.getElementById('annList').innerHTML = ann.map(([t,b,d,k]) =>
  `<article class="card p-6"><div class="flex items-center justify-between gap-3"><h2 class="font-bold text-lg">${t}</h2><span class="badge ${aCol[k]}">${k}</span></div><p class="text-slate-600 mt-2">${b}</p><p class="text-sm text-slate-400 mt-3">Diumumkan ${d}</p></article>`).join('');

function toast(msg){ const t=document.getElementById('toast'); t.textContent=msg; t.classList.remove('hidden'); clearTimeout(t._h); t._h=setTimeout(()=>t.classList.add('hidden'),2800); }

show(pages.some(p=>p[0]===location.hash.slice(1)) ? location.hash.slice(1) : 'kamar');
</script>
</body>
</html>
