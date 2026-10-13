<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kamar - ALIVARE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
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
            
            --success: #10b981;
            --success-bg: #ecfdf5;
            --warning: #f59e0b;
            --warning-bg: #fffbeb;
            --danger: #ef4444;
            --danger-bg: #fef2f2;
            
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

        button, input, select { font: inherit; } 
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
        .panel-heading { padding: 20px 24px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--slate-200); }
        .panel-heading h2 { font-size: 16px; font-weight: 700; margin: 0; }
        .panel-heading .subtitle { font-size: 13px; font-weight: 500; }
        
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

        /* ====== TABEL KAMAR ====== */
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
        .status.tersedia { background: var(--success-bg); color: var(--success); }
        .status.terisi { background: var(--primary-soft); color: var(--primary); }
        .status.maintenance { background: var(--warning-bg); color: #d97706; }

        .actions { display: flex; gap: 8px; align-items: center; }

        /* Empty State */
        .empty { padding: 60px 20px; color: var(--slate-500); text-align: center; background: var(--bg-body); border-top: 1px dashed var(--slate-200); }

        /* ====== MODAL ====== */
        .modal-backdrop { 
            display: none; position: fixed; inset: 0; z-index: 100; 
            background: rgba(15, 23, 42, 0.5); backdrop-filter: blur(4px);
            padding: 20px; align-items: center; justify-content: center; overflow-y: auto; 
        }
        .modal { 
            background: var(--card-bg); width: 100%; max-width: 560px; padding: 28px; 
            border-radius: var(--radius-xl); box-shadow: var(--shadow-modal); position: relative;
        }
        .modal h2 { margin: 0 0 4px; font-size: 18px; font-weight: 700; }
        .modal-heading { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px; }
        .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px; margin-top: 16px; }
        .field { display: flex; flex-direction: column; gap: 6px; margin-bottom: 0; }
        .field.full { grid-column: 1 / -1; }
        .field label { font-weight: 600; font-size: 13px; color: var(--navy); margin-bottom: 0; }
        .field input, .field select { 
            width: 100%; padding: 10px 14px; border: 1px solid var(--slate-200); 
            border-radius: var(--radius-md); background: var(--card-bg); font-size: 13px;
            transition: 0.2s; outline: none;
        }
        .field input:focus, .field select:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1); }
        .modal-actions { display: flex; justify-content: flex-end; gap: 12px; margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--slate-200); }

        /* ====== RESPONSIVE ====== */
        @media (max-width: 768px) {
            .topbar { padding: 0 16px; }
            .sidebar { display: none; }
            .main { padding: 20px 16px 80px; }
            .page-heading { flex-direction: column; gap: 16px; }
            .page-heading .btn { width: 100%; }
            .filters { flex-direction: column; padding: 16px; }
            .filters select { width: 100%; }
            .form-grid { grid-template-columns: 1fr; }
            .field.full { grid-column: auto; }
        }
    </style>
</head>
<body>

<header class="topbar">
    <a href="{{ route('dashboard.pemilik') }}" class="brand">
        <img src="{{ asset('images/alivare-logo.png') }}" alt="Logo Alivare">
    </a>
    <div></div>
</header>

