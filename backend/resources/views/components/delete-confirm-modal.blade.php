<!-- REUSABLE & UNIFIED CONFIRMATION MODAL ALIVARE -->
<div class="alivare-confirm-modal" id="alivareConfirmModal" aria-hidden="true" role="dialog">
    <div class="alivare-confirm-modal-content">
        <div class="alivare-confirm-icon-wrapper">
            <!-- Icon Trash (Default Hapus) -->
            <svg id="alivareModalIconTrash" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 6h18"/>
                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                <line x1="10" y1="11" x2="10" y2="17"/>
                <line x1="14" y1="11" x2="14" y2="17"/>
            </svg>

            <!-- Icon Logout -->
            <svg id="alivareModalIconLogout" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                <polyline points="16 17 21 12 16 7"/>
                <line x1="21" y1="12" x2="9" y2="12"/>
            </svg>
        </div>

        <h3 class="alivare-confirm-title" id="alivareModalTitle">Konfirmasi</h3>
        <p class="alivare-confirm-desc" id="alivareModalDesc">
            Apakah Anda yakin ingin melanjutkan tindakan ini?
        </p>

        <form id="alivareConfirmForm" method="POST" action="">
            @csrf
            <input type="hidden" name="_method" id="alivareModalMethod" value="POST">
            <div class="alivare-confirm-actions">
                <button type="button" class="btn btn-cancel" onclick="closeConfirmModal()">Batal</button>
                <button type="submit" class="btn btn-confirm-danger" id="alivareModalSubmitBtn">Ya, Lanjutkan</button>
            </div>
        </form>
    </div>
</div>

<style>
/* Overlay Backdrop dengan Keyframe Fade-In */
.alivare-confirm-modal {
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: rgba(15, 23, 42, 0.55);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    padding: 20px;
    display: none;
    align-items: center;
    justify-content: center;
}

.alivare-confirm-modal.active {
    display: flex !important;
    animation: alivareFadeIn 0.25s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}

/* Modal Content Box dengan Keyframe Scale Pop Up */
.alivare-confirm-modal-content {
    background: #ffffff;
    width: 100%;
    max-width: 440px;
    padding: 28px;
    border-radius: 14px;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
    text-align: center;
    border: 1px solid #e2e8f0;
}

.alivare-confirm-modal.active .alivare-confirm-modal-content {
    animation: alivareScalePop 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
}

.alivare-confirm-icon-wrapper {
    width: 56px;
    height: 56px;
    background: #fef2f2;
    color: #ef4444;
    border-radius: 50%;
    display: grid;
    place-items: center;
    margin: 0 auto 16px;
}

.alivare-confirm-modal.active .alivare-confirm-icon-wrapper {
    animation: alivareIconPop 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) 0.05s both;
}

/* KEYFRAMES ANIMATION */
@keyframes alivareFadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes alivareScalePop {
    0% { opacity: 0; transform: scale(0.82) translateY(20px); }
    100% { opacity: 1; transform: scale(1) translateY(0); }
}

@keyframes alivareIconPop {
    0% { transform: scale(0.3) rotate(-15deg); opacity: 0; }
    100% { transform: scale(1) rotate(0deg); opacity: 1; }
}

.alivare-confirm-icon-wrapper svg { width: 28px; height: 28px; }
.alivare-confirm-title { font-size: 18px; font-weight: 700; color: #0f172a; margin-bottom: 8px; }
.alivare-confirm-desc { font-size: 13px; color: #64748b; line-height: 1.5; margin-bottom: 24px; }
.alivare-confirm-actions { display: flex; gap: 12px; justify-content: center; }
.alivare-confirm-actions .btn {
    flex: 1; display: inline-flex; align-items: center; justify-content: center;
    padding: 10px 18px; border-radius: 8px; font-size: 13px; font-weight: 600;
    cursor: pointer; transition: all 0.2s ease;
}
.alivare-confirm-actions .btn-cancel { background: #ffffff; color: #1e293b; border: 1px solid #e2e8f0; }
.alivare-confirm-actions .btn-cancel:hover { background: #f1f5f9; }
.alivare-confirm-actions .btn-confirm-danger { background: #ef4444; color: #ffffff; border: 1px solid #ef4444; }
.alivare-confirm-actions .btn-confirm-danger:hover { background: #dc2626; border-color: #dc2626; }
</style>

<script>
const alivareModal = document.getElementById('alivareConfirmModal');
const alivareForm = document.getElementById('alivareConfirmForm');
const alivareTitle = document.getElementById('alivareModalTitle');
const alivareDesc = document.getElementById('alivareModalDesc');
const alivareSubmitBtn = document.getElementById('alivareModalSubmitBtn');
const alivareIconTrash = document.getElementById('alivareModalIconTrash');
const alivareIconLogout = document.getElementById('alivareModalIconLogout');

function openDeleteModal(actionUrl, itemName = '', itemType = '') {
    if (!alivareModal || !alivareForm) return;
    alivareForm.action = actionUrl;
    document.getElementById('alivareModalMethod').value = 'DELETE';

    if (alivareIconTrash) alivareIconTrash.style.display = 'block';
    if (alivareIconLogout) alivareIconLogout.style.display = 'none';

    alivareTitle.textContent = 'Hapus Data?';
    alivareDesc.textContent = 'Apakah Anda yakin ingin menghapus data ini? Data yang sudah dihapus tidak dapat dikembalikan.';
    alivareSubmitBtn.textContent = 'Ya, Hapus';

    alivareModal.classList.add('active');
    alivareModal.setAttribute('aria-hidden', 'false');
}

function openLogoutModal(logoutUrl = "{{ route('logout') }}") {
    if (!alivareModal || !alivareForm) return;
    alivareForm.action = logoutUrl;
    document.getElementById('alivareModalMethod').value = 'POST';

    if (alivareIconTrash) alivareIconTrash.style.display = 'none';
    if (alivareIconLogout) alivareIconLogout.style.display = 'block';

    alivareTitle.textContent = 'Keluar dari Akun?';
    alivareDesc.textContent = 'Apakah Anda yakin ingin keluar dari akun ALIVARE?';
    alivareSubmitBtn.textContent = 'Ya, Keluar';

    alivareModal.classList.add('active');
    alivareModal.setAttribute('aria-hidden', 'false');
}

function closeConfirmModal() {
    if (!alivareModal) return;
    alivareModal.classList.remove('active');
    alivareModal.setAttribute('aria-hidden', 'true');
}

function closeDeleteModal() {
    closeConfirmModal();
}

if (alivareModal) {
    alivareModal.addEventListener('click', function (e) {
        if (e.target === alivareModal) closeConfirmModal();
    });
}

document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && alivareModal && alivareModal.classList.contains('active')) {
        closeConfirmModal();
    }
});
</script>
