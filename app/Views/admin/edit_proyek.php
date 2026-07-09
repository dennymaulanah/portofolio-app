<?= view('admin/layouts/header', ['activePage' => 'proyek', 'pageTitle' => 'Edit Proyek']) ?>
<?= view('admin/layouts/sidebar', ['activePage' => 'proyek', 'pageTitle' => 'Edit Proyek']) ?>

<!-- MAIN CONTENT -->
<main class="ml-0 md:ml-64 mt-16 p-4 md:p-8 lg:p-12 relative z-10 space-y-8 md:space-y-12">
    <!-- Header -->
    <section class="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <a href="<?= base_url('/admin/proyek') ?>" class="inline-flex items-center gap-2 text-on-surface-variant hover:text-primary transition-colors mb-4 group">
                <span class="material-symbols-outlined text-lg transition-transform group-hover:-translate-x-1">arrow_back</span>
                <span class="text-sm font-medium">Kembali ke Daftar Proyek</span>
            </a>
            <h2 class="font-headline-lg text-headline-lg text-on-surface">Edit Proyek</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant mt-2 max-w-2xl">Perbarui informasi proyek "<strong><?= esc($proyek['judul']) ?></strong>"</p>
        </div>
    </section>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="glass-card p-4 rounded-xl border-l-4 border-red-500 bg-red-500/5">
            <div class="flex items-start gap-3">
                <span class="material-symbols-outlined text-red-400 mt-0.5">error</span>
                <div>
                    <p class="font-semibold text-red-400 text-sm">Terjadi kesalahan:</p>
                    <ul class="list-disc list-inside text-xs text-red-300/80 mt-1 space-y-0.5">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Form -->
    <form action="<?= base_url('/admin/proyek/update/' . $proyek['id']) ?>" method="POST" enctype="multipart/form-data" id="formEditProyek">
        <?= csrf_field() ?>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Main Info -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Judul & Kategori -->
                <div class="glass-card p-6 md:p-8 rounded-2xl space-y-6">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 border border-primary/20 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-xl">edit_note</span>
                        </div>
                        <div>
                            <h3 class="font-headline-md text-sm font-bold text-on-surface">Informasi Proyek</h3>
                            <p class="text-xs text-on-surface-variant/60">Detail dasar proyek Anda</p>
                        </div>
                    </div>

                    <!-- Judul Proyek -->
                    <div class="space-y-2">
                        <label for="judul" class="block text-sm font-semibold text-on-surface">
                            Judul Proyek <span class="text-red-400">*</span>
                        </label>
                        <input
                            type="text"
                            id="judul"
                            name="judul"
                            value="<?= old('judul', $proyek['judul']) ?>"
                            placeholder="Masukkan judul proyek..."
                            required
                            class="form-input w-full bg-surface-container-lowest border border-white/10 rounded-xl px-4 py-3 text-sm text-on-surface placeholder:text-on-surface-variant/40 focus:outline-none focus:border-primary/50 focus:ring-1 focus:ring-primary/30 transition-all">
                    </div>

                    <!-- Kategori -->
                    <div class="space-y-2">
                        <label for="kategori" class="block text-sm font-semibold text-on-surface">
                            Kategori <span class="text-red-400">*</span>
                        </label>
                        <?php $kat = old('kategori', $proyek['kategori']); ?>
                        <select
                            id="kategori"
                            name="kategori"
                            required
                            class="form-input w-full bg-surface-container-lowest border border-white/10 rounded-xl px-4 py-3 text-sm text-on-surface focus:outline-none focus:border-primary/50 focus:ring-1 focus:ring-primary/30 transition-all appearance-none cursor-pointer">
                            <option value="" disabled>Pilih kategori...</option>
                            <option value="Web Dev" <?= $kat === 'Web Dev' ? 'selected' : '' ?>>Web Dev</option>
                            <option value="Mobile" <?= $kat === 'Mobile' ? 'selected' : '' ?>>Mobile</option>
                            <option value="UI/UX" <?= $kat === 'UI/UX' ? 'selected' : '' ?>>UI/UX</option>
                            <option value="Desktop" <?= $kat === 'Desktop' ? 'selected' : '' ?>>Desktop</option>
                            <option value="API" <?= $kat === 'API' ? 'selected' : '' ?>>API</option>
                            <option value="Lainnya" <?= $kat === 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
                        </select>
                    </div>

                    <!-- Deskripsi -->
                    <div class="space-y-2">
                        <label for="deskripsi" class="block text-sm font-semibold text-on-surface">
                            Deskripsi Proyek
                        </label>
                        <textarea
                            id="deskripsi"
                            name="deskripsi"
                            rows="6"
                            placeholder="Jelaskan proyek Anda secara detail..."
                            class="form-input w-full bg-surface-container-lowest border border-white/10 rounded-xl px-4 py-3 text-sm text-on-surface placeholder:text-on-surface-variant/40 focus:outline-none focus:border-primary/50 focus:ring-1 focus:ring-primary/30 transition-all resize-none"><?= old('deskripsi', $proyek['deskripsi']) ?></textarea>
                        <p class="text-[11px] text-on-surface-variant/40">Tuliskan deskripsi lengkap tentang proyek, teknologi yang digunakan, dan fitur utamanya.</p>
                    </div>

                    <!-- Teknologi Tags -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-on-surface">
                            Teknologi yang Digunakan
                        </label>
                        <input type="hidden" id="teknologi" name="teknologi" value="<?= old('teknologi', $proyek['teknologi'] ?? '') ?>">
                        <div class="form-input w-full bg-surface-container-lowest border border-white/10 rounded-xl px-3 py-2 flex flex-wrap gap-2 items-center min-h-[48px] focus-within:border-primary/50 focus-within:ring-1 focus-within:ring-primary/30 transition-all" id="tagContainer">
                            <div id="tagList" class="flex flex-wrap gap-2"></div>
                            <input
                                type="text"
                                id="tagInput"
                                placeholder="Ketik lalu Enter..."
                                class="bg-transparent border-none outline-none text-sm text-on-surface placeholder:text-on-surface-variant/40 flex-1 min-w-[120px] py-1"
                                autocomplete="off">
                        </div>
                        <div id="tagSuggestions" class="hidden relative">
                            <div class="absolute top-0 left-0 right-0 bg-surface-container-low border border-white/10 rounded-xl shadow-xl overflow-hidden z-50 max-h-[200px] overflow-y-auto"></div>
                        </div>
                        <p class="text-[11px] text-on-surface-variant/40">Tekan Enter atau koma untuk menambah tag. Contoh: CodeIgniter4, PHP, MySQL</p>
                    </div>
                </div>

                <!-- Existing Photos -->
                <?php if (!empty($proyek['foto'])): ?>
                    <div class="glass-card p-6 md:p-8 rounded-2xl space-y-6">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center">
                                <span class="material-symbols-outlined text-amber-400 text-xl">photo_library</span>
                            </div>
                            <div>
                                <h3 class="font-headline-md text-sm font-bold text-on-surface">Foto Saat Ini</h3>
                                <p class="text-xs text-on-surface-variant/60">Centang foto yang ingin dihapus</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                            <?php foreach ($proyek['foto'] as $foto): ?>
                                <div class="relative group rounded-xl overflow-hidden border border-white/10 aspect-square" id="existing-foto-<?= $foto['id'] ?>">
                                    <img class="w-full h-full object-cover" src="<?= base_url('uploads/proyek/' . $foto['nama_file']) ?>" alt="Foto proyek">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    <label class="absolute top-2 right-2 cursor-pointer">
                                        <input type="checkbox" name="hapus_foto[]" value="<?= $foto['id'] ?>" class="hidden foto-checkbox" onchange="toggleFotoDelete(this, <?= $foto['id'] ?>)">
                                        <div class="w-7 h-7 rounded-lg bg-black/50 hover:bg-red-500/80 text-white/70 hover:text-white flex items-center justify-center transition-all" id="delete-icon-<?= $foto['id'] ?>">
                                            <span class="material-symbols-outlined text-sm">delete</span>
                                        </div>
                                    </label>
                                    <div class="absolute inset-0 border-2 border-red-500 rounded-xl hidden pointer-events-none" id="delete-overlay-<?= $foto['id'] ?>"></div>
                                    <div class="absolute top-2 left-2 hidden" id="delete-badge-<?= $foto['id'] ?>">
                                        <span class="bg-red-500 text-white text-[10px] px-2 py-0.5 rounded-md font-bold">HAPUS</span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Add New Photos -->
                <div class="glass-card p-6 md:p-8 rounded-2xl space-y-6">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-xl bg-secondary/10 border border-secondary/20 flex items-center justify-center">
                            <span class="material-symbols-outlined text-secondary text-xl">add_photo_alternate</span>
                        </div>
                        <div>
                            <h3 class="font-headline-md text-sm font-bold text-on-surface">Tambah Foto Baru</h3>
                            <p class="text-xs text-on-surface-variant/60">Upload foto tambahan untuk proyek</p>
                        </div>
                    </div>

                    <!-- Dropzone -->
                    <div
                        id="dropzone"
                        class="relative border-2 border-dashed border-white/10 rounded-2xl p-8 text-center cursor-pointer transition-all duration-300 hover:border-primary/40 hover:bg-primary/5 group"
                        onclick="document.getElementById('foto').click()">
                        <input
                            type="file"
                            id="foto"
                            name="foto[]"
                            multiple
                            accept="image/*"
                            class="hidden"
                            onchange="handleFileSelect(this.files)">
                        <div class="space-y-3" id="dropzoneContent">
                            <div class="w-16 h-16 mx-auto rounded-2xl bg-surface-container-high border border-white/10 flex items-center justify-center group-hover:scale-110 group-hover:border-primary/30 transition-all duration-300">
                                <span class="material-symbols-outlined text-3xl text-on-surface-variant/50 group-hover:text-primary transition-colors">cloud_upload</span>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-on-surface">Drag & drop foto di sini</p>
                                <p class="text-xs text-on-surface-variant/50 mt-1">atau klik untuk memilih file</p>
                            </div>
                            <p class="text-[10px] text-on-surface-variant/30 uppercase tracking-widest">JPG, PNG, WEBP • Maks 2MB per file</p>
                        </div>
                    </div>

                    <!-- Preview Grid -->
                    <div id="previewGrid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 hidden">
                    </div>
                </div>
            </div>

            <!-- Right Column: Status & Actions -->
            <div class="space-y-6">
                <!-- Status Card -->
                <div class="glass-card p-6 rounded-2xl space-y-5 lg:sticky lg:top-24">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-xl bg-tertiary/10 border border-tertiary/20 flex items-center justify-center">
                            <span class="material-symbols-outlined text-tertiary text-xl">tune</span>
                        </div>
                        <div>
                            <h3 class="font-headline-md text-sm font-bold text-on-surface">Publikasi</h3>
                            <p class="text-xs text-on-surface-variant/60">Pengaturan status</p>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="space-y-2">
                        <label for="status" class="block text-sm font-semibold text-on-surface">Status</label>
                        <?php $st = old('status', $proyek['status']); ?>
                        <select
                            id="status"
                            name="status"
                            required
                            class="form-input w-full bg-surface-container-lowest border border-white/10 rounded-xl px-4 py-3 text-sm text-on-surface focus:outline-none focus:border-primary/50 focus:ring-1 focus:ring-primary/30 transition-all appearance-none cursor-pointer">
                            <option value="draft" <?= $st === 'draft' ? 'selected' : '' ?>>📝 Draft</option>
                            <option value="published" <?= $st === 'published' ? 'selected' : '' ?>>🚀 Published</option>
                        </select>
                    </div>

                    <!-- Status Preview -->
                    <?php $isPublished = $st === 'published'; ?>
                    <div id="statusPreview" class="p-3 rounded-xl <?= $isPublished ? 'bg-emerald-500/5 border border-emerald-500/20' : 'bg-amber-500/5 border border-amber-500/20' ?> flex items-center gap-3">
                        <span id="statusDot" class="w-2.5 h-2.5 rounded-full <?= $isPublished ? 'bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]' : 'bg-amber-500 shadow-[0_0_8px_rgba(245,158,11,0.5)]' ?>"></span>
                        <span id="statusText" class="text-xs font-semibold <?= $isPublished ? 'text-emerald-400' : 'text-amber-400' ?>"><?= $isPublished ? 'Published — Akan ditampilkan di portofolio' : 'Draft — Belum dipublikasikan' ?></span>
                    </div>

                    <hr class="border-white/5">

                    <!-- Info -->
                    <div class="space-y-2 text-xs text-on-surface-variant/50">
                        <div class="flex justify-between">
                            <span>Dibuat</span>
                            <span class="text-on-surface-variant"><?= date('d M Y, H:i', strtotime($proyek['created_at'])) ?></span>
                        </div>
                        <?php if (!empty($proyek['updated_at'])): ?>
                            <div class="flex justify-between">
                                <span>Diperbarui</span>
                                <span class="text-on-surface-variant"><?= date('d M Y, H:i', strtotime($proyek['updated_at'])) ?></span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <hr class="border-white/5">

                    <!-- Submit Buttons -->
                    <div class="space-y-3">
                        <button type="submit" class="primary-button w-full flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl font-label-md text-label-md">
                            <span class="material-symbols-outlined text-lg">save</span>
                            Simpan Perubahan
                        </button>
                        <a href="<?= base_url('/admin/proyek') ?>" class="w-full flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-label-md text-label-md border border-white/10 text-on-surface-variant hover:bg-white/5 hover:text-on-surface transition-all">
                            <span class="material-symbols-outlined text-lg">close</span>
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<!-- Floating Atmosphere Elements -->
<div class="fixed top-[-10%] right-[-5%] w-[400px] h-[400px] bg-primary/5 blur-[120px] rounded-full pointer-events-none"></div>
<div class="fixed bottom-[-10%] left-[-5%] w-[300px] h-[300px] bg-secondary/5 blur-[100px] rounded-full pointer-events-none"></div>