<div class="layout">
    <aside class="sidebar">
        @include('components.sidebar-menu')
    </aside>

    <main class="main">
        <section class="page-heading">
            <div>
                <h1>Daftar Kamar</h1>
                <p class="subtitle">Kelola kamar dari properti yang Anda miliki.</p>
            </div>
            <button class="btn btn-primary" type="button" onclick="openAddModal()">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                Tambah Kamar
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
            <div class="panel-heading">
                <h2>Data Kamar</h2>
                <span class="subtitle">{{ $rooms->count() }} kamar</span>
            </div>

            <div class="filters">
                <div class="filter-search-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    <input id="searchRoom" type="search" placeholder="Cari nomor kamar atau properti...">
                </div>
                <select id="filterProperty">
                    <option value="">Semua Properti</option>
                    @foreach ($properties as $property)
                        <option value="{{ $property->name }}">{{ $property->name }}</option>
                    @endforeach
                </select>
                <select id="filterStatus">
                    <option value="">Semua Status</option>
                    <option value="tersedia">Tersedia</option>
                    <option value="terisi">Terisi</option>
                    <option value="maintenance">Maintenance</option>
                </select>
            </div>

            <div class="table-wrap">
                <table id="roomTable">
                    <thead>
                        <tr>
                            <th>Nomor Kamar</th>
                            <th>Properti</th>
                            <th>Harga Sewa</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($rooms as $room)
                        <tr data-number="{{ strtolower($room->room_number) }}"
                            data-property="{{ $room->property->name }}"
                            data-status="{{ $room->status }}">
                            <td><strong>{{ $room->room_number }}</strong></td>
                            <td>{{ $room->property->name }}</td>
                            <td>Rp {{ number_format($room->price, 0, ',', '.') }}</td>
                            <td>
                                <span class="status {{ $room->status }}">
                                    {{ ucfirst($room->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="actions">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        onclick="openEditModal(
                                            '{{ $room->id }}',
                                            @js($room->room_number),
                                            '{{ $room->price }}',
                                            '{{ $room->status }}'
                                        )">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg> Edit
                                    </button>

                                  <button type="button" class="btn btn-danger btn-sm"
    onclick="openDeleteModal('{{ route('rooms.destroy', $room) }}', 'Kamar {{ $room->room_number }}', 'Kamar')">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg> Hapus
</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty">
                                Belum ada data kamar. Klik <strong>Tambah Kamar</strong> untuk mulai menambahkan.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div id="noResults" class="empty" style="display:none">
                Pencarian tidak ditemukan. Coba gunakan nomor kamar atau filter lain.
            </div>
        </section>
    </main>
</div>

<!-- MODAL TAMBAH / EDIT KAMAR -->
<div class="modal-backdrop" id="roomModal">
    <div class="modal">
        <div class="modal-heading">
            <div>
                <h2 id="modalTitle">Tambah Kamar</h2>
                <p class="subtitle" style="font-size:13px; margin-top:2px;">Isi informasi kamar di bawah ini.</p>
            </div>
            <button type="button" onclick="closeRoomModal()" style="border:0; background:transparent; font-size:20px; color:var(--slate-500); cursor:pointer;">&times;</button>
        </div>

        <form id="roomForm" method="POST" action="{{ route('rooms.store') }}">
            @csrf
            <div id="methodField"></div>

            <div class="form-grid">
                <div class="field full">
                    <label for="property_id">Properti</label>
                    <select name="property_id" id="property_id" required>
                        <option value="">Pilih properti</option>
                        @foreach ($properties as $property)
                            <option value="{{ $property->id }}">{{ $property->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="field">
                    <label for="room_number">Nomor Kamar</label>
                    <input name="room_number" id="room_number" maxlength="255" required placeholder="Contoh: 01">
                </div>

                <div class="field">
                    <label for="price">Harga Sewa / Bulan (Rp)</label>
                    <input type="number" name="price" id="price" min="0" step="1" required placeholder="Contoh: 2000000">
                </div>

                <div class="field full">
                    <label for="room_status">Status Kamar</label>
                    <select name="status" id="room_status" required>
                        <option value="tersedia">Tersedia</option>
                        <option value="terisi">Terisi</option>
                        <option value="maintenance">Maintenance</option>
                    </select>
                </div>
            </div>

            <div class="modal-actions">
                <button class="btn btn-secondary" type="button" onclick="closeRoomModal()">Batal</button>
                <button class="btn btn-primary" id="saveButton" type="submit">Simpan Kamar</button>
            </div>
        </form>
    </div>
</div>

<script>
    const roomModal = document.getElementById('roomModal');
    const roomForm = document.getElementById('roomForm');
    const methodField = document.getElementById('methodField');

    function openAddModal() {
        roomForm.reset();
        roomForm.action = @js(route('rooms.store'));
        methodField.innerHTML = '';
        document.getElementById('property_id').disabled = false;
        document.getElementById('modalTitle').textContent = 'Tambah Kamar';
        document.getElementById('saveButton').textContent = 'Simpan Kamar';
        roomModal.style.display = 'flex';
    }

    function openEditModal(id, number, price, status) {
        roomForm.reset();
        roomForm.action = @js(url('/dashboard/pemilik/kamar')) + '/' + encodeURIComponent(id);
        methodField.innerHTML = '<input type="hidden" name="_method" value="PUT">';
        document.getElementById('property_id').disabled = true;
        document.getElementById('property_id').required = false;
        document.getElementById('room_number').value = number;
        document.getElementById('price').value = price;
        document.getElementById('room_status').value = status;
        document.getElementById('modalTitle').textContent = 'Edit Kamar';
        document.getElementById('saveButton').textContent = 'Simpan Perubahan';
        roomModal.style.display = 'flex';
    }

    function closeRoomModal() {
        roomModal.style.display = 'none';
        document.getElementById('property_id').disabled = false;
        document.getElementById('property_id').required = true;
    }

    roomModal.addEventListener('click', e => { if (e.target === roomModal) closeRoomModal(); });
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeRoomModal(); });

    document.getElementById('searchRoom').addEventListener('input', filterRooms);
    document.getElementById('filterProperty').addEventListener('change', filterRooms);
    document.getElementById('filterStatus').addEventListener('change', filterRooms);

    function filterRooms() {
        const query = document.getElementById('searchRoom').value.toLowerCase();
        const property = document.getElementById('filterProperty').value;
        const status = document.getElementById('filterStatus').value;
        let visible = 0;

        document.querySelectorAll('#roomTable tbody tr[data-number]').forEach(row => {
            const matchText = row.dataset.number.includes(query) ||
                row.dataset.property.toLowerCase().includes(query);
            const matchProperty = !property || row.dataset.property === property;
            const matchStatus = !status || row.dataset.status === status;
            const show = matchText && matchProperty && matchStatus;

            row.style.display = show ? '' : 'none';
            if (show) visible++;
        });

        document.getElementById('noResults').style.display =
            visible === 0 && document.querySelectorAll('#roomTable tbody tr[data-number]').length > 0
                ? 'block' : 'none';
    }
</script>

@include('components.delete-confirm-modal')
</body>
</html>