
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kamar - ALIVARE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #101d4d;
            background: #f5f8fe;
            font-size: 14px;
        }
        button, input, select { font: inherit; }
        .topbar {
            height: 76px;
            padding: 0 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: white;
            border-bottom: 1px solid #e4ebf7;
        }
       

.brand {
    display: flex;
    align-items: center;
    flex-shrink: 0;
    width: 125px;
}

.brand img {
    display: block;
    width: 100%;
    height: auto;
    max-height: 58px;
    object-fit: contain;
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
            margin: 8px 12px 12px;
            color: #9aa6bd;
            font-size: 11px;
            font-weight: bold;
        }
        .nav-link {
            display: block;
            padding: 13px;
            margin-bottom: 6px;
            border-radius: 10px;
            color: #667593;
            text-decoration: none;
            font-weight: 600;
        }
        .nav-link.active { background: #eaf2ff; color: #0866f5; }
        
.nav-icon {
    width: 20px;
    height: 20px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.nav-icon svg {
    width: 18px;
    height: 18px;
    display: block;
}

.sidebar .nav-link {
    display: flex;
    align-items: center;
    gap: 10px;
}

        .main { flex: 1; min-width: 0; padding: 30px; }
        .heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 24px;
        }
        h1 { margin: 0 0 8px; font-size: 32px; }
        .muted { color: #71809f; }
        .primary {
            border: 0;
            border-radius: 10px;
            padding: 13px 17px;
            background: #0866f5;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .panel {
            background: white;
            padding: 22px;
            border: 1px solid #e4ebf7;
            border-radius: 16px;
        }
        .filters {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 12px;
            margin: 20px 0;
        }
        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #dce5f4;
            border-radius: 10px;
            background: #f9fbff;
            color: #101d4d;
        }
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; min-width: 700px; }
        th, td {
            padding: 15px 12px;
            text-align: left;
            border-bottom: 1px solid #e4ebf7;
        }
        th { color: #71809f; font-size: 12px; }
        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        .tersedia { background: #e5f8ee; color: #079552; }
        .terisi { background: #eaf2ff; color: #0866f5; }
        .maintenance { background: #fff2df; color: #e78a00; }
        .actions { display: flex; gap: 7px; }
        .small-button {
            padding: 8px 10px;
            border: 1px solid #e2eafa;
            border-radius: 8px;
            cursor: pointer;
            background: #f1f5fd;
            color: #101d4d;
        }
        .delete { background: #fff0f0; color: #e33838; border-color: #ffe2e2; }
        .alert {
            margin-bottom: 16px;
            padding: 12px 15px;
            border-radius: 10px;
            background: #e5f8ee;
            color: #087b48;
        }
        .error { color: #d22; font-size: 12px; margin-top: 5px; }
        .empty { text-align: center; padding: 35px; color: #71809f; }
        .modal-backdrop {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 10;
            background: #101d4d88;
            padding: 20px;
            align-items: center;
            justify-content: center;
        }
        .modal {
            width: 100%;
            max-width: 560px;
            max-height: 90vh;
            overflow-y: auto;
            background: white;
            padding: 25px;
            border-radius: 16px;
        }
        .modal h2 { margin-top: 0; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .field { margin-bottom: 15px; }
        .field label { display: block; margin-bottom: 7px; font-weight: bold; }
        .full { grid-column: 1 / -1; }
        .modal-actions { display: flex; justify-content: flex-end; gap: 10px; }
        .secondary {
            padding: 12px 16px;
            border: 1px solid #e2eafa;
            border-radius: 10px;
            background: white;
            cursor: pointer;
        }
        @media (max-width: 760px) {
            .topbar { height: 64px; padding: 0 16px; }
            .layout { min-height: calc(100vh - 64px); }
            .sidebar { display: none; }
            .main { padding: 20px 14px; }
            .heading { align-items: flex-start; flex-direction: column; }
            h1 { font-size: 27px; }
            .filters { grid-template-columns: 1fr; }
            .panel { padding: 14px; }
            .form-grid { grid-template-columns: 1fr; }
            .full { grid-column: auto; }
        }
    </style>
</head>
<body>
<header class="topbar">
    
<a href="{{ route('dashboard.pemilik') }}" class="brand">
    <img src="{{ asset('images/alivare-logo.png') }}" alt="Alivare">
</a>

    <div>
        <span style="margin-right:16px">Pengelolaan Kamar</span>
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
                <h1>Daftar Kamar</h1>
                <p class="muted">Kelola kamar dari properti yang lu miliki.</p>
            </div>
            <button class="primary" type="button" onclick="openAddModal()">
                + Tambah Kamar
            </button>
        </div>

        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert" style="background:#ffe8e8;color:#b42323">
                <ul style="margin:0;padding-left:20px">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="panel">
            <div style="display:flex;justify-content:space-between;gap:12px;align-items:center">
                <h2 style="margin:0;font-size:20px">Data Kamar</h2>
                <span class="muted">{{ $rooms->count() }} kamar</span>
            </div>

            <div class="filters">
                <input id="searchRoom" type="search" placeholder="Cari nomor kamar atau properti...">
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
                                    <button type="button" class="small-button"
                                        onclick="openEditModal(
                                            '{{ $room->id }}',
                                            @js($room->room_number),
                                            '{{ $room->price }}',
                                            '{{ $room->status }}'
                                        )">Edit</button>

                                    <form method="POST"
                                        action="{{ route('rooms.destroy', $room) }}"
                                        onsubmit="return confirm('Yakin ingin menghapus kamar ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="small-button delete">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty">
                                Belum ada kamar. Klik Tambah Kamar untuk memulai.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div id="noResults" class="empty" style="display:none">
                Tidak ada kamar yang cocok dengan pencarian.
            </div>
        </section>
    </main>
</div>

<div class="modal-backdrop" id="roomModal">
    <div class="modal">
        <h2 id="modalTitle">Tambah Kamar</h2>
        <p class="muted">Isi informasi kamar di bawah ini.</p>

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
                    <input name="room_number" id="room_number" maxlength="255" required>
                </div>

                <div class="field">
                    <label for="price">Harga Sewa per Bulan (Rp)</label>
                    <input type="number" name="price" id="price" min="0" step="1" required>
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
                <button class="secondary" type="button" onclick="closeRoomModal()">Batal</button>
                <button class="primary" id="saveButton" type="submit">Simpan Kamar</button>
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
</body>
</html>
