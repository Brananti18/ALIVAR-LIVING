<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tagihan - ALIVARE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            /* Warna SaaS Premium ALIVARE */
            --primary: #2563eb; 
            --primary-hover: #1d4ed8;
            --primary-soft: #eff6ff;
            --navy: #0f172a; 
            --navy-light: #1e293b;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-500: #64748b;
            --slate-800: #1e293b;
            --bg-body: #f8fafc;
            --card-bg: #ffffff;
            
            /* Status Colors */
            --success: #10b981;
            --success-bg: #ecfdf5;
            --warning: #f59e0b;
            --warning-bg: #fffbeb;
            --danger: #ef4444;
            --danger-bg: #fef2f2;
            
            /* Geometri & Shadow */
            --radius-sm: 6px;
            --radius-md: 8px;
            --radius-lg: 12px;
            --radius-xl: 16px;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            --shadow-modal: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }

        * { box-sizing: border-box; }
        
        body { 
            margin: 0; 
            background: var(--bg-body); 
            color: var(--navy); 
            font-family: 'Instrument Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        button, input, select, textarea { font: inherit; } 
        button { cursor: pointer; }

        /* ====== HEADER ====== */
        .topbar { 
            min-height: 70px; padding: 0 24px; 
            display: flex; align-items: center; justify-content: space-between; gap: 32px; 
            background: var(--card-bg); border-bottom: 1px solid var(--slate-200); 
            position: sticky; top: 0; z-index: 30; 
        }
        .brand { display: flex; align-items: center; justify-content: center; height: 100%; width: 170px; flex-shrink: 0; }
        .brand img { height: 44px !important; width: auto !important; max-width: 100% !important; object-fit: contain; }

        /* ====== LAYOUT & SIDEBAR ====== */
        .layout { display: flex; min-height: calc(100vh - 70px); }
        .sidebar { width: 220px; padding: 24px 16px; background: var(--card-bg); border-right: 1px solid var(--slate-200); flex-shrink: 0; }
        .nav-label { padding: 8px 12px; color: var(--slate-500); font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; }
        .nav-link { 
            display: flex; align-items: center; flex-direction: row; gap: 12px; 
            width: 100%; min-height: 44px; padding: 10px 12px; margin-bottom: 4px; 
            border-radius: var(--radius-md); text-decoration: none; 
            color: var(--slate-500); font-weight: 500; font-size: 14px;
            transition: 0.2s;
        }
        .nav-link:hover { background: var(--bg-body); color: var(--navy); }
        .nav-link.active { color: var(--primary); background: var(--primary-soft); font-weight: 600; }
        .nav-link.active .nav-icon { color: var(--primary); }
        .nav-icon { 
            width: 20px; height: 20px; flex: 0 0 20px; 
            display: inline-flex; align-items: center; justify-content: center; 
            color: var(--slate-500); 
        }
        .nav-icon svg { width: 20px; height: 20px; max-width: 20px; max-height: 20px; display: block; flex-shrink: 0; }

        .main { flex: 1; min-width: 0; max-width: 1280px; margin: 0 auto; padding: 32px; }

        /* ====== HEADING & BUTTONS ====== */
        .page-heading { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; }
        h1 { margin: 0 0 4px; font-size: 26px; font-weight: 700; letter-spacing: -0.5px; }
        .subtitle { color: var(--slate-500); margin: 0; font-size: 14px; }
        
        .btn { 
            display: inline-flex !important; flex-direction: row !important; align-items: center !important; 
            justify-content: center !important; gap: 8px !important; padding: 10px 18px !important; 
            border-radius: var(--radius-md) !important; font-size: 13px !important; font-weight: 600 !important; 
            text-decoration: none !important; transition: all 0.2s ease !important; white-space: nowrap !important; cursor: pointer !important;
        }
        .btn svg { width: 16px !important; height: 16px !important; max-width: 16px !important; max-height: 16px !important; flex: 0 0 16px !important; display: inline-block !important; margin: 0 !important; }
        .btn-primary { background-color: var(--primary) !important; color: #ffffff !important; border: 1px solid var(--primary) !important; box-shadow: var(--shadow-sm) !important; }
        .btn-primary:hover { background-color: var(--primary-hover) !important; transform: translateY(-1px); box-shadow: var(--shadow-md) !important; }
        .btn-secondary { background-color: #ffffff !important; color: var(--navy) !important; border: 1px solid var(--slate-200) !important; }
        .btn-secondary:hover { background-color: var(--slate-100) !important; }
        .btn-danger { background-color: #ffffff !important; color: var(--danger) !important; border: 1px solid #fecaca !important; }
        .btn-danger:hover { background-color: var(--danger-bg) !important; border-color: #fca5a5 !important; }
        .btn-sm { padding: 7px 12px !important; font-size: 12px !important; gap: 6px !important; }
        .btn-sm svg { width: 14px !important; height: 14px !important; max-width: 14px !important; max-height: 14px !important; flex: 0 0 14px !important; }

        /* Alerts */
        .alert { border-radius: var(--radius-md); padding: 14px 16px; margin-bottom: 24px; font-size: 14px; background: var(--success-bg); color: #065f46; border: 1px solid #a7f3d0; }

        /* ====== PANEL & FILTER ====== */
        .panel { background: var(--card-bg); border: 1px solid var(--slate-200); border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); overflow: hidden; }
        .panel-header { padding: 20px 24px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--slate-200); }
        .panel-header h2 { font-size: 16px; font-weight: 700; margin: 0; }
        .panel-header .subtitle { font-size: 13px; font-weight: 500; }
        
        .filters { display: flex; gap: 16px; padding: 16px 24px; background: #fcfdfd; border-bottom: 1px solid var(--slate-200); }
        .filter-search-wrapper { position: relative; flex: 1; }
        .filter-search-wrapper svg { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--slate-500); width: 16px; height: 16px; }
        .filters input, .filters select { 
            width: 100%; padding: 9px 14px; border: 1px solid var(--slate-200); 
            border-radius: var(--radius-md); background: var(--card-bg); 
            color: var(--navy); font-size: 13px; outline: none; transition: 0.2s;
        }
        .filters input { padding-left: 38px; }
        .filters select { min-width: 180px; width: auto; cursor: pointer; }
        .filters input:focus, .filters select:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1); }

        /* ====== TABEL TAGIHAN ====== */
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th { padding: 14px 24px; background: #fcfdfd; color: var(--slate-500); font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid var(--slate-200); white-space: nowrap; }
        td { padding: 16px 24px; color: var(--navy); font-size: 14px; border-bottom: 1px solid var(--slate-200); vertical-align: middle; }
        tbody tr { transition: background-color 0.2s; }
        tbody tr:hover { background-color: var(--slate-50); }
        tbody tr:last-child td { border-bottom: none; }
        
        /* Status Badges */
        .status { display: inline-flex; align-items: center; gap: 6px; padding: 4px 10px; border-radius: 99px; font-size: 12px; font-weight: 600; white-space: nowrap; text-transform: capitalize; }
        .status::before { content: ""; width: 6px; height: 6px; border-radius: 50%; background: currentColor; }
        .status.belum_dibayar { background: var(--warning-bg); color: #d97706; }
        .status.dibayar { background: var(--success-bg); color: var(--success); }
        .status.terlambat { background: var(--danger-bg); color: var(--danger); }

        .actions { display: flex; gap: 8px; align-items: center; }

        /* Empty State */
        .empty { padding: 60px 20px; color: var(--slate-500); text-align: center; background: var(--bg-body); border-top: 1px dashed var(--slate-200); }

        /* ====== MODAL ====== */
        .modal { 
            display: none; position: fixed; inset: 0; z-index: 100; 
            background: rgba(15, 23, 42, 0.5); backdrop-filter: blur(4px);
            padding: 20px; align-items: center; justify-content: center; overflow-y: auto; 
        }
        .modal.open { display: flex; }
        .modal-content { 
            background: var(--card-bg); width: 100%; max-width: 560px; padding: 28px; 
            border-radius: var(--radius-xl); box-shadow: var(--shadow-modal); position: relative; margin: auto;
        }
        .modal-content h2 { margin: 0 0 4px; font-size: 18px; font-weight: 700; }
        .modal-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px; }
        .field { display: flex; flex-direction: column; gap: 6px; margin-bottom: 16px; }
        .field label { font-weight: 600; font-size: 13px; color: var(--navy); margin-bottom: 0; }
        .field input, .field select, .field textarea { 
            width: 100%; padding: 10px 14px; border: 1px solid var(--slate-200); 
            border-radius: var(--radius-md); background: var(--card-bg); font-size: 13px;
            transition: 0.2s; outline: none;
        }
        .field input:focus, .field select:focus, .field textarea:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1); }
        .form-actions { display: flex; justify-content: flex-end; gap: 12px; margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--slate-200); }

        /* ====== RESPONSIVE ====== */
        @media (max-width: 768px) {
            .topbar { padding: 0 16px; }
            .sidebar { display: none; }
            .main { padding: 20px 16px 80px; }
            .page-heading { flex-direction: column; gap: 16px; }
            .page-heading .btn { width: 100%; }
            .filters { flex-direction: column; padding: 16px; }
            .filters select { width: 100%; }
        }

