<!-- MODAL KONFIRMASI HAPUS REUSABLE -->
<div class="delete-modal-backdrop" id="globalDeleteModal">
    <div class="delete-modal-box">
        <div class="delete-icon-wrapper">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 6h18"/>
                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                <line x1="10" y1="11" x2="10" y2="17"/>
                <line x1="14" y1="11" x2="14" y2="17"/>
            </svg>
        </div>
        
        <h3 id="deleteModalTitle">Hapus Data?</h3>
        <p id="deleteModalMessage">Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.</p>

        <form id="globalDeleteForm" method="POST" action="">
            @csrf
            @method('DELETE')
            <div class="delete-modal-actions">
                <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Batal</button>
                <button type="submit" class="btn btn-danger-solid" id="deleteConfirmBtn">
                    Hapus
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .delete-modal-backdrop {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 150;
        background: rgba(15, 23, 42, 0.5);
        backdrop-filter: blur(4px);
        padding: 20px;
        align-items: center;
        justify-content: center;
        animation: fadeIn 0.2s ease;
    }
    .delete-modal-backdrop.open {
        display: flex;
    }
    .delete-modal-box {
        background: var(--card-bg, #ffffff);
        width: 100%;
        max-width: 420px;
        padding: 28px 24px;
        border-radius: var(--radius-xl, 16px);
        box-shadow: var(--shadow-modal, 0 20px 25px -5px rgba(0, 0, 0, 0.1));
        text-align: center;
        animation: scaleUp 0.2s ease;
    }
    .delete-icon-wrapper {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: var(--danger-bg, #fef2f2);
        color: var(--danger, #ef4444);
        display: grid;
        place-items: center;
        margin: 0 auto 16px;
    }
    .delete-icon-wrapper svg {
        width: 26px;
        height: 26px;
    }
    .delete-modal-box h3 {
        margin: 0 0 8px;
        font-size: 18px;
        font-weight: 700;
        color: var(--navy, #0f172a);
    }
    .delete-modal-box p {
        margin: 0 0 24px;
        font-size: 13.5px;
        color: var(--slate-500, #64748b);
        line-height: 1.5;
    }
    .delete-modal-actions {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }
    .btn-danger-solid {
        background-color: var(--danger, #ef4444) !important;
        color: #ffffff !important;
        border: 1px solid var(--danger, #ef4444) !important;
        box-shadow: var(--shadow-sm) !important;
    }
    .btn-danger-solid:hover {
        background-color: #dc2626 !important;
        border-color: #dc2626 !important;
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes scaleUp {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
</style>

<script>
    function openDeleteModal(actionUrl, itemName, itemType = 'Data') {
        const modal = document.getElementById('globalDeleteModal');
        const form = document.getElementById('globalDeleteForm');
        const title = document.getElementById('deleteModalTitle');
        const message = document.getElementById('deleteModalMessage');
        const confirmBtn = document.getElementById('deleteConfirmBtn');

        form.action = actionUrl;
        title.textContent = `Hapus ${itemType}?`;
        
        if (itemName) {
            message.innerHTML = `Apakah Anda yakin ingin menghapus <strong>"${itemName}"</strong>? Tindakan ini tidak dapat dibatalkan.`;
        } else {
            message.textContent = `Apakah Anda yakin ingin menghapus ${itemType.toLowerCase()} ini? Tindakan ini tidak dapat dibatalkan.`;
        }
        
        confirmBtn.textContent = `Hapus ${itemType}`;
        modal.classList.add('open');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('globalDeleteModal');
        if (modal) modal.classList.remove('open');
    }

    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('globalDeleteModal');
        if (modal) {
            modal.addEventListener('click', function (e) {
                if (e.target === modal) closeDeleteModal();
            });
        }
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeDeleteModal();
        });
    });
</script>