<link rel="stylesheet" href="<?= base_url('css/admin-proyek-form.css') ?>" />

<script>
    // Custom Toast Notification System
    function showToast(message, type = 'error') {
        let container = document.getElementById('toast-container');
        if (!container) {
            container = document.createElement('div');
            container.id = 'toast-container';
            container.className = 'fixed bottom-5 right-5 z-[200] flex flex-col gap-3 max-w-sm w-full';
            document.body.appendChild(container);
        }

        const toast = document.createElement('div');
        toast.className = `glass-card p-4 rounded-xl border-l-4 ${type === 'success' ? 'border-emerald-500 bg-emerald-500/5' : 'border-red-500 bg-red-500/5'} flex items-start gap-3 shadow-2xl opacity-0 translate-y-2 transition-all duration-300`;

        toast.innerHTML = `
            <span class="material-symbols-outlined ${type === 'success' ? 'text-emerald-400' : 'text-red-400'} mt-0.5">${type === 'success' ? 'check_circle' : 'error'}</span>
            <div class="flex-1">
                <p class="text-sm font-semibold ${type === 'success' ? 'text-emerald-400' : 'text-red-400'}">${type === 'success' ? 'Berhasil' : 'Peringatan'}</p>
                <p class="text-xs text-on-surface-variant/80 mt-1">${message}</p>
            </div>
            <button type="button" class="text-on-surface-variant/40 hover:text-on-surface transition-colors" onclick="this.parentElement.remove()">
                <span class="material-symbols-outlined text-sm">close</span>
            </button>
        `;

        container.appendChild(toast);

        setTimeout(() => {
            toast.classList.remove('opacity-0', 'translate-y-2');
        }, 10);

        setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-y-2');
            setTimeout(() => toast.remove(), 300);
        }, 4000);
    }

    // Helper to calculate existing photos that are NOT checked for deletion
    function getExistingPhotoCount() {
        const totalExisting = <?= !empty($proyek['foto']) ? count($proyek['foto']) : 0 ?>;
        const checkedForDelete = document.querySelectorAll('.foto-checkbox:checked').length;
        return totalExisting - checkedForDelete;
    }

    // Toggle existing photo delete
    function toggleFotoDelete(checkbox, fotoId) {
        const overlay = document.getElementById('delete-overlay-' + fotoId);
        const badge = document.getElementById('delete-badge-' + fotoId);
        const icon = document.getElementById('delete-icon-' + fotoId);

        // If unchecking (keeping the photo, which increases the count)
        if (!checkbox.checked) {
            const existingCount = getExistingPhotoCount() + 1;
            if (existingCount + selectedFiles.length > 10) {
                showToast('Jumlah total foto melebihi batas 10 foto. Hapus beberapa foto baru terlebih dahulu.');
                checkbox.checked = true;
                return;
            }
        }

        if (checkbox.checked) {
            overlay.classList.remove('hidden');
            badge.classList.remove('hidden');
            icon.classList.add('bg-red-500/80');
            icon.classList.remove('bg-black/50');
        } else {
            overlay.classList.add('hidden');
            badge.classList.add('hidden');
            icon.classList.remove('bg-red-500/80');
            icon.classList.add('bg-black/50');
        }
    }

    // File preview handling
    let selectedFiles = [];

    function handleFileSelect(files) {
        const validImages = Array.from(files).filter(file => file.type.startsWith('image/'));
        const existingCount = getExistingPhotoCount();

        if (existingCount + selectedFiles.length + validImages.length > 10) {
            showToast('Jumlah foto (foto saat ini + foto baru) melebihi batas 10 foto.');
            return;
        }

        validImages.forEach(file => selectedFiles.push(file));

        updateFileInput();
        renderPreviews();
    }

    function renderPreviews() {
        const grid = document.getElementById('previewGrid');
        grid.innerHTML = '';

        if (selectedFiles.length === 0) {
            grid.classList.add('hidden');
            return;
        }

        grid.classList.remove('hidden');

        selectedFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const card = document.createElement('div');
                card.className = 'preview-card relative group rounded-xl overflow-hidden border border-white/10 aspect-square';
                card.style.animationDelay = `${index * 0.05}s`;
                card.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-full object-cover" alt="Preview">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <p class="text-[10px] text-white/80 truncate">${file.name}</p>
                        <p class="text-[9px] text-white/50">${formatFileSize(file.size)}</p>
                    </div>
                    <button type="button" onclick="removeFile(${index})" class="remove-btn absolute top-2 right-2 w-7 h-7 rounded-lg bg-red-500/80 hover:bg-red-500 text-white flex items-center justify-center transition-all active:scale-90">
                        <span class="material-symbols-outlined text-sm">close</span>
                    </button>
                `;
                grid.appendChild(card);
            };
            reader.readAsDataURL(file);
        });
    }

    function removeFile(index) {
        selectedFiles.splice(index, 1);
        updateFileInput();
        renderPreviews();
    }

    function updateFileInput() {
        const input = document.getElementById('foto');
        const dt = new DataTransfer();
        selectedFiles.forEach(file => dt.items.add(file));
        input.files = dt.files;
    }

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 B';
        const k = 1024;
        const sizes = ['B', 'KB', 'MB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(1)) + ' ' + sizes[i];
    }

    // Drag and drop
    const dropzone = document.getElementById('dropzone');

    ['dragenter', 'dragover'].forEach(eventName => {
        dropzone.addEventListener(eventName, (e) => {
            e.preventDefault();
            dropzone.classList.add('dropzone-active');
        });
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, (e) => {
            e.preventDefault();
            dropzone.classList.remove('dropzone-active');
        });
    });

    dropzone.addEventListener('drop', (e) => {
        const files = e.dataTransfer.files;
        handleFileSelect(files);
    });

    // Status preview dynamic update
    const statusSelect = document.getElementById('status');
    const statusPreview = document.getElementById('statusPreview');
    const statusDot = document.getElementById('statusDot');
    const statusText = document.getElementById('statusText');

    statusSelect.addEventListener('change', function() {
        if (this.value === 'published') {
            statusPreview.className = 'p-3 rounded-xl bg-emerald-500/5 border border-emerald-500/20 flex items-center gap-3';
            statusDot.className = 'w-2.5 h-2.5 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]';
            statusText.className = 'text-xs font-semibold text-emerald-400';
            statusText.textContent = 'Published — Akan ditampilkan di portofolio';
        } else {
            statusPreview.className = 'p-3 rounded-xl bg-amber-500/5 border border-amber-500/20 flex items-center gap-3';
            statusDot.className = 'w-2.5 h-2.5 rounded-full bg-amber-500 shadow-[0_0_8px_rgba(245,158,11,0.5)]';
            statusText.className = 'text-xs font-semibold text-amber-400';
            statusText.textContent = 'Draft — Belum dipublikasikan';
        }
    });

    // ===== Technology Tags =====
    const techSuggestions = [
        'PHP', 'JavaScript', 'TypeScript', 'Python', 'Java', 'Kotlin', 'Swift',
        'C#', 'C++', 'Go', 'Rust', 'Ruby', 'Dart', 'HTML', 'CSS', 'SASS',
        'CodeIgniter4', 'Laravel', 'React', 'Vue.js', 'Angular', 'Next.js',
        'Node.js', 'Express.js', 'Django', 'Flask', 'Spring Boot', 'ASP.NET',
        'Flutter', 'React Native', 'Android Studio', 'Xcode', 'SwiftUI',
        'MySQL', 'PostgreSQL', 'MongoDB', 'Redis', 'Firebase', 'SQLite',
        'Docker', 'Kubernetes', 'AWS', 'Google Cloud', 'Azure', 'Vercel',
        'Git', 'GitHub', 'GitLab', 'Figma', 'Adobe XD', 'TailwindCSS',
        'Bootstrap', 'Material UI', 'Vite', 'Webpack', 'REST API', 'GraphQL',
    ];

    let tags = [];
    const tagInput = document.getElementById('tagInput');
    const tagList = document.getElementById('tagList');
    const tagHidden = document.getElementById('teknologi');
    const tagSuggestionsEl = document.getElementById('tagSuggestions');
    let activeSuggestionIndex = -1;

    // Load existing tags
    if (tagHidden.value) {
        tagHidden.value.split(',').forEach(t => {
            const trimmed = t.trim();
            if (trimmed) addTag(trimmed);
        });
    }

    tagInput.addEventListener('keydown', function(e) {
        const suggestions = tagSuggestionsEl.querySelectorAll('.tag-suggestion-item');

        if (e.key === 'ArrowDown') {
            e.preventDefault();
            activeSuggestionIndex = Math.min(activeSuggestionIndex + 1, suggestions.length - 1);
            updateActiveSuggestion(suggestions);
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            activeSuggestionIndex = Math.max(activeSuggestionIndex - 1, 0);
            updateActiveSuggestion(suggestions);
        } else if (e.key === 'Enter' || e.key === ',') {
            e.preventDefault();
            if (activeSuggestionIndex >= 0 && suggestions[activeSuggestionIndex]) {
                addTag(suggestions[activeSuggestionIndex].textContent);
            } else if (this.value.trim()) {
                addTag(this.value.trim().replace(/,/g, ''));
            }
            this.value = '';
            hideSuggestions();
        } else if (e.key === 'Backspace' && !this.value && tags.length > 0) {
            removeTag(tags.length - 1);
        }
    });

    tagInput.addEventListener('input', function() {
        const val = this.value.trim().toLowerCase();
        if (val.length < 1) {
            hideSuggestions();
            return;
        }

        const filtered = techSuggestions.filter(s =>
            s.toLowerCase().includes(val) && !tags.includes(s)
        ).slice(0, 6);

        if (filtered.length === 0) {
            hideSuggestions();
            return;
        }

        const container = tagSuggestionsEl.querySelector('div');
        container.innerHTML = filtered.map(s =>
            `<div class="tag-suggestion-item" onclick="addTag('${s}'); document.getElementById('tagInput').value=''; hideSuggestions();">${s}</div>`
        ).join('');
        tagSuggestionsEl.classList.remove('hidden');
        activeSuggestionIndex = -1;
    });

    tagInput.addEventListener('blur', function() {
        setTimeout(hideSuggestions, 200);
    });

    function addTag(text) {
        text = text.trim();
        if (!text || tags.includes(text)) return;
        tags.push(text);
        renderTags();
    }

    function removeTag(index) {
        tags.splice(index, 1);
        renderTags();
    }

    function renderTags() {
        tagList.innerHTML = tags.map((tag, i) =>
            `<span class="tech-tag">${tag}<button type="button" onclick="removeTag(${i})">&times;</button></span>`
        ).join('');
        tagHidden.value = tags.join(',');
    }

    function hideSuggestions() {
        tagSuggestionsEl.classList.add('hidden');
        activeSuggestionIndex = -1;
    }

    function updateActiveSuggestion(items) {
        items.forEach((item, i) => {
            item.classList.toggle('active', i === activeSuggestionIndex);
        });
        if (items[activeSuggestionIndex]) {
            items[activeSuggestionIndex].scrollIntoView({
                block: 'nearest'
            });
        }
    }
</script>

<?= view('admin/layouts/footer') ?>