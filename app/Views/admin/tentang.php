<?= view('admin/layouts/header', ['activePage' => 'tentang', 'pageTitle' => 'Manajemen Profil']) ?>
<?= view('admin/layouts/sidebar', ['activePage' => 'tentang', 'pageTitle' => 'Manajemen Profil']) ?>

<!-- MAIN CONTENT -->
<main class="ml-0 md:ml-64 mt-16 p-4 md:p-8 lg:p-12 relative z-10 space-y-8 md:space-y-12">
    <div class="max-w-5xl mx-auto space-y-10">

        <!-- Profile Photo & Description -->
        <section>
            <h3 class="text-xl font-bold mb-6 text-primary flex items-center gap-2">
                <span class="material-symbols-outlined">account_circle</span> Foto &amp; Deskripsi Utama
            </h3>
            <div class="glass-card p-8 rounded-3xl grid grid-cols-1 md:grid-cols-12 gap-8">
                <div class="md:col-span-4 flex flex-col items-center gap-4">
                    <div class="w-full aspect-square rounded-2xl overflow-hidden border-2 border-dashed border-white/10 relative group cursor-pointer" onclick="document.getElementById('file-upload-input').click();">
                        <?php
                        $photoUrl = 'https://lh3.googleusercontent.com/aida-public/AB6AXuACcwX8uD_10xYXnSNdTG85QwBjIl63UiSEKPDgLlTlrpuz31mhvVoAw2cncs0FUUbx1kOcysfsKH65ZXa3k03drvmEEUtyk4ZzqUu9qdptYIAs8-EedMAby7rirbOapeA85bVDJMiZs2i3-Lfg-qLs7oW_PS88M6I08RKXCurbBVdJ7RaOcO5GLirA6xHTv-MxQvYqsGka964OZp-Ynd-zhXsMJtoXT0x048nFvxPG4FUHS597nTIESYSJGw9s8HmIgVwYtOguOUM';
                        if (!empty($profil['foto'])) {
                            $photoUrl = (strpos($profil['foto'], 'http') === 0) ? $profil['foto'] : base_url('uploads/profil/' . $profil['foto']);
                        }
                        ?>
                        <img alt="Profile" class="w-full h-full object-cover transition duration-300 group-hover:scale-105" id="profile-preview" src="<?= $photoUrl ?>">
                        <div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span class="material-symbols-outlined text-white text-3xl">add_a_photo</span>
                        </div>
                    </div>
                    <input type="file" id="file-upload-input" accept="image/*" class="hidden" onchange="previewProfileImage(this)">
                    <button type="button" onclick="document.getElementById('file-upload-input').click();" class="text-xs text-primary font-bold uppercase tracking-widest hover:underline cursor-pointer active:opacity-75">Ganti Foto Profil</button>
                </div>
                <div class="md:col-span-8 space-y-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Nama Lengkap</label>
                        <input id="nama-input" class="w-full input-glass rounded-xl px-4 py-3 font-headline-md text-lg" type="text" value="<?= esc($profil['nama'] ?? '') ?>">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Tagline Utama</label>
                        <input id="tagline-input" class="w-full input-glass rounded-xl px-4 py-3 font-headline-md text-lg" type="text" value="<?= esc($profil['tagline'] ?? '') ?>">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Biografi Singkat</label>
                        <textarea id="biography-input" class="w-full input-glass rounded-xl px-4 py-3 min-h-[160px] leading-relaxed"><?= esc($profil['biografi'] ?? '') ?></textarea>
                    </div>
                    <div class="flex justify-end pt-4">
                        <button type="button" onclick="saveChanges()" class="bg-primary text-on-primary font-bold px-8 py-3 rounded-xl shadow-lg shadow-primary/20 hover:shadow-primary/40 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center gap-2 cursor-pointer">
                            <span class="material-symbols-outlined text-xl">save</span>
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Keahlian Teknis -->
        <section>
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-primary flex items-center gap-2">
                    <span class="material-symbols-outlined">psychology</span> Keahlian Teknis
                </h3>
                <button type="button" onclick="openAddSkillModal()" class="text-sm bg-white/5 hover:bg-white/10 active:scale-95 px-4 py-1.5 rounded-full border border-white/10 transition-all flex items-center gap-1 cursor-pointer">
                    <span class="material-symbols-outlined text-sm">add</span> Tambah Skill
                </button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" id="skills-grid">
                <?php foreach ($skills as $s): ?>
                <div class="glass-card p-4 rounded-2xl flex flex-col gap-3 group/card transition duration-300 hover:border-primary/40" id="skill-card-<?= $s['id'] ?>">
                    <div class="flex justify-between items-center">
                        <div class="w-8 h-8 rounded-lg bg-primary/20 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-lg"><?= esc($s['ikon']) ?></span>
                        </div>
                        <button type="button" onclick="deleteSkill(<?= $s['id'] ?>)" class="text-on-surface-variant hover:text-error transition-colors cursor-pointer active:scale-90" title="Hapus Skill">
                            <span class="material-symbols-outlined text-lg">delete</span>
                        </button>
                    </div>
                    <input class="bg-transparent border-none p-0 focus:ring-0 font-bold text-sm text-on-surface focus:outline-none" type="text" value="<?= esc($s['nama']) ?>" onchange="updateSkillName(<?= $s['id'] ?>, this.value)">
                    <div>
                        <div class="flex justify-between text-[10px] uppercase font-bold text-on-surface-variant mb-1">
                            <span>Level</span>
                            <span id="level-label-<?= $s['id'] ?>"><?= $s['level'] ?>%</span>
                        </div>
                        <input class="w-full h-1 bg-white/10 rounded-full appearance-none cursor-pointer accent-primary" type="range" min="0" max="100" value="<?= $s['level'] ?>" oninput="updateLevelLabel(this, 'level-label-<?= $s['id'] ?>')" onchange="updateSkillLevel(<?= $s['id'] ?>, this.value)">
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Jejak Karir -->
        <section>
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-primary flex items-center gap-2">
                    <span class="material-symbols-outlined">work_history</span> Jejak Karir
                </h3>
                <button type="button" onclick="openAddCareerModal()" class="text-sm bg-white/5 hover:bg-white/10 active:scale-95 px-4 py-1.5 rounded-full border border-white/10 transition-all flex items-center gap-1 cursor-pointer">
                    <span class="material-symbols-outlined text-sm">add</span> Tambah Riwayat
                </button>
            </div>

            <div class="glass-card rounded-2xl overflow-hidden">
                <div class="p-6 border-b border-white/5">
                    <h4 class="font-headline-md text-sm text-on-surface">Daftar Jejak Karir</h4>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container-highest/30">
                                <th class="px-6 py-4 font-label-md text-on-surface-variant/70 uppercase tracking-tighter text-[11px]">Periode</th>
                                <th class="px-6 py-4 font-label-md text-on-surface-variant/70 uppercase tracking-tighter text-[11px]">Posisi</th>
                                <th class="px-6 py-4 font-label-md text-on-surface-variant/70 uppercase tracking-tighter text-[11px]">Perusahaan</th>
                                <th class="px-6 py-4 font-label-md text-on-surface-variant/70 uppercase tracking-tighter text-[11px] text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5" id="career-tbody">
                            <?php if (empty($careers)): ?>
                                <tr id="no-career-row">
                                    <td colspan="4" class="px-6 py-8 text-center text-sm text-on-surface-variant/50">Belum ada riwayat karir.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($careers as $c): ?>
                                <tr class="hover:bg-white/5 transition-colors duration-200" id="career-row-<?= $c['id'] ?>" data-deskripsi="<?= esc($c['deskripsi'] ?? '') ?>" data-tags="<?= esc($c['tags'] ?? '') ?>">
                                    <td class="px-6 py-4 text-sm text-on-surface-variant career-periode"><?= esc($c['periode']) ?></td>
                                    <td class="px-6 py-4 text-sm font-bold text-on-surface career-posisi"><?= esc($c['posisi']) ?></td>
                                    <td class="px-6 py-4 text-sm text-on-surface-variant career-perusahaan"><?= esc($c['perusahaan']) ?></td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            <button type="button" onclick="editCareer(<?= $c['id'] ?>)" class="p-2 rounded-lg hover:bg-white/5 text-on-surface-variant hover:text-primary transition-all cursor-pointer" title="Edit Riwayat">
                                                <span class="material-symbols-outlined text-lg">edit</span>
                                            </button>
                                            <button type="button" onclick="deleteCareer(<?= $c['id'] ?>)" class="p-2 rounded-lg hover:bg-error/10 text-on-surface-variant hover:text-error transition-all cursor-pointer" title="Hapus Riwayat">
                                                <span class="material-symbols-outlined text-lg">delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- CV Section -->
        <section>
            <h3 class="text-xl font-bold mb-6 text-primary flex items-center gap-2">
                <span class="material-symbols-outlined">description</span> Manajemen CV
            </h3>
            <div class="glass-card p-6 rounded-2xl space-y-6">
                <div class="p-4 border-2 border-dashed border-white/10 rounded-xl flex flex-col items-center gap-3 bg-white/5 relative group cursor-pointer" onclick="document.getElementById('cv-file-input').click();">
                    <span class="material-symbols-outlined text-primary text-3xl">upload_file</span>
                    <div class="text-center">
                        <p class="text-sm font-bold text-on-surface" id="cv-filename-label"><?= !empty($profil['cv_file']) ? esc($profil['cv_file']) : 'Belum ada file diunggah' ?></p>
                        <p class="text-[10px] text-on-surface-variant uppercase tracking-widest mt-1" id="cv-date-label">Terakhir diperbarui: <?= !empty($profil['updated_at']) ? date('d M Y', strtotime($profil['updated_at'])) : '-' ?></p>
                    </div>
                    <input type="file" id="cv-file-input" class="hidden" accept=".pdf,.doc,.docx" onchange="previewCVFile(this)">
                    <button type="button" class="bg-white/10 hover:bg-white/20 px-4 py-2 rounded-lg text-xs font-bold transition-all cursor-pointer">Ganti PDF</button>
                </div>
                <div class="flex justify-end pt-2">
                    <button type="button" onclick="saveCV()" class="bg-primary text-on-primary font-bold px-6 py-2.5 rounded-xl shadow-lg shadow-primary/20 hover:shadow-primary/40 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center gap-2 cursor-pointer text-xs">
                        <span class="material-symbols-outlined text-base">save</span>
                        Simpan CV
                    </button>
                </div>
            </div>
        </section>


    </div>
