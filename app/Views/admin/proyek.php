<?= view('admin/layouts/header', ['activePage' => 'proyek', 'pageTitle' => 'Manajemen Proyek']) ?>
<?= view('admin/layouts/sidebar', ['activePage' => 'proyek', 'pageTitle' => 'Manajemen Proyek']) ?>

<!-- MAIN CONTENT -->
<main class="ml-64 mt-16 p-8 lg:p-12 relative z-10 space-y-12">
    <!-- Hero Section / Header -->
    <section class="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <h2 class="font-headline-lg text-headline-lg text-on-surface">Manajemen Proyek</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant mt-2 max-w-2xl">Kelola etalase karya digital Anda. Pantau performa, perbarui konten, dan publikasikan inovasi terbaru ke portofolio global.</p>
        </div>
        <button class="primary-button flex items-center gap-2 px-6 py-3 rounded-xl font-label-md text-label-md whitespace-nowrap">
            <span class="material-symbols-outlined text-xl">add</span>
            Tambah Proyek Baru
        </button>
    </section>

    <!-- Stats Overview -->
    <section class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="glass-card p-6 rounded-2xl">
            <p class="text-on-surface-variant text-xs uppercase tracking-widest font-semibold">Total Proyek</p>
            <h3 class="text-4xl font-black text-primary mt-2">24</h3>
            <p class="text-xs text-on-surface-variant/60 mt-1">+3 bulan ini</p>
        </div>
        <div class="glass-card p-6 rounded-2xl">
            <p class="text-on-surface-variant text-xs uppercase tracking-widest font-semibold">Published</p>
            <h3 class="text-4xl font-black text-on-surface mt-2">18</h3>
            <div class="w-full bg-surface-container-highest h-1.5 rounded-full mt-4 overflow-hidden">
                <div class="bg-primary h-full w-[75%]"></div>
            </div>
        </div>
        <div class="glass-card p-6 rounded-2xl">
            <p class="text-on-surface-variant text-xs uppercase tracking-widest font-semibold">Draft</p>
            <h3 class="text-4xl font-black text-on-surface mt-2">6</h3>
            <p class="text-xs text-on-surface-variant/60 mt-1">Perlu review</p>
        </div>
        <div class="glass-card p-6 rounded-2xl border-primary/20 bg-primary/5">
            <p class="text-primary text-xs uppercase tracking-widest font-semibold">Views Bulan Ini</p>
            <h3 class="text-4xl font-black text-primary mt-2">1.2k</h3>
            <p class="text-xs text-primary/60 mt-1">↑ 12% vs lalu</p>
        </div>
    </section>

    <!-- Projects Data Table -->
    <section class="glass-card rounded-2xl overflow-hidden">
        <div class="p-6 border-b border-white/5 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-4">
                <h4 class="font-headline-md text-sm font-bold text-on-surface">Daftar Proyek</h4>
                <div class="flex gap-2">
                    <span class="bg-primary/10 text-primary text-[10px] px-2 py-0.5 rounded-full border border-primary/20 cursor-pointer">All</span>
                    <span class="text-on-surface-variant/50 text-[10px] px-2 py-0.5 rounded-full border border-white/5 hover:border-white/20 cursor-pointer transition-colors">Web</span>
                    <span class="text-on-surface-variant/50 text-[10px] px-2 py-0.5 rounded-full border border-white/5 hover:border-white/20 cursor-pointer transition-colors">Mobile</span>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button class="p-2 text-on-surface-variant hover:text-on-surface transition-colors">
                    <span class="material-symbols-outlined">filter_list</span>
                </button>
                <button class="p-2 text-on-surface-variant hover:text-on-surface transition-colors">
                    <span class="material-symbols-outlined">sort</span>
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-highest/30">
                        <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant/70 uppercase tracking-tighter text-[11px]">Judul Proyek</th>
                        <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant/70 uppercase tracking-tighter text-[11px]">Kategori</th>
                        <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant/70 uppercase tracking-tighter text-[11px]">Status</th>
                        <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant/70 uppercase tracking-tighter text-[11px]">Tanggal Dibuat</th>
                        <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant/70 uppercase tracking-tighter text-[11px] text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    <!-- Row 1 -->
                    <tr class="table-row-hover transition-colors">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-lg overflow-hidden bg-surface-container border border-white/10 shrink-0">
                                    <img class="w-full h-full object-cover" alt="Stellar Dashboard" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDjQbMxhESm5wX9RGa8eH67iPM1-jR_tS3YMQCdww0AwrzT-BXuo_5G8jZmvDoNmzS501JmfDFeifUvqwqmKrfHO_TORjdlbrQCHv7GYTkqofFDxT7fo-fTaYYtmki5VRt5buiFncUM_F3cwmUq1ti10h8Zh4u2Fln5VzPHQDL2-nXyybD9k53Lli3o8Eu9xFH0K6uDM_wsWcsaY4U2Rpplchw_X_xbhTJNCFZV1UQbOJKMglmKJqgHBzCtM7VeGWOtskkllglZIQs">
                                </div>
                                <div>
                                    <p class="font-bold text-on-surface">Stellar Dashboard</p>
                                    <p class="text-xs text-on-surface-variant/60">stellar-v2.github.io</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <span class="bg-secondary/10 text-on-secondary-container text-xs px-3 py-1 rounded-full border border-secondary/20">Web Dev</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]"></span>
                                <span class="text-xs font-medium text-on-surface">Published</span>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-sm text-on-surface-variant">12 Okt 2023</td>
                        <td class="px-6 py-5 text-right">
                            <div class="flex justify-end gap-2">
                                <button class="p-2 rounded-lg hover:bg-white/5 text-on-surface-variant hover:text-primary transition-all active:scale-90" title="Edit">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                </button>
                                <button class="p-2 rounded-lg hover:bg-error/10 text-on-surface-variant hover:text-error transition-all active:scale-90" title="Delete">
                                    <span class="material-symbols-outlined text-lg">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr class="table-row-hover transition-colors">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-lg overflow-hidden bg-surface-container border border-white/10 shrink-0">
                                    <img class="w-full h-full object-cover" alt="Nexus Mobile App" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD2CdVU2mgo0c8UCjQoqRF02di8-fFxtpgaahPBEPyT7VI82e44a8-5OYN-ojds_v7hqnjK9vVEnycg8OH5CKV4XLHl5Q29TGXjhn9yADfmmXyFoBG3esdggrCbgpwTJwC2YKtoG4oMFzMZ_P3xMrgzOJKHeC7uMQxbEXa5nJ6pPBsrGmiO5qebJY4ZqjATJ_Rib5n1eDbiKyEa0VKXv_fSJr_nxR1UJFwtAGQfQEGOAW2Z6lMuLdTbA7wj53Vbaep06Xh4tyvxF3w">
                                </div>
                                <div>
                                    <p class="font-bold text-on-surface">Nexus Mobile App</p>
                                    <p class="text-xs text-on-surface-variant/60">v1.4.0 (Alpha)</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <span class="bg-tertiary/10 text-tertiary text-xs px-3 py-1 rounded-full border border-tertiary/20">Mobile</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-amber-500 shadow-[0_0_8px_rgba(245,158,11,0.5)]"></span>
                                <span class="text-xs font-medium text-on-surface">Draft</span>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-sm text-on-surface-variant">05 Nov 2023</td>
                        <td class="px-6 py-5 text-right">
                            <div class="flex justify-end gap-2">
                                <button class="p-2 rounded-lg hover:bg-white/5 text-on-surface-variant hover:text-primary transition-all active:scale-90" title="Edit">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                </button>
                                <button class="p-2 rounded-lg hover:bg-error/10 text-on-surface-variant hover:text-error transition-all active:scale-90" title="Delete">
                                    <span class="material-symbols-outlined text-lg">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr class="table-row-hover transition-colors">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-lg overflow-hidden bg-surface-container border border-white/10 shrink-0">
                                    <img class="w-full h-full object-cover" alt="Lumina Design System" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD3OcaxBwoqHKm5WpxrJ5LPZCdYA0rv3gvYzcQePdynjIuFOTDzciBSdJik1z7EUexZ5TWcVHnCSr2NAe-ly87I38G9Q8GMVs6_jnVfa93CKeVj_HoztzYdwA9ggQ_GiwD1BTOrbPT1369lx4zXTvzIm_oTtVhGvhYYkcYTsp_Erpk2ryylT5BfPaUmVEbGbz_Za0VrGkp4O87PNas5Z6EIYtnO2wQ65OfSNsX4WpHRBqdWqlWfka2akKS8CLzlLUA_CTWqbrto2QQ">
                                </div>
                                <div>
                                    <p class="font-bold text-on-surface">Lumina Design System</p>
                                    <p class="text-xs text-on-surface-variant/60">Component Library</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <span class="bg-primary/10 text-primary text-xs px-3 py-1 rounded-full border border-primary/20">UI/UX</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]"></span>
                                <span class="text-xs font-medium text-on-surface">Published</span>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-sm text-on-surface-variant">28 Okt 2023</td>
                        <td class="px-6 py-5 text-right">
                            <div class="flex justify-end gap-2">
                                <button class="p-2 rounded-lg hover:bg-white/5 text-on-surface-variant hover:text-primary transition-all active:scale-90" title="Edit">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                </button>
                                <button class="p-2 rounded-lg hover:bg-error/10 text-on-surface-variant hover:text-error transition-all active:scale-90" title="Delete">
                                    <span class="material-symbols-outlined text-lg">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr class="table-row-hover transition-colors">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-lg overflow-hidden bg-surface-container border border-white/10 shrink-0">
                                    <img class="w-full h-full object-cover" alt="CryptoPulse API" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCkX5BvNmt6GGObER4uUWfmMB9-q4n4kZokfD18gUFYof2pgYM78E8CYYZlhXGYZrgDaysfvhAyYapLC8lLHdHwuLnaqdtZ5d2eB5fUPtUNx8bCm5Bf2_uD9DFxFzU63vDetNoxqfLuGnWD63a-kC-3D3kQGmoNhfoSQGrMyQ0apoMTfRuNMMJjVfdb_bcc60ftKO0_qXiX_kOOXRnAVvjM2feVg6hxznrQ8GcqE2K24v1qT27gaP7PbogHa6_hQJoqRNy0ymIlkrQ">
                                </div>
                                <div>
                                    <p class="font-bold text-on-surface">CryptoPulse API</p>
                                    <p class="text-xs text-on-surface-variant/60">Middleware Service</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <span class="bg-secondary/10 text-on-secondary-container text-xs px-3 py-1 rounded-full border border-secondary/20">Web Dev</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]"></span>
                                <span class="text-xs font-medium text-on-surface">Published</span>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-sm text-on-surface-variant">15 Nov 2023</td>
                        <td class="px-6 py-5 text-right">
                            <div class="flex justify-end gap-2">
                                <button class="p-2 rounded-lg hover:bg-white/5 text-on-surface-variant hover:text-primary transition-all active:scale-90" title="Edit">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                </button>
                                <button class="p-2 rounded-lg hover:bg-error/10 text-on-surface-variant hover:text-error transition-all active:scale-90" title="Delete">
                                    <span class="material-symbols-outlined text-lg">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t border-white/5 flex items-center justify-between">
            <p class="text-xs text-on-surface-variant">Menampilkan 1-4 dari 24 proyek</p>
            <div class="flex gap-2">
                <button class="p-2 rounded-lg border border-white/5 text-on-surface-variant hover:bg-white/5 transition-colors disabled:opacity-30" disabled>
                    <span class="material-symbols-outlined text-sm">chevron_left</span>
                </button>
                <button class="w-8 h-8 rounded-lg bg-primary/10 text-primary border border-primary/20 text-xs font-bold">1</button>
                <button class="w-8 h-8 rounded-lg hover:bg-white/5 text-on-surface-variant text-xs font-bold transition-colors">2</button>
                <button class="w-8 h-8 rounded-lg hover:bg-white/5 text-on-surface-variant text-xs font-bold transition-colors">3</button>
                <button class="p-2 rounded-lg border border-white/5 text-on-surface-variant hover:bg-white/5 transition-colors">
                    <span class="material-symbols-outlined text-sm">chevron_right</span>
                </button>
            </div>
        </div>
    </section>
</main>

<!-- Floating Atmosphere Elements -->
<div class="fixed top-[-10%] right-[-5%] w-[400px] h-[400px] bg-primary/5 blur-[120px] rounded-full pointer-events-none"></div>
<div class="fixed bottom-[-10%] left-[-5%] w-[300px] h-[300px] bg-secondary/5 blur-[100px] rounded-full pointer-events-none"></div>

<style>
    .primary-button {
        background-color: #6366F1;
        color: white;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .primary-button:hover {
        box-shadow: 0 0 20px rgba(99, 102, 241, 0.4);
        transform: translateY(-1px);
    }

    .primary-button:active {
        transform: scale(0.95);
    }

    .table-row-hover:hover {
        background-color: rgba(192, 193, 255, 0.04);
    }
</style>

<script>
    // Micro-interactions for table rows
    document.querySelectorAll('.table-row-hover').forEach(row => {
        row.addEventListener('mouseenter', () => {
            row.style.transform = 'translateX(4px)';
            row.style.transition = 'transform 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
        });
        row.addEventListener('mouseleave', () => {
            row.style.transform = 'translateX(0)';
        });
    });
</script>

<?= view('admin/layouts/footer') ?>