/* Empty state: samakan dengan halaman Properti */
.empty-state {
    padding: 60px 20px;
    color: var(--slate-500);
    text-align: center;
    background: var(--bg-body);
    border: 1px dashed var(--slate-200);
    border-radius: var(--radius-lg);
    margin: 24px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.empty-state svg {
    width: 36px;
    height: 36px;
    color: #94a3b8;
    margin-bottom: 12px;
    display: block;
    flex-shrink: 0;
}

.empty-state strong {
    display: block;
    color: var(--navy);
    font-size: 15px;
    margin-bottom: 4px;
    font-weight: 600;
}

.empty-state p {
    margin: 0;
    font-size: 13px;
    color: var(--slate-500);
}

    </style>
</head>
<body>

<header class="topbar">
    <a class="brand" href="{{ route('dashboard.pemilik') }}">
        <img src="{{ asset('images/alivare-logo.png') }}" alt="Logo Alivare">
    </a>

    <!-- INI BARIS YANG DIPANGGIL -->
    @include('components.topbar-actions')
</header>

<div class="layout">
    <aside class="sidebar">
        @include('components.sidebar-menu')
    </aside>

    <main class="main">
        <section class="page-heading">
            <div>
                <h1>Daftar Tagihan</h1>
                <p class="subtitle">Kelola tagihan sewa dan status pembayaran penyewa.</p>
            </div>
            <button class="btn btn-primary" type="button" onclick="openAddModal()">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                Tambah Tagihan
            </button>
        </section>

        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert" style="background:var(--danger-bg);color:#991b1b;border-color:#fecaca">
                <ul style="margin:0;padding-left:20px">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="panel">
            <div class="panel-header">
                <h2>Data Tagihan</h2>
                <span class="subtitle" id="billCount">{{ $bills->count() }} tagihan</span>
            </div>

            <div class="filters">
                <div class="filter-search-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    <input id="searchBill" type="search"
                        placeholder="Cari penyewa atau tagihan..."
                        oninput="filterBills()">
                </div>

                <select id="statusFilter" onchange="filterBills()">
                    <option value="">Semua Status</option>
                    <option value="belum_dibayar">Belum Dibayar</option>
                    <option value="dibayar">Dibayar</option>
                    <option value="terlambat">Terlambat</option>
                </select>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Tagihan</th>
                            <th>Nama Penyewa</th>
                            <th>Nominal</th>
                            <th>Jatuh Tempo</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="billRows">
                        @forelse ($bills as $bill)
                            <tr class="bill-row"
                                data-search="{{ strtolower($bill->title.' '.($bill->tenant->name ?? '')) }}"
                                data-status="{{ $bill->status }}">
                                <td>
                                    <strong>{{ $bill->title }}</strong>
                                    @if ($bill->notes)
                                        <div class="subtitle" style="font-size:12px; margin-top:2px;">
                                            {{ $bill->notes }}
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $bill->tenant->name ?? 'Penyewa dihapus' }}</td>
                                <td><strong>Rp {{ number_format($bill->amount, 0, ',', '.') }}</strong></td>
                                <td>{{ $bill->due_date->format('d/m/Y') }}</td>
                                <td>
                                    <span class="status {{ $bill->status }}">
                                        @switch($bill->status)
                                            @case('dibayar') Dibayar @break
                                            @case('terlambat') Terlambat @break
                                            @default Belum Dibayar
                                        @endswitch
                                    </span>
                                </td>
                                <td>
                                    <div class="actions">
                                        <button type="button" class="btn btn-secondary btn-sm"
                                            onclick="openEditModal({{ json_encode([
                                                'id' => $bill->id,
                                                'tenant_id' => $bill->tenant_id,
                                                'title' => $bill->title,
                                                'amount' => $bill->amount,
                                                'due_date' => $bill->due_date->format('Y-m-d'),
                                                'status' => $bill->status,
                                                'notes' => $bill->notes,
                                            ]) }})">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg> Edit
                                        </button>

                                       <button type="button" class="btn btn-danger btn-sm"
    onclick="openDeleteModal('{{ route('bills.destroy', $bill) }}', @js($bill->title), 'Tagihan')">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg> Hapus
