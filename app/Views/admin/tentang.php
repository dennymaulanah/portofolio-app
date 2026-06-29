<?= view('admin/layouts/header', ['activePage' => 'tentang', 'pageTitle' => 'Manajemen Profil']) ?>
<?= view('admin/layouts/sidebar', ['activePage' => 'tentang', 'pageTitle' => 'Manajemen Profil']) ?>

<!-- MAIN CONTENT -->
<main class="ml-64 mt-16 p-8 lg:p-12 relative z-10 space-y-12">
    <div class="max-w-5xl mx-auto space-y-10">

        <!-- Profile Photo & Description -->
        <section>
            <h3 class="text-xl font-bold mb-6 text-primary flex items-center gap-2">
                <span class="material-symbols-outlined">account_circle</span> Foto &amp; Deskripsi Utama
            </h3>
            <div class="glass-card p-8 rounded-3xl grid grid-cols-1 md:grid-cols-12 gap-8">
                <div class="md:col-span-4 flex flex-col items-center gap-4">
                    <div class="w-full aspect-square rounded-2xl overflow-hidden border-2 border-dashed border-white/10 relative group cursor-pointer" onclick="document.getElementById('file-upload-input').click();">
                        <img alt="Profile" class="w-full h-full object-cover transition duration-300 group-hover:scale-105" id="profile-preview" src="https://lh3.googleusercontent.com/aida-public/AB6AXuACcwX8uD_10xYXnSNdTG85QwBjIl63UiSEKPDgLlTlrpuz31mhvVoAw2cncs0FUUbx1kOcysfsKH65ZXa3k03drvmEEUtyk4ZzqUu9qdptYIAs8-EedMAby7rirbOapeA85bVDJMiZs2i3-Lfg-qLs7oW_PS88M6I08RKXCurbBVdJ7RaOcO5GLirA6xHTv-MxQvYqsGka964OZp-Ynd-zhXsMJtoXT0x048nFvxPG4FUHS597nTIESYSJGw9s8HmIgVwYtOguOUM">
                        <div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span class="material-symbols-outlined text-white text-3xl">add_a_photo</span>
                        </div>
                    </div>
                    <input type="file" id="file-upload-input" accept="image/*" class="hidden" onchange="previewProfileImage(this)">
                    <button type="button" onclick="document.getElementById('file-upload-input').click();" class="text-xs text-primary font-bold uppercase tracking-widest hover:underline cursor-pointer active:opacity-75">Ganti Foto Profil</button>
                </div>
                <div class="md:col-span-8 space-y-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Tagline Utama</label>
                        <input id="tagline-input" class="w-full input-glass rounded-xl px-4 py-3 font-headline-md text-lg" type="text" value="Membangun Solusi Digital dengan Presisi &amp; Kehandalan">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Biografi Singkat</label>
                        <textarea id="biography-input" class="w-full input-glass rounded-xl px-4 py-3 min-h-[160px] leading-relaxed">Saya adalah seorang pengembang perangkat lunak yang berfokus pada pembuatan aplikasi web yang tidak hanya memiliki kinerja tinggi, tetapi juga memberikan pengalaman pengguna yang sangat halus. Dedikasi saya pada standar teknik modern memastikan setiap baris kode yang saya tulis bersifat skalabel, aman, dan mudah dikelola.</textarea>
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
                <!-- Skill Card 1 (HTML5) -->
                <div class="glass-card p-4 rounded-2xl flex flex-col gap-3 group/card transition duration-300 hover:border-primary/40" id="skill-card-html">
                    <div class="flex justify-between items-center">
                        <div class="w-8 h-8 rounded-lg bg-primary/20 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-lg">html</span>
                        </div>
                        <button type="button" onclick="deleteSkill('skill-card-html')" class="text-on-surface-variant hover:text-error transition-colors cursor-pointer active:scale-90" title="Hapus Skill">
                            <span class="material-symbols-outlined text-lg">delete</span>
                        </button>
                    </div>
                    <input class="bg-transparent border-none p-0 focus:ring-0 font-bold text-sm text-on-surface focus:outline-none" type="text" value="HTML5">
                    <div>
                        <div class="flex justify-between text-[10px] uppercase font-bold text-on-surface-variant mb-1">
                            <span>Level</span>
                            <span id="level-label-html">95%</span>
                        </div>
                        <input class="w-full h-1 bg-white/10 rounded-full appearance-none cursor-pointer accent-primary" type="range" min="0" max="100" value="95" oninput="updateLevelLabel(this, 'level-label-html')">
                    </div>
                </div>

                <!-- Skill Card 2 (CSS3 / Tailwind) -->
                <div class="glass-card p-4 rounded-2xl flex flex-col gap-3 group/card transition duration-300 hover:border-primary/40" id="skill-card-css">
                    <div class="flex justify-between items-center">
                        <div class="w-8 h-8 rounded-lg bg-primary/20 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-lg">css</span>
                        </div>
                        <button type="button" onclick="deleteSkill('skill-card-css')" class="text-on-surface-variant hover:text-error transition-colors cursor-pointer active:scale-90" title="Hapus Skill">
                            <span class="material-symbols-outlined text-lg">delete</span>
                        </button>
                    </div>
                    <input class="bg-transparent border-none p-0 focus:ring-0 font-bold text-sm text-on-surface focus:outline-none" type="text" value="CSS3 / Tailwind">
                    <div>
                        <div class="flex justify-between text-[10px] uppercase font-bold text-on-surface-variant mb-1">
                            <span>Level</span>
                            <span id="level-label-css">90%</span>
                        </div>
                        <input class="w-full h-1 bg-white/10 rounded-full appearance-none cursor-pointer accent-primary" type="range" min="0" max="100" value="90" oninput="updateLevelLabel(this, 'level-label-css')">
                    </div>
                </div>

                <!-- Skill Card 3 (Vanilla JS) -->
                <div class="glass-card p-4 rounded-2xl flex flex-col gap-3 group/card transition duration-300 hover:border-primary/40" id="skill-card-js">
                    <div class="flex justify-between items-center">
                        <div class="w-8 h-8 rounded-lg bg-primary/20 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-lg">javascript</span>
                        </div>
                        <button type="button" onclick="deleteSkill('skill-card-js')" class="text-on-surface-variant hover:text-error transition-colors cursor-pointer active:scale-90" title="Hapus Skill">
                            <span class="material-symbols-outlined text-lg">delete</span>
                        </button>
                    </div>
                    <input class="bg-transparent border-none p-0 focus:ring-0 font-bold text-sm text-on-surface focus:outline-none" type="text" value="Vanilla JS">
                    <div>
                        <div class="flex justify-between text-[10px] uppercase font-bold text-on-surface-variant mb-1">
                            <span>Level</span>
                            <span id="level-label-js">85%</span>
                        </div>
                        <input class="w-full h-1 bg-white/10 rounded-full appearance-none cursor-pointer accent-primary" type="range" min="0" max="100" value="85" oninput="updateLevelLabel(this, 'level-label-js')">
                    </div>
                </div>

                <!-- Skill Card 4 (CodeIgniter 4) -->
                <div class="glass-card p-4 rounded-2xl flex flex-col gap-3 group/card transition duration-300 hover:border-primary/40" id="skill-card-ci4">
                    <div class="flex justify-between items-center">
                        <div class="w-8 h-8 rounded-lg bg-primary/20 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-lg">code</span>
                        </div>
                        <button type="button" onclick="deleteSkill('skill-card-ci4')" class="text-on-surface-variant hover:text-error transition-colors cursor-pointer active:scale-90" title="Hapus Skill">
                            <span class="material-symbols-outlined text-lg">delete</span>
                        </button>
                    </div>
                    <input class="bg-transparent border-none p-0 focus:ring-0 font-bold text-sm text-on-surface focus:outline-none" type="text" value="CodeIgniter 4">
                    <div>
                        <div class="flex justify-between text-[10px] uppercase font-bold text-on-surface-variant mb-1">
                            <span>Level</span>
                            <span id="level-label-ci4">80%</span>
                        </div>
                        <input class="w-full h-1 bg-white/10 rounded-full appearance-none cursor-pointer accent-primary" type="range" min="0" max="100" value="80" oninput="updateLevelLabel(this, 'level-label-ci4')">
                    </div>
                </div>
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
                            <!-- Row 1 -->
                            <tr class="hover:bg-white/5 transition-colors duration-200" id="career-row-1">
                                <td class="px-6 py-4 text-sm text-on-surface-variant career-periode">2022 - Sekarang</td>
                                <td class="px-6 py-4 text-sm font-bold text-on-surface career-posisi">Senior Full-Stack Developer</td>
                                <td class="px-6 py-4 text-sm text-on-surface-variant career-perusahaan">Tech Solutions Inc.</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button type="button" onclick="editCareer('career-row-1')" class="p-2 rounded-lg hover:bg-white/5 text-on-surface-variant hover:text-primary transition-all cursor-pointer" title="Edit Riwayat">
                                            <span class="material-symbols-outlined text-lg">edit</span>
                                        </button>
                                        <button type="button" onclick="deleteCareer('career-row-1')" class="p-2 rounded-lg hover:bg-error/10 text-on-surface-variant hover:text-error transition-all cursor-pointer" title="Hapus Riwayat">
                                            <span class="material-symbols-outlined text-lg">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
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
                        <p class="text-sm font-bold text-on-surface" id="cv-filename-label">Curriculum_Vitae_2023.pdf</p>
                        <p class="text-[10px] text-on-surface-variant uppercase tracking-widest mt-1" id="cv-date-label">Terakhir diperbarui: 12 Nov 2023</p>
                    </div>
                    <input type="file" id="cv-file-input" class="hidden" accept=".pdf,.doc,.docx" onchange="previewCVFile(this)">
                    <button type="button" class="bg-white/10 hover:bg-white/20 px-4 py-2 rounded-lg text-xs font-bold transition-all cursor-pointer">Ganti PDF</button>
                </div>
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-2">URL Download Langsung</label>
                    <input id="cv-url-input" class="w-full input-glass rounded-lg px-4 py-3 text-sm font-mono" type="text" value="https://obsidian.tech/files/cv-latest.pdf">
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
<style>
    .input-glass {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #e5e2e1;
        transition: all 0.2s ease-in-out;
    }

    .input-glass:focus {
        border-color: #c0c1ff;
        background: rgba(192, 193, 255, 0.05);
        outline: none;
        box-shadow: 0 0 0 1px #c0c1ff;
    }

    /* Animation for table rows and skill cards */
    .slide-in-new {
        animation: slideIn 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Toast styles */
    .toast-success {
        background: rgba(20, 20, 20, 0.85);
        backdrop-filter: blur(12px);
        border-left: 4px solid #c0c1ff;
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.5), inset 0 0 10px rgba(255, 255, 255, 0.02);
    }