</main>

<!-- BACKGROUND ATMOSPHERE LIGHTS -->
<div class="fixed top-[-10%] right-[-5%] w-[400px] h-[400px] bg-primary/5 blur-[120px] rounded-full pointer-events-none"></div>
<div class="fixed bottom-[-10%] left-[-5%] w-[300px] h-[300px] bg-secondary/5 blur-[100px] rounded-full pointer-events-none"></div>

<!-- PORTAL MODAL (For adding/editing items) -->
<div id="portal-modal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/60 backdrop-blur-md opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="glass-card w-full max-w-md rounded-3xl p-6 shadow-2xl relative translate-y-4 scale-95 transition-all duration-300" id="modal-container">
        <button onclick="closeModal()" class="absolute top-4 right-4 text-on-surface-variant hover:text-on-surface transition-colors cursor-pointer">
            <span class="material-symbols-outlined">close</span>
        </button>
        <h4 class="font-headline-md text-lg text-primary font-bold mb-6 flex items-center gap-2" id="modal-title">
            <span class="material-symbols-outlined" id="modal-title-icon">work_history</span> <span>Judul Modal</span>
        </h4>

        <!-- Form for Career -->
        <div id="career-form-fields" class="space-y-4">
            <div>
                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-2">Periode</label>
                <input id="input-career-periode" class="w-full input-glass rounded-xl px-4 py-2.5 text-sm" placeholder="e.g. 2022 - Sekarang" type="text">
            </div>
            <div>
                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-2">Posisi / Jabatan</label>
                <input id="input-career-posisi" class="w-full input-glass rounded-xl px-4 py-2.5 text-sm" placeholder="e.g. Senior Backend Developer" type="text">
            </div>
            <div>
                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-2">Perusahaan</label>
                <input id="input-career-perusahaan" class="w-full input-glass rounded-xl px-4 py-2.5 text-sm" placeholder="e.g. Tech Solutions Inc." type="text">
            </div>
            <div>
                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-2">Deskripsi Kerja</label>
                <textarea id="input-career-deskripsi" class="w-full input-glass rounded-xl px-4 py-2.5 text-sm min-h-[100px]" placeholder="Deskripsi tugas dan pencapaian Anda..."></textarea>
            </div>
            <div>
                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-2">Tag Teknologi (Pisahkan dengan Koma)</label>
                <input id="input-career-tags" class="w-full input-glass rounded-xl px-4 py-2.5 text-sm" placeholder="e.g. CodeIgniter 4, React, MySQL" type="text">
            </div>
        </div>

        <!-- Form for Skill -->
        <div id="skill-form-fields" class="space-y-4 hidden">
            <div>
                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-2">Nama Skill</label>
                <input id="input-skill-name" class="w-full input-glass rounded-xl px-4 py-2.5 text-sm" placeholder="e.g. React.js" type="text">
            </div>
            <div>
                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-2">Ikon Skill (Material Symbol)</label>
                <select id="input-skill-icon" class="w-full input-glass rounded-xl px-4 py-2.5 text-sm bg-surface-container">
                    <option value="code">Code (Umum)</option>
                    <option value="html">HTML</option>
                    <option value="css">CSS</option>
                    <option value="javascript">Javascript</option>
                    <option value="database">Database (SQL/MySQL)</option>
                    <option value="api">API / Web Services</option>
                    <option value="terminal">Terminal / CLI</option>
                    <option value="cloud">Cloud / AWS</option>
                    <option value="psychology">Brain / AI</option>
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-2">Level Awal (%)</label>
                <div class="flex items-center gap-3">
                    <input id="input-skill-level" class="w-full h-1 bg-white/10 rounded-full appearance-none cursor-pointer accent-primary" type="range" min="0" max="100" value="80" oninput="document.getElementById('input-skill-level-text').innerText = this.value + '%'">
                    <span id="input-skill-level-text" class="text-xs font-bold text-primary shrink-0 w-10 text-right">80%</span>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3 mt-8">
            <button onclick="closeModal()" class="px-5 py-2.5 rounded-xl border border-white/10 hover:bg-white/5 transition-all text-xs font-bold cursor-pointer">Batal</button>
            <button id="modal-submit-btn" class="bg-primary text-on-primary font-bold px-6 py-2.5 rounded-xl shadow-lg shadow-primary/10 hover:shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all text-xs cursor-pointer">Simpan</button>
        </div>
    </div>