</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr id="emptyRow">
                                <td colspan="6" class="empty">
                                    Belum ada tagihan. Klik <strong>Tambah Tagihan</strong> untuk mulai menambahkan.
                                </td>
                            </tr>
                        @endforelse
                        <tr id="noResults" style="display:none">
    <td colspan="6" style="padding:0; border:0;">
        <div class="empty-state">
            <svg viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="1.5"
                 stroke-linecap="round"
                 stroke-linejoin="round"
                 aria-hidden="true">
                <circle cx="11" cy="11" r="8"/>
                <path d="m21 21-4.3-4.3"/>
            </svg>
            <strong>Pencarian tidak ditemukan</strong>
            <p>Coba gunakan kata kunci atau filter lain.</p>
        </div>
    </td>
</tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>

<!-- MODAL TAMBAH / EDIT TAGIHAN -->
<div class="modal" id="billModal">
    <div class="modal-content">
        <div class="modal-header">
            <div>
                <h2 id="modalTitle">Tambah Tagihan</h2>
                <p class="subtitle" style="font-size:13px; margin-top:2px;">Isi informasi tagihan di bawah ini.</p>
            </div>
            <button class="close" type="button" onclick="closeModal()" style="border:0; background:transparent; font-size:20px; color:var(--slate-500); cursor:pointer;">&times;</button>
        </div>

        <form id="billForm" method="POST" action="{{ route('bills.store') }}">
            @csrf
            <input type="hidden" name="_method" id="formMethod" value="POST">

            <div class="field">
                <label for="tenant_id">Penyewa *</label>
                <select id="tenant_id" name="tenant_id" required>
                    <option value="">Pilih penyewa</option>
                    @foreach ($tenants as $tenant)
                        <option value="{{ $tenant->id }}">
                            {{ $tenant->name }}
                        </option>
                    @endforeach
                </select>
                @if ($tenants->isEmpty())
                    <small class="subtitle" style="font-size:12px; margin-top:4px;">Belum ada penyewa aktif. Tambahkan penyewa terlebih dahulu.</small>
                @endif
            </div>

            <div class="field">
                <label for="title">Nama Tagihan *</label>
                <input id="title" name="title" type="text"
                    placeholder="Contoh: Sewa kamar Oktober" maxlength="255" required>
            </div>

            <div class="field">
                <label for="amount">Nominal (Rupiah) *</label>
                <input id="amount" name="amount" type="number"
                    min="1" step="1" placeholder="Contoh: 1500000" required>
            </div>

            <div class="field">
                <label for="due_date">Tanggal Jatuh Tempo *</label>
                <input id="due_date" name="due_date" type="date" required>
            </div>

            <div class="field">
                <label for="status">Status Pembayaran *</label>
                <select id="status" name="status" required>
                    <option value="belum_dibayar">Belum Dibayar</option>
                    <option value="dibayar">Dibayar</option>
                    <option value="terlambat">Terlambat</option>
                </select>
            </div>

            <div class="field">
                <label for="notes">Catatan (opsional)</label>
                <textarea id="notes" name="notes" rows="3"
                    placeholder="Tambahkan catatan tagihan..."></textarea>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="closeModal()">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Tagihan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddModal() {
        document.getElementById('billForm').reset();
        document.getElementById('billForm').action = @json(route('bills.store'));
        document.getElementById('formMethod').value = 'POST';
        document.getElementById('modalTitle').textContent = 'Tambah Tagihan';
        document.getElementById('billModal').classList.add('open');
    }

    function openEditModal(bill) {
        const form = document.getElementById('billForm');
        form.action = @json(url('/dashboard/pemilik/tagihan')) + '/' + bill.id;
        document.getElementById('formMethod').value = 'PUT';
        document.getElementById('modalTitle').textContent = 'Edit Tagihan';

        document.getElementById('tenant_id').value = bill.tenant_id;
        document.getElementById('title').value = bill.title;
        document.getElementById('amount').value = bill.amount;
        document.getElementById('due_date').value = bill.due_date;
        document.getElementById('status').value = bill.status;
        document.getElementById('notes').value = bill.notes || '';

        document.getElementById('billModal').classList.add('open');
    }

    function closeModal() {
        document.getElementById('billModal').classList.remove('open');
    }

    function filterBills() {
        const search = document.getElementById('searchBill').value.toLowerCase();
        const status = document.getElementById('statusFilter').value;
        const rows = document.querySelectorAll('.bill-row');
        let visible = 0;

        rows.forEach(row => {
            const matchesSearch = row.dataset.search.includes(search);
            const matchesStatus = !status || row.dataset.status === status;
            const show = matchesSearch && matchesStatus;

            row.style.display = show ? '' : 'none';
            if (show) visible++;
        });

        document.getElementById('noResults').style.display =
            rows.length > 0 && visible === 0 ? '' : 'none';
    }

    document.getElementById('billModal').addEventListener('click', function (event) {
        if (event.target === this) closeModal();
    });
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });
</script>
@include('components.delete-confirm-modal')
</body>
</html>