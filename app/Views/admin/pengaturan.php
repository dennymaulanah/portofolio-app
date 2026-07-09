<?= view('admin/layouts/header', ['activePage' => 'pengaturan', 'pageTitle' => 'Pengaturan']) ?>
<?= view('admin/layouts/sidebar', ['activePage' => 'pengaturan', 'pageTitle' => 'Pengaturan']) ?>

<!-- MAIN CONTENT -->
<main class="ml-0 md:ml-64 mt-16 p-4 md:p-8 lg:p-12 relative z-10 space-y-8 md:space-y-12">
    <div class="max-w-4xl mx-auto space-y-10">

        <!-- Form Pengaturan -->
        <section>
            <h3 class="text-xl font-bold mb-6 text-primary flex items-center gap-2">
                <span class="material-symbols-outlined">settings</span> Pengaturan Umum Portal
            </h3>
            
            <form id="settings-form" class="space-y-6">
                <!-- Identitas Situs -->
                <div class="glass-card p-6 md:p-8 rounded-3xl space-y-6">
                    <h4 class="text-md font-bold text-on-surface flex items-center gap-2 border-b border-white/5 pb-3">
                        <span class="material-symbols-outlined text-primary">language</span> Identitas Situs
                    </h4>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Nama Situs</label>
                        <input id="nama_situs-input" class="w-full input-glass rounded-xl px-4 py-3 text-sm font-semibold" type="text" value="<?= esc($pengaturan['nama_situs'] ?? '') ?>" placeholder="e.g. Azeria Portfolio">
                    </div>
                </div>

                <!-- Kontak & WhatsApp -->
                <div class="glass-card p-6 md:p-8 rounded-3xl space-y-6">
                    <h4 class="text-md font-bold text-on-surface flex items-center gap-2 border-b border-white/5 pb-3">
                        <span class="material-symbols-outlined text-primary">contact_mail</span> Kontak Hubung
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Email Kontak</label>
                            <input id="email_kontak-input" class="w-full input-glass rounded-xl px-4 py-3 text-sm" type="email" value="<?= esc($pengaturan['email_kontak'] ?? '') ?>" placeholder="e.g. hello@azeria.com">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">No. Telepon / WhatsApp</label>
                            <input id="telepon_kontak-input" class="w-full input-glass rounded-xl px-4 py-3 text-sm" type="text" value="<?= esc($pengaturan['telepon_kontak'] ?? '') ?>" placeholder="e.g. 628123456789">
                        </div>
                    </div>
                </div>

                <!-- Tautan Media Sosial -->
                <div class="glass-card p-6 md:p-8 rounded-3xl space-y-6">
                    <h4 class="text-md font-bold text-on-surface flex items-center gap-2 border-b border-white/5 pb-3">
                        <span class="material-symbols-outlined text-primary">share</span> Media Sosial
                    </h4>
                    <div class="space-y-6">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">GitHub URL</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-sm">link</span>
                                <input id="github_url-input" class="w-full input-glass rounded-xl pl-10 pr-4 py-3 text-sm" type="url" value="<?= esc($pengaturan['github_url'] ?? '') ?>" placeholder="https://github.com/username">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">LinkedIn URL</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-sm">link</span>
                                <input id="linkedin_url-input" class="w-full input-glass rounded-xl pl-10 pr-4 py-3 text-sm" type="url" value="<?= esc($pengaturan['linkedin_url'] ?? '') ?>" placeholder="https://linkedin.com/in/username">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Instagram URL</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-sm">link</span>
                                <input id="instagram_url-input" class="w-full input-glass rounded-xl pl-10 pr-4 py-3 text-sm" type="url" value="<?= esc($pengaturan['instagram_url'] ?? '') ?>" placeholder="https://instagram.com/username">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end pt-4">
                    <button type="button" onclick="saveSettings()" class="bg-primary text-on-primary font-bold px-8 py-3 rounded-xl shadow-lg shadow-primary/20 hover:shadow-primary/40 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center gap-2 cursor-pointer">
                        <span class="material-symbols-outlined text-xl">save</span>
                        Simpan Pengaturan
                    </button>
                </div>
            </form>
        </section>

    </div>
</main>

<!-- BACKGROUND ATMOSPHERE LIGHTS -->
<div class="fixed top-[-10%] right-[-5%] w-[400px] h-[400px] bg-primary/5 blur-[120px] rounded-full pointer-events-none"></div>
<div class="fixed bottom-[-10%] left-[-5%] w-[300px] h-[300px] bg-secondary/5 blur-[100px] rounded-full pointer-events-none"></div>

<!-- TOAST CONTAINER -->
<div id="toast-container" class="fixed bottom-6 right-6 z-[110] space-y-3"></div>

<link rel="stylesheet" href="<?= base_url('css/admin-pengaturan.css') ?>" />

<!-- SCRIPT FOR POSTING SETTINGS -->
<script>
    // Trigger toast notification
    function showToast(message, type = 'success') {
        const container = document.getElementById('toast-container');
        const toast = document.createElement('div');
        toast.className = 'toast-success flex items-center gap-3 px-5 py-4 rounded-xl border border-white/5 text-sm min-w-[280px] slide-in-new';

        let icon = 'check_circle';
        let colorClass = 'text-primary';
        if (type === 'error') {
            icon = 'error';
            colorClass = 'text-error';
        }

        toast.innerHTML = `
            <span class="material-symbols-outlined ${colorClass}">${icon}</span>
            <div class="flex-1 font-medium text-on-surface">${message}</div>
            <button onclick="this.parentElement.remove()" class="text-on-surface-variant hover:text-on-surface ml-2">
                <span class="material-symbols-outlined text-base">close</span>
            </button>
        `;

        container.appendChild(toast);

        // Auto-remove after 4 seconds
        setTimeout(() => {
            if (toast) {
                toast.classList.add('opacity-0');
                toast.style.transform = 'translateY(10px)';
                toast.style.transition = 'all 0.3s ease';
                setTimeout(() => toast.remove(), 300);
            }
        }, 4000);
    }

    function saveSettings() {
        const nama_situs = document.getElementById('nama_situs-input').value.trim();
        const email_kontak = document.getElementById('email_kontak-input').value.trim();
        const telepon_kontak = document.getElementById('telepon_kontak-input').value.trim();
        const github_url = document.getElementById('github_url-input').value.trim();
        const linkedin_url = document.getElementById('linkedin_url-input').value.trim();
        const instagram_url = document.getElementById('instagram_url-input').value.trim();

        if (!nama_situs) {
            showToast('Nama Situs wajib diisi!', 'error');
            return;
        }

        const formData = new FormData();
        formData.append('nama_situs', nama_situs);
        formData.append('email_kontak', email_kontak);
        formData.append('telepon_kontak', telepon_kontak);
        formData.append('github_url', github_url);
        formData.append('linkedin_url', linkedin_url);
        formData.append('instagram_url', instagram_url);
        
        formData.append('<?= csrf_token() ?>', '<?= csrf_hash() ?>');

        fetch('<?= base_url('/admin/pengaturan/update') ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                showToast(data.message);
            } else {
                showToast(data.message, 'error');
            }
        })
        .catch(err => {
            console.error(err);
            showToast('Terjadi kesalahan saat menyimpan pengaturan.', 'error');
        });
    }
</script>

<?= view('admin/layouts/footer') ?>
