<?= view('admin/layouts/header', ['activePage' => 'ringkasan', 'pageTitle' => 'Ringkasan']) ?>
<?= view('admin/layouts/sidebar', ['activePage' => 'ringkasan', 'pageTitle' => 'Ringkasan']) ?>

<!-- MAIN CONTENT -->
<main class="ml-64 mt-16 p-8 relative z-10">
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <!-- Total Proyek -->
        <div class="glass-card p-6 rounded-2xl flex flex-col gap-4 relative overflow-hidden group">
            <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:scale-110 transition-transform duration-500">
                <span class="material-symbols-outlined text-9xl">folder_special</span>
            </div>
            <div class="flex justify-between items-start">
                <div class="p-3 bg-primary/10 rounded-xl">
                    <span class="material-symbols-outlined text-primary">folder_special</span>
                </div>
                <span class="text-green-400 text-xs font-bold">+12%</span>
            </div>
            <div>
                <p class="text-on-surface-variant font-label-md uppercase tracking-tighter opacity-70">Total Proyek</p>
                <h3 class="font-headline-md text-headline-md">24</h3>
            </div>
        </div>

        <!-- Total Pesan -->
        <div class="glass-card p-6 rounded-2xl flex flex-col gap-4 relative overflow-hidden group">
            <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:scale-110 transition-transform duration-500">
                <span class="material-symbols-outlined text-9xl">chat</span>
            </div>
            <div class="flex justify-between items-start">
                <div class="p-3 bg-tertiary/10 rounded-xl">
                    <span class="material-symbols-outlined text-tertiary">chat</span>
                </div>
                <span class="text-primary text-xs font-bold">Baru</span>
            </div>
            <div>
                <p class="text-on-surface-variant font-label-md uppercase tracking-tighter opacity-70">Total Pesan Masuk</p>
                <h3 class="font-headline-md text-headline-md">156</h3>
            </div>
        </div>

        <!-- Pengunjung -->
        <div class="glass-card p-6 rounded-2xl flex flex-col gap-4 relative overflow-hidden group">
            <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:scale-110 transition-transform duration-500">
                <span class="material-symbols-outlined text-9xl">visibility</span>
            </div>
            <div class="flex justify-between items-start">
                <div class="p-3 bg-secondary/10 rounded-xl">
                    <span class="material-symbols-outlined text-secondary">visibility</span>
                </div>
                <span class="text-green-400 text-xs font-bold">+28%</span>
            </div>
            <div>
                <p class="text-on-surface-variant font-label-md uppercase tracking-tighter opacity-70">Pengunjung Bulan Ini</p>
                <h3 class="font-headline-md text-headline-md">1,204</h3>
            </div>
        </div>
    </div>

    <!-- Proyek Terpopuler -->
    <div class="grid grid-cols-1 gap-6">
        <!-- Proyek Terpopuler -->
        <div class="glass-card rounded-2xl p-6">
            <h3 class="font-headline-md text-[24px] font-bold text-on-surface mb-6">Proyek Terpopuler</h3>

            <div class="space-y-4">
                <!-- Project 1 -->
                <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-white/[0.03] transition-colors group">
                    <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-primary/30 to-secondary/20 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-primary">dashboard</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-on-surface font-medium text-sm truncate">Nexus AI Dashb...</p>
                        <div class="flex items-center gap-3 mt-1 text-xs text-on-surface-variant opacity-60">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">visibility</span> 4.2k
                            </span>
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">favorite</span> 210
                            </span>
                        </div>
                    </div>
                    <span class="material-symbols-outlined text-on-surface-variant opacity-0 group-hover:opacity-100 transition-opacity">trending_up</span>
                </div>

                <!-- Project 2 -->
                <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-white/[0.03] transition-colors group">
                    <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-tertiary/30 to-tertiary-container/20 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-tertiary">currency_bitcoin</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-on-surface font-medium text-sm truncate">CryptoTrack Eng...</p>
                        <div class="flex items-center gap-3 mt-1 text-xs text-on-surface-variant opacity-60">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">visibility</span> 2.8k
                            </span>
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">favorite</span> 145
                            </span>
                        </div>
                    </div>
                    <span class="material-symbols-outlined text-on-surface-variant opacity-0 group-hover:opacity-100 transition-opacity">trending_up</span>
                </div>

                <!-- Project 3 -->
                <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-white/[0.03] transition-colors group">
                    <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-secondary/30 to-primary/20 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-secondary">smartphone</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-on-surface font-medium text-sm truncate">SmartHome Mob...</p>
                        <div class="flex items-center gap-3 mt-1 text-xs text-on-surface-variant opacity-60">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">visibility</span> 1.9k
                            </span>
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">favorite</span> 89
                            </span>
                        </div>
                    </div>
                    <span class="material-symbols-outlined text-on-surface-variant opacity-0 group-hover:opacity-100 transition-opacity">arrow_forward</span>
                </div>
            </div>

            <a href="#" class="block mt-6 text-center text-on-surface-variant font-label-md text-label-md border border-white/10 rounded-xl py-3 hover:bg-white/5 hover:border-primary/30 transition-all">
                Analitik Lengkap
            </a>
        </div>
    </div>
</main>

<?= view('admin/layouts/footer') ?>