</style>

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
        // Collect Tagline & Biography
        const tagline = document.getElementById('tagline-input').value;
        const biography = document.getElementById('biography-input').value;

        showToast('Profil dan Biografi berhasil disimpan!');
    }

    // Profile photo preview handler
    function previewProfileImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profile-preview').src = e.target.result;
                showToast('Foto profil terpilih. Klik Simpan untuk memperbarui permanen.');
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

            // Format current date
            const today = new Date();
            const options = {
                day: 'numeric',
                month: 'short',
                year: 'numeric'
            };
            const formattedDate = today.toLocaleDateString('id-ID', options);
            document.getElementById('cv-date-label').innerText = 'Terakhir diperbarui: ' + formattedDate;

            showToast('File CV terpilih: ' + filename);
        }
    }

    // Dynamic label for technical skill levels
    function updateLevelLabel(slider, labelId) {
        document.getElementById(labelId).innerText = slider.value + '%';
    }

    // Delete skill card
    function deleteSkill(cardId) {
        const card = document.getElementById(cardId);
        if (card) {
            card.classList.add('opacity-0', 'scale-90');
            card.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
            setTimeout(() => {
                card.remove();
                showToast('Keahlian berhasil dihapus.');
            }, 300);
        }
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

        const grid = document.getElementById('skills-grid');
        const id = 'skill-card-' + Date.now();

        const card = document.createElement('div');
        card.className = 'glass-card p-4 rounded-2xl flex flex-col gap-3 group/card transition duration-300 hover:border-primary/40 slide-in-new';
        card.id = id;

        card.innerHTML = `
            <div class="flex justify-between items-center">
                <div class="w-8 h-8 rounded-lg bg-primary/20 flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-lg">${icon}</span>
                </div>
                <button type="button" onclick="deleteSkill('${id}')" class="text-on-surface-variant hover:text-error transition-colors cursor-pointer active:scale-90" title="Hapus Skill">
                    <span class="material-symbols-outlined text-lg">delete</span>
                </button>
            </div>
            <input class="bg-transparent border-none p-0 focus:ring-0 font-bold text-sm text-on-surface focus:outline-none" type="text" value="${name}">
            <div>
                <div class="flex justify-between text-[10px] uppercase font-bold text-on-surface-variant mb-1">
                    <span>Level</span>
                    <span id="level-label-${id}">${level}%</span>
                </div>
                <input class="w-full h-1 bg-white/10 rounded-full appearance-none cursor-pointer accent-primary" type="range" min="0" max="100" value="${level}" oninput="updateLevelLabel(this, 'level-label-${id}')">
            </div>
        `;

        grid.appendChild(card);
        closeModal();
        showToast('Keahlian baru berhasil ditambahkan.');
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

        const row = document.getElementById(rowId);
        const currentPeriode = row.querySelector('.career-periode').innerText;
        const currentPosisi = row.querySelector('.career-posisi').innerText;
        const currentPerusahaan = row.querySelector('.career-perusahaan').innerText;

        document.getElementById('input-career-periode').value = currentPeriode;
        document.getElementById('input-career-posisi').value = currentPosisi;
        document.getElementById('input-career-perusahaan').value = currentPerusahaan;

        editingCareerRowId = rowId;
        document.getElementById('modal-submit-btn').onclick = submitCareerForm;

        openModal();
    }

    function submitCareerForm() {
        const periode = document.getElementById('input-career-periode').value.trim();
        const posisi = document.getElementById('input-career-posisi').value.trim();
        const perusahaan = document.getElementById('input-career-perusahaan').value.trim();

        if (!periode || !posisi || !perusahaan) {
            showToast('Semua input riwayat karir wajib diisi!', 'error');
            return;
        }

        if (editingCareerRowId) {
            // Edit existing row
            const row = document.getElementById(editingCareerRowId);
            row.querySelector('.career-periode').innerText = periode;
            row.querySelector('.career-posisi').innerText = posisi;
            row.querySelector('.career-perusahaan').innerText = perusahaan;
            showToast('Riwayat karir berhasil diperbarui.');
        } else {
            // Create new row
            const tbody = document.getElementById('career-tbody');
            const id = 'career-row-' + Date.now();

            const newRow = document.createElement('tr');
            newRow.className = 'hover:bg-white/5 transition-colors duration-200 slide-in-new';
            newRow.id = id;

            newRow.innerHTML = `
                <td class="px-6 py-4 text-sm text-on-surface-variant career-periode">${periode}</td>
                <td class="px-6 py-4 text-sm font-bold text-on-surface career-posisi">${posisi}</td>
                <td class="px-6 py-4 text-sm text-on-surface-variant career-perusahaan">${perusahaan}</td>
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="editCareer('${id}')" class="p-2 rounded-lg hover:bg-white/5 text-on-surface-variant hover:text-primary transition-all cursor-pointer" title="Edit Riwayat">
                            <span class="material-symbols-outlined text-lg">edit</span>
                        </button>
                        <button type="button" onclick="deleteCareer('${id}')" class="p-2 rounded-lg hover:bg-error/10 text-on-surface-variant hover:text-error transition-all cursor-pointer" title="Hapus Riwayat">
                            <span class="material-symbols-outlined text-lg">delete</span>
                        </button>
                    </div>
                </td>
            `;
            tbody.appendChild(newRow);
            showToast('Riwayat karir baru berhasil ditambahkan.');
        }

        closeModal();
    }

    // Delete career row
    function deleteCareer(rowId) {
        const row = document.getElementById(rowId);
        if (row) {
            row.classList.add('opacity-0');
            row.style.transform = 'scaleY(0.9)';
            row.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
            setTimeout(() => {
                row.remove();
                showToast('Riwayat karir berhasil dihapus.');
            }, 300);
        }
    }
</script>

<?= view('admin/layouts/footer') ?>