</div>

<!-- TOAST CONTAINER -->
<div id="toast-container" class="fixed bottom-6 right-6 z-[110] space-y-3"></div>

<!-- ADDITIONAL STYLES FOR OVERRIDES & COMPONENT INTERACTIVITY -->
<link rel="stylesheet" href="<?= base_url('css/admin-tentang.css') ?>" />

<!-- SCRIPT LOGIC FOR PREMIUM DYNAMIC DEMO -->
<script>
    // State management for demo simulation
    let editingCareerRowId = null;

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

    // Save changes function (Global save button)
    function saveChanges() {
        const nama = document.getElementById('nama-input').value.trim();
        const tagline = document.getElementById('tagline-input').value.trim();
        const biography = document.getElementById('biography-input').value.trim();
        const fileInput = document.getElementById('file-upload-input');

        if (!nama || !tagline || !biography) {
            showToast('Nama Lengkap, Tagline, dan Biografi wajib diisi!', 'error');
            return;
        }

        const formData = new FormData();
        formData.append('nama', nama);
        formData.append('tagline', tagline);
        formData.append('biografi', biography);
        if (fileInput.files[0]) {
            formData.append('foto', fileInput.files[0]);
        }
        
        formData.append('<?= csrf_token() ?>', '<?= csrf_hash() ?>');

        fetch('<?= base_url('/admin/tentang/updateProfil') ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                showToast(data.message);
                if (data.foto_url) {
                    document.getElementById('profile-preview').src = data.foto_url;
                }
            } else {
                showToast(data.message, 'error');
            }
        })
        .catch(err => {
            console.error(err);
            showToast('Terjadi kesalahan saat menyimpan profil.', 'error');
        });
    }

    // Profile photo preview handler
    function previewProfileImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profile-preview').src = e.target.result;
                showToast('Foto profil terpilih. Klik Simpan Perubahan untuk memperbarui permanen.');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // CV File selection handler
    function previewCVFile(input) {
        if (input.files && input.files[0]) {
            const filename = input.files[0].name;
            const size = (input.files[0].size / 1024 / 1024).toFixed(2);
            document.getElementById('cv-filename-label').innerText = filename + ` (${size} MB)`;
            showToast('File CV terpilih: ' + filename + '. Klik Simpan CV untuk memperbarui.');
        }
    }

    function saveCV() {
        const fileInput = document.getElementById('cv-file-input');

        if (!fileInput.files[0]) {
            showToast('Pilih file CV terlebih dahulu!', 'error');
            return;
        }

        const formData = new FormData();
        formData.append('cv_file', fileInput.files[0]);
        
        formData.append('<?= csrf_token() ?>', '<?= csrf_hash() ?>');

        fetch('<?= base_url('/admin/tentang/updateCV') ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                showToast(data.message);
                if (data.cv_file) {
                    document.getElementById('cv-filename-label').innerText = data.cv_file;
                }
                document.getElementById('cv-date-label').innerText = 'Terakhir diperbarui: ' + data.updated_at;
            } else {
                showToast(data.message, 'error');
            }
        })
        .catch(err => {
            console.error(err);
            showToast('Terjadi kesalahan saat menyimpan CV.', 'error');
        });
    }

    // Dynamic label for technical skill levels
    function updateLevelLabel(slider, labelId) {
        document.getElementById(labelId).innerText = slider.value + '%';
    }

    function updateSkillName(id, name) {
        if (!name.trim()) {
            showToast('Nama skill tidak boleh kosong!', 'error');
            return;
        }
        
        const formData = new FormData();
        formData.append('nama', name);
        formData.append('<?= csrf_token() ?>', '<?= csrf_hash() ?>');
        
        fetch('<?= base_url('/admin/tentang/updateSkill') ?>/' + id, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                showToast('Nama keahlian diperbarui.');
            } else {
                showToast(data.message, 'error');
            }
        });
    }

    function updateSkillLevel(id, level) {
        const formData = new FormData();
        formData.append('level', level);
        formData.append('<?= csrf_token() ?>', '<?= csrf_hash() ?>');
        
        fetch('<?= base_url('/admin/tentang/updateSkill') ?>/' + id, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                showToast('Tingkat keahlian diperbarui.');
            } else {
                showToast(data.message, 'error');
            }
        });
    }

    // Delete skill card
    function deleteSkill(id) {
        if (!confirm('Apakah Anda yakin ingin menghapus keahlian ini?')) return;
        
        const formData = new FormData();
        formData.append('<?= csrf_token() ?>', '<?= csrf_hash() ?>');
        
        fetch('<?= base_url('/admin/tentang/hapusSkill') ?>/' + id, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                const card = document.getElementById('skill-card-' + id);
                if (card) {
                    card.classList.add('opacity-0', 'scale-90');
                    card.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                    setTimeout(() => {
                        card.remove();
                        showToast(data.message);
                    }, 300);
                }
            } else {
                showToast(data.message, 'error');
            }
        });
    }

    // Modal Control Functions
    function openModal() {
        const modal = document.getElementById('portal-modal');
        const container = document.getElementById('modal-container');
        modal.classList.remove('opacity-0', 'pointer-events-none');
        container.classList.remove('translate-y-4', 'scale-95');
    }

    // Close Modal
    function closeModal() {
        const modal = document.getElementById('portal-modal');
        const container = document.getElementById('modal-container');
        modal.classList.add('opacity-0', 'pointer-events-none');
        container.classList.add('translate-y-4', 'scale-95');
        editingCareerRowId = null;
    }

    // Open add skill modal
    function openAddSkillModal() {
        document.getElementById('modal-title').innerHTML = '<span class="material-symbols-outlined">psychology</span> Tambah Keahlian Baru';
        document.getElementById('career-form-fields').classList.add('hidden');
        document.getElementById('skill-form-fields').classList.remove('hidden');

        // Reset fields
        document.getElementById('input-skill-name').value = '';
        document.getElementById('input-skill-icon').value = 'code';
        document.getElementById('input-skill-level').value = '80';
        document.getElementById('input-skill-level-text').innerText = '80%';

        // Set action
        document.getElementById('modal-submit-btn').onclick = submitAddSkill;

        openModal();
    }

    function submitAddSkill() {
        const name = document.getElementById('input-skill-name').value.trim();
        const icon = document.getElementById('input-skill-icon').value;
        const level = document.getElementById('input-skill-level').value;

        if (!name) {
            showToast('Mohon masukkan nama skill!', 'error');
            return;
        }

        const formData = new FormData();
        formData.append('nama', name);
        formData.append('ikon', icon);
        formData.append('level', level);
        formData.append('<?= csrf_token() ?>', '<?= csrf_hash() ?>');

        fetch('<?= base_url('/admin/tentang/tambahSkill') ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                const grid = document.getElementById('skills-grid');
                const id = data.id;

                const card = document.createElement('div');
                card.className = 'glass-card p-4 rounded-2xl flex flex-col gap-3 group/card transition duration-300 hover:border-primary/40 slide-in-new';
                card.id = 'skill-card-' + id;

                card.innerHTML = `
                    <div class="flex justify-between items-center">
                        <div class="w-8 h-8 rounded-lg bg-primary/20 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-lg">${icon}</span>
                        </div>
                        <button type="button" onclick="deleteSkill(${id})" class="text-on-surface-variant hover:text-error transition-colors cursor-pointer active:scale-90" title="Hapus Skill">
                            <span class="material-symbols-outlined text-lg">delete</span>
                        </button>
                    </div>
                    <input class="bg-transparent border-none p-0 focus:ring-0 font-bold text-sm text-on-surface focus:outline-none" type="text" value="${name}" onchange="updateSkillName(${id}, this.value)">
                    <div>
                        <div class="flex justify-between text-[10px] uppercase font-bold text-on-surface-variant mb-1">
                            <span>Level</span>
                            <span id="level-label-${id}">${level}%</span>
                        </div>
                        <input class="w-full h-1 bg-white/10 rounded-full appearance-none cursor-pointer accent-primary" type="range" min="0" max="100" value="${level}" oninput="updateLevelLabel(this, 'level-label-${id}')" onchange="updateSkillLevel(${id}, this.value)">
                    </div>
                `;

                grid.appendChild(card);
                closeModal();
                showToast(data.message);
            } else {
                showToast(data.message, 'error');
            }
        })
        .catch(err => {
            console.error(err);
            showToast('Terjadi kesalahan saat menambahkan keahlian.', 'error');
        });
    }

    // Open add career modal
    function openAddCareerModal() {
        document.getElementById('modal-title').innerHTML = '<span class="material-symbols-outlined">work_history</span> Tambah Jejak Karir';
        document.getElementById('career-form-fields').classList.remove('hidden');
        document.getElementById('skill-form-fields').classList.add('hidden');

        // Reset fields
        document.getElementById('input-career-periode').value = '';
        document.getElementById('input-career-posisi').value = '';
        document.getElementById('input-career-perusahaan').value = '';
        document.getElementById('input-career-deskripsi').value = '';
        document.getElementById('input-career-tags').value = '';

        // Set action
        editingCareerRowId = null;
        document.getElementById('modal-submit-btn').onclick = submitCareerForm;

        openModal();
    }

    // Open edit career modal
    function editCareer(rowId) {
        document.getElementById('modal-title').innerHTML = '<span class="material-symbols-outlined">edit</span> Edit Jejak Karir';
        document.getElementById('career-form-fields').classList.remove('hidden');
        document.getElementById('skill-form-fields').classList.add('hidden');

        const row = document.getElementById('career-row-' + rowId);
        const currentPeriode = row.querySelector('.career-periode').innerText;
        const currentPosisi = row.querySelector('.career-posisi').innerText;
        const currentPerusahaan = row.querySelector('.career-perusahaan').innerText;
        const currentDeskripsi = row.getAttribute('data-deskripsi') || '';
        const currentTags = row.getAttribute('data-tags') || '';

        document.getElementById('input-career-periode').value = currentPeriode;
        document.getElementById('input-career-posisi').value = currentPosisi;
        document.getElementById('input-career-perusahaan').value = currentPerusahaan;
        document.getElementById('input-career-deskripsi').value = currentDeskripsi;
        document.getElementById('input-career-tags').value = currentTags;

        editingCareerRowId = rowId;
        document.getElementById('modal-submit-btn').onclick = submitCareerForm;

        openModal();
    }

    function submitCareerForm() {
        const periode = document.getElementById('input-career-periode').value.trim();
        const posisi = document.getElementById('input-career-posisi').value.trim();
        const perusahaan = document.getElementById('input-career-perusahaan').value.trim();
        const deskripsi = document.getElementById('input-career-deskripsi').value.trim();
        const tags = document.getElementById('input-career-tags').value.trim();

        if (!periode || !posisi || !perusahaan) {
            showToast('Periode, Posisi, dan Perusahaan wajib diisi!', 'error');
            return;
        }

        const formData = new FormData();
        formData.append('periode', periode);
        formData.append('posisi', posisi);
        formData.append('perusahaan', perusahaan);
        formData.append('deskripsi', deskripsi);
        formData.append('tags', tags);
        formData.append('<?= csrf_token() ?>', '<?= csrf_hash() ?>');

        let url = '<?= base_url('/admin/tentang/tambahKarir') ?>';
        if (editingCareerRowId) {
            url = '<?= base_url('/admin/tentang/updateKarir') ?>/' + editingCareerRowId;
        }

        fetch(url, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                const tbody = document.getElementById('career-tbody');
                const noRow = document.getElementById('no-career-row');
                if (noRow) noRow.remove();

                if (editingCareerRowId) {
                    // Update existing row
                    const row = document.getElementById('career-row-' + editingCareerRowId);
                    row.querySelector('.career-periode').innerText = periode;
                    row.querySelector('.career-posisi').innerText = posisi;
                    row.querySelector('.career-perusahaan').innerText = perusahaan;
                    row.setAttribute('data-deskripsi', deskripsi);
                    row.setAttribute('data-tags', tags);
                    showToast(data.message);
                } else {
                    // Create new row
                    const id = data.id;
                    const newRow = document.createElement('tr');
                    newRow.className = 'hover:bg-white/5 transition-colors duration-200 slide-in-new';
                    newRow.id = 'career-row-' + id;
                    newRow.setAttribute('data-deskripsi', deskripsi);
                    newRow.setAttribute('data-tags', tags);

                    newRow.innerHTML = `
                        <td class="px-6 py-4 text-sm text-on-surface-variant career-periode">${periode}</td>
                        <td class="px-6 py-4 text-sm font-bold text-on-surface career-posisi">${posisi}</td>
                        <td class="px-6 py-4 text-sm text-on-surface-variant career-perusahaan">${perusahaan}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button type="button" onclick="editCareer(${id})" class="p-2 rounded-lg hover:bg-white/5 text-on-surface-variant hover:text-primary transition-all cursor-pointer" title="Edit Riwayat">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                </button>
                                <button type="button" onclick="deleteCareer(${id})" class="p-2 rounded-lg hover:bg-error/10 text-on-surface-variant hover:text-error transition-all cursor-pointer" title="Hapus Riwayat">
                                    <span class="material-symbols-outlined text-lg">delete</span>
                                </button>
                            </div>
                        </td>
                    `;
                    tbody.insertBefore(newRow, tbody.firstChild);
                    showToast(data.message);
                }
                closeModal();
            } else {
                showToast(data.message, 'error');
            }
        })
        .catch(err => {
            console.error(err);
            showToast('Terjadi kesalahan saat menyimpan riwayat karir.', 'error');
        });
    }

    // Delete career row
    function deleteCareer(id) {
        if (!confirm('Apakah Anda yakin ingin menghapus riwayat karir ini?')) return;

        const formData = new FormData();
        formData.append('<?= csrf_token() ?>', '<?= csrf_hash() ?>');

        fetch('<?= base_url('/admin/tentang/hapusKarir') ?>/' + id, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                const row = document.getElementById('career-row-' + id);
                if (row) {
                    row.classList.add('opacity-0');
                    row.style.transform = 'scaleY(0.9)';
                    row.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                    setTimeout(() => {
                        row.remove();
                        showToast(data.message);
                        
                        const tbody = document.getElementById('career-tbody');
                        if (tbody.children.length === 0) {
                            tbody.innerHTML = `
                                <tr id="no-career-row">
                                    <td colspan="4" class="px-6 py-8 text-center text-sm text-on-surface-variant/50">Belum ada riwayat karir.</td>
                                </tr>
                            `;
                        }
                    }, 300);
                }
            } else {
                showToast(data.message, 'error');
            }
        })
        .catch(err => {
            console.error(err);
            showToast('Terjadi kesalahan saat menghapus riwayat karir.', 'error');
        });
    }
</script>

<?= view('admin/layouts/footer') ?>