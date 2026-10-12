
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penyewa - ALIVARE</title>
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
            width: 125px;
            max-height: 58px;
            object-fit: contain;
        }
        .topbar a { color: #101d4d; text-decoration: none; }
        .layout { display: flex; min-height: calc(100vh - 76px); }
        .sidebar {
            width: 210px;
            flex-shrink: 0;
            padding: 25px 12px;
            background: white;
            border-right: 1px solid #e4ebf7;
        }
        .nav-label {
            margin: 10px 12px 14px;
            color: #91a0bd;
            font-size: 11px;
            font-weight: bold;
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

.sidebar .nav-icon {
    width: 20px;
    height: 20px;
    flex: 0 0 20px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.sidebar .nav-icon svg {
    width: 18px;
    height: 18px;
    min-width: 18px;
    max-width: 18px;
    display: block;
}

        .nav-link.active {
            background: #eaf1ff;
            color: #0866f5;
            font-weight: bold;
        }
        .main { flex: 1; min-width: 0; padding: 30px; }
        .heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 26px;
        }
        h1 { margin: 0 0 10px; font-size: 30px; font-weight: 500; }
        h2 { margin: 0; font-size: 20px; font-weight: 500; }
        .muted { color: #7183a5; }
        .primary, .secondary, .danger {
            border: 1px solid #d8e3f7;
            border-radius: 10px;
            padding: 11px 16px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .primary { color: white; background: #0866f5; border-color: #0866f5; font-weight: bold; }
        .secondary { color: #101d4d; background: #f1f5fd; }
        .danger { color: #d92d20; background: #fff0f0; border-color: #ffdada; }
        .panel {
            background: white;
            border: 1px solid #dfe8f8;
            border-radius: 17px;
            padding: 22px;
        }
        .panel-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }
        .filters {
            display: grid;
            grid-template-columns: minmax(180px, 1fr) minmax(160px, .65fr);
            gap: 12px;
            margin-bottom: 22px;
        }
        input, select, textarea {
            width: 100%;
            padding: 13px;
            border: 1px solid #d5e1f6;
            border-radius: 10px;
            background: #f9fbff;
            color: #101d4d;
        }
        table { width: 100%; border-collapse: collapse; }
        th, td {
            padding: 15px 12px;
            text-align: left;
            border-bottom: 1px solid #e4ebf7;
        }
        th { color: #7183a5; font-size: 12px; font-weight: 500; }
        .status {
            display: inline-block;
            padding: 7px 10px;
            border-radius: 20px;
            color: #008c58;
            background: #e3f8ed;
            font-size: 12px;
        }
        .alert {
            padding: 13px 16px;
            margin-bottom: 18px;
            border-radius: 10px;
            background: #e3f8ed;
            color: #087443;
        }
        .empty { padding: 35px 10px; text-align: center; color: #7183a5; }
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 20;
            overflow-y: auto;
            padding: 25px 15px;
            background: #101d4d80;
        }
        .modal.open { display: block; }
        .modal-box {
            max-width: 650px;
            margin: 20px auto;
            padding: 25px;
            border-radius: 16px;
            background: white;
        }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .field { margin-bottom: 15px; }
        .field label { display: block; margin-bottom: 7px; font-weight: bold; }
        .modal-actions { display: flex; justify-content: flex-end; gap: 10px; margin-top: 20px; }
        @media (max-width: 750px) {
            .sidebar { width: 145px; }
            .main { padding: 18px 12px; }
            .filters, .form-grid { grid-template-columns: 1fr; }
            .panel { padding: 14px; overflow-x: auto; }
            .heading { align-items: flex-start; }
            table { min-width: 650px; }

        }
    </style>
</head>
<body>
<header class="topbar">
    <a class="brand" href="{{ route('dashboard.pemilik') }}">
        <img src="{{ asset('images/alivare-logo.png') }}" alt="Alivare">
    </a>
    <div>
        <a href="{{ route('dashboard.kamar') }}">Pengelolaan Kamar</a>
        &nbsp;&nbsp;
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
                <h1>Daftar Penyewa</h1>
                <p class="muted">Kelola data penyewa properti yang lu miliki.</p>
            </div>
            <button class="primary" type="button" onclick="openAddModal()">
                + Tambah Penyewa
            </button>
        </div>

        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert" style="background:#fff0f0;color:#b42323">
                <ul style="margin:0;padding-left:20px">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="panel">
            <div class="panel-head">
                <h2>Data Penyewa</h2>
                <span class="muted">{{ $tenants->count() }} penyewa</span>
            </div>

            <div class="filters">
                <input id="searchTenant" type="search"
                    placeholder="Cari nama, telepon, atau nomor kamar..."
                    oninput="filterTenants()">
                <select id="statusFilter" onchange="filterTenants()">
                    <option value="">Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="keluar">Keluar</option>
                </select>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Nama Penyewa</th>
                        <th>Nomor Kamar</th>
                        <th>Properti</th>
                        <th>Telepon</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tenantRows">
                    @forelse ($tenants as $tenant)
                        <tr class="tenant-row"
                            data-search="{{ strtolower($tenant->name.' '.$tenant->phone.' '.($tenant->room->room_number ?? '').' '.($tenant->room->property->name ?? '')) }}"
                            data-status="{{ $tenant->status }}">
                            <td>
                                <strong>{{ $tenant->name }}</strong>
                                <div class="muted">{{ $tenant->email ?: 'Email belum diisi' }}</div>
                            </td>
                            <td>{{ $tenant->room->room_number ?? '-' }}</td>
                            <td>{{ $tenant->room->property->name ?? '-' }}</td>
                            <td>{{ $tenant->phone }}</td>
                            <td><span class="status">{{ ucfirst($tenant->status) }}</span></td>
                            <td>
                                <button class="secondary" type="button"
                                    onclick="openEditModal({{ Illuminate\Support\Js::from($tenant) }})">
                                    Edit
                                </button>
                                <form method="POST"
                                    action="{{ route('tenants.destroy', $tenant) }}"
                                    style="display:inline"
                                    onsubmit="return confirm('Yakin ingin menghapus penyewa ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty">
                                Belum ada penyewa. Klik Tambah Penyewa untuk memulai.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </main>
</div>

<div class="modal" id="tenantModal">
    <div class="modal-box">
        <div class="panel-head">
            <div>
                <h2 id="modalTitle">Tambah Penyewa</h2>
                <p class="muted">Isi informasi penyewa di bawah ini.</p>
            </div>
            <button class="secondary" type="button" onclick="closeModal()">Tutup</button>
        </div>

        <form id="tenantForm" method="POST" action="{{ route('tenants.store') }}">
            @csrf
            <input type="hidden" id="formMethod" name="_method" value="POST">

            <div class="field">
                <label for="room_id">Kamar *</label>
                <select id="room_id" name="room_id" required>
                    <option value="">Pilih kamar</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">
                            {{ $room->property->name ?? 'Properti' }} — Kamar {{ $room->room_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label for="name">Nama Lengkap *</label>
                <input id="name" name="name" required maxlength="255">
            </div>

            <div class="form-grid">
                <div class="field">
                    <label for="phone">Nomor Telepon *</label>
                    <input id="phone" name="phone" required maxlength="30"
                        placeholder="08xxxxxxxxxx">
                </div>
                <div class="field">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" maxlength="255">
                </div>
                <div class="field">
                    <label for="identity_number">Nomor Identitas</label>
                    <input id="identity_number" name="identity_number" maxlength="50">
                </div>
                <div class="field">
                    <label for="status">Status *</label>
                    <select id="status" name="status" required>
                        <option value="aktif">Aktif</option>
                        <option value="keluar">Keluar</option>
                    </select>
                </div>
                <div class="field">
                    <label for="move_in_date">Tanggal Masuk</label>
                    <input id="move_in_date" name="move_in_date" type="date">
                </div>
                <div class="field">
                    <label for="move_out_date">Tanggal Keluar</label>
                    <input id="move_out_date" name="move_out_date" type="date">
                </div>
            </div>

            <div class="field">
                <label for="notes">Catatan</label>
                <textarea id="notes" name="notes" rows="3" maxlength="2000"></textarea>
            </div>

            <div class="modal-actions">
                <button class="secondary" type="button" onclick="closeModal()">Batal</button>
                <button class="primary" type="submit">Simpan Penyewa</button>
            </div>
        </form>
    </div>
</div>

<script>
    const tenantModal = document.getElementById('tenantModal');
    const tenantForm = document.getElementById('tenantForm');

    function openAddModal() {
        tenantForm.reset();
        tenantForm.action = @json(route('tenants.store'));
        document.getElementById('formMethod').value = 'POST';
        document.getElementById('modalTitle').textContent = 'Tambah Penyewa';
        tenantModal.classList.add('open');
    }

    function openEditModal(tenant) {
        tenantForm.reset();
        tenantForm.action = @json(url('/dashboard/pemilik/penyewa')) + '/' + tenant.id;
        document.getElementById('formMethod').value = 'PUT';
        document.getElementById('modalTitle').textContent = 'Edit Penyewa';

        ['room_id', 'name', 'email', 'phone', 'identity_number',
         'move_in_date', 'move_out_date', 'status', 'notes'].forEach(function (key) {
            const field = document.getElementById(key);
            if (field) field.value = tenant[key] ?? '';
        });

        tenantModal.classList.add('open');
    }

    function closeModal() {
        tenantModal.classList.remove('open');
    }

    function filterTenants() {
        const query = document.getElementById('searchTenant').value.toLowerCase();
        const status = document.getElementById('statusFilter').value;

        document.querySelectorAll('.tenant-row').forEach(function (row) {
            const matchesQuery = row.dataset.search.includes(query);
            const matchesStatus = !status || row.dataset.status === status;
            row.style.display = matchesQuery && matchesStatus ? '' : 'none';
        });
    }

    @if ($errors->any())
        tenantModal.classList.add('open');
    @endif
</script>
</body>
</html>
