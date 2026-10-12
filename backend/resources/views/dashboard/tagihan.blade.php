
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tagihan - ALIVARE</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #101d4d;
            background: #f5f8fe;
            font-size: 14px;
        }

        button, input, select, textarea { font: inherit; }

        .topbar {
            height: 76px;
            padding: 0 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: white;
            border-bottom: 1px solid #e4ebf7;
        }

        .brand img {
            display: block;
            width: 110px;
            height: 48px;
            object-fit: contain;
        }

        .top-links {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .top-links a {
            color: #101d4d;
            text-decoration: none;
        }

        .layout { display: flex; min-height: calc(100vh - 76px); }

        .sidebar {
            width: 210px;
            flex-shrink: 0;
            padding: 25px 12px;
            background: white;
            border-right: 1px solid #e4ebf7;
        }

        .nav-label {
            margin: 10px 12px 16px;
            color: #91a0bd;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 12px;
            margin-bottom: 5px;
            border-radius: 10px;
            color: #526581;
            text-decoration: none;
        }

        .nav-link.active {
            color: #0866ff;
            background: #eaf1ff;
            font-weight: 700;
        }

        .nav-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
            flex: 0 0 20px;
        }

        .nav-icon svg {
            display: block;
            width: 19px;
            height: 19px;
        }

        .main {
            flex: 1;
            min-width: 0;
            padding: 30px;
        }

        .heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 28px;
        }

        h1 {
            margin: 0 0 10px;
            font-size: 30px;
            font-weight: 500;
        }

        h2 { margin: 0; font-size: 20px; font-weight: 500; }

        .muted { color: #7182a5; }

        .primary {
            padding: 13px 18px;
            border: 0;
            border-radius: 10px;
            background: #0866ff;
            color: white;
            font-weight: 700;
            cursor: pointer;
        }

        .panel {
            padding: 22px;
            background: white;
            border: 1px solid #dce7fb;
            border-radius: 17px;
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 20px;
        }

        .filters {
            display: grid;
            grid-template-columns: minmax(180px, 1.5fr) minmax(150px, 1fr);
            gap: 12px;
            margin-bottom: 22px;
        }

        .filters input, .filters select, .field input,
        .field select, .field textarea {
            width: 100%;
            min-width: 0;
            padding: 13px;
            color: #101d4d;
            background: #f8faff;
            border: 1px solid #d5e1f8;
            border-radius: 10px;
            outline-color: #0866ff;
        }

        .table-wrap { overflow-x: auto; }

        table { width: 100%; border-collapse: collapse; white-space: nowrap; }

        th, td {
            padding: 16px 12px;
            text-align: left;
            border-bottom: 1px solid #e2eaf7;
        }

        th {
            color: #7182a5;
            font-size: 12px;
            font-weight: 500;
        }

        .empty {
            padding: 35px 12px;
            color: #7182a5;
            text-align: center;
        }

        .status {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .status.belum_dibayar { color: #b77900; background: #fff4d8; }
        .status.dibayar { color: #008b58; background: #e2f8ee; }
        .status.terlambat { color: #d52b35; background: #ffe9e9; }

        .alert {
            margin-bottom: 18px;
            padding: 13px 16px;
            border-radius: 10px;
            background: #e2f8ee;
            color: #08794f;
        }

        .action {
            padding: 8px 11px;
            border: 1px solid #d5e1f8;
            border-radius: 8px;
            background: #f1f5ff;
            color: #101d4d;
            cursor: pointer;
        }

        .delete {
            color: #d52b35;
            background: #fff0f0;
            border-color: #ffdada;
        }

        .modal {
            position: fixed;
            inset: 0;
            z-index: 20;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: #101d4d80;
        }

        .modal.open { display: flex; }

        .modal-content {
            width: 100%;
            max-width: 540px;
            max-height: 90vh;
            overflow-y: auto;
            padding: 25px;
            border-radius: 16px;
            background: white;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .close {
            border: 0;
            background: transparent;
            font-size: 25px;
            cursor: pointer;
        }

        .field { margin-bottom: 16px; }
        .field label {
            display: block;
            margin-bottom: 7px;
            font-weight: 600;
        }

        .field textarea { resize: vertical; }
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .secondary {
            padding: 12px 16px;
            border: 1px solid #d5e1f8;
            border-radius: 9px;
            background: white;
            cursor: pointer;
        }

        @media (max-width: 750px) {
            .topbar { padding: 0 14px; }
            .sidebar { width: 75px; padding: 18px 8px; }
            .nav-label { font-size: 9px; margin: 10px 2px; }
            .nav-link {
                flex-direction: column;
                justify-content: center;
                gap: 5px;
                padding: 12px 3px;
                font-size: 10px;
            }
            .main { padding: 18px 12px; }
            .heading { align-items: flex-start; }
            h1 { font-size: 25px; }
            .panel { padding: 14px; }
            .filters { grid-template-columns: 1fr; }
            .brand img { width: 90px; }
            .top-links { gap: 10px; font-size: 12px; }
        }
    </style>
</head>
<body>

<header class="topbar">
    <a class="brand" href="{{ route('dashboard.pemilik') }}">
        <img src="{{ asset('images/alivare-logo.png') }}" alt="ALIVARE">
    </a>
    <div class="top-links">
        <a href="{{ route('dashboard.kamar') }}">Pengelolaan Kamar</a>
        <a href="{{ route('dashboard.pemilik') }}">Kembali ke Properti</a>
    </div>
</header>

<div class="layout">
    <aside class="sidebar">
        @include('components.sidebar-menu')
    </aside>

    <main class="main">
        <div class="heading">
            <div>
                <h1>Daftar Tagihan</h1>
                <p class="muted">Kelola tagihan sewa dan status pembayaran penyewa.</p>
            </div>
            <button class="primary" type="button" onclick="openAddModal()">
                + Tambah Tagihan
            </button>
        </div>

        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert" style="background:#ffe9e9;color:#b42323">
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
                <span class="muted" id="billCount">{{ $bills->count() }} tagihan</span>
            </div>

            <div class="filters">
                <input id="searchBill" type="search"
                    placeholder="Cari penyewa atau tagihan..."
                    oninput="filterBills()">

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
                                        <div class="muted" style="margin-top:5px">
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
                                    <button type="button" class="action"
                                        onclick="openEditModal({{ json_encode([
                                            'id' => $bill->id,
                                            'tenant_id' => $bill->tenant_id,
                                            'title' => $bill->title,
                                            'amount' => $bill->amount,
                                            'due_date' => $bill->due_date->format('Y-m-d'),
                                            'status' => $bill->status,
                                            'notes' => $bill->notes,
                                        ]) }})">Edit</button>

                                    <form method="POST"
                                        action="{{ route('bills.destroy', $bill) }}"
                                        style="display:inline"
                                        onsubmit="return confirm('Yakin ingin menghapus tagihan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="action delete" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr id="emptyRow">
                                <td colspan="6" class="empty">
                                    Belum ada tagihan. Klik Tambah Tagihan untuk memulai.
                                </td>
                            </tr>
                        @endforelse
                        <tr id="noResults" style="display:none">
                            <td colspan="6" class="empty">Tagihan tidak ditemukan.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>

<div class="modal" id="billModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modalTitle">Tambah Tagihan</h2>
            <button class="close" type="button" onclick="closeModal()">×</button>
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
                    <small class="muted">Belum ada penyewa aktif. Tambahkan penyewa terlebih dahulu.</small>
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
                <button type="button" class="secondary" onclick="closeModal()">Batal</button>
                <button type="submit" class="primary">Simpan Tagihan</button>
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
</script>

</body>
</html>
