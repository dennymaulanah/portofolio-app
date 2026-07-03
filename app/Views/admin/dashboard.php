<?= view('admin/layouts/header', ['activePage' => 'ringkasan', 'pageTitle' => 'Ringkasan']) ?>
<?= view('admin/layouts/sidebar', ['activePage' => 'ringkasan', 'pageTitle' => 'Ringkasan']) ?>

<!-- MAIN CONTENT -->
<main class="ml-0 md:ml-64 mt-16 p-4 md:p-8 relative z-10">
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
            </div>
            <div>
                <p class="text-on-surface-variant font-label-md uppercase tracking-tighter opacity-70">Total Proyek</p>
                <h3 class="font-headline-md text-headline-md"><?= esc($totalProyek) ?></h3>
            </div>
        </div>

        <!-- Proyek Rilis -->
        <div class="glass-card p-6 rounded-2xl flex flex-col gap-4 relative overflow-hidden group">
            <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:scale-110 transition-transform duration-500">
                <span class="material-symbols-outlined text-9xl">publish</span>
            </div>
            <div class="flex justify-between items-start">
                <div class="p-3 bg-secondary/10 rounded-xl">
                    <span class="material-symbols-outlined text-secondary">publish</span>
                </div>
            </div>
            <div>
                <p class="text-on-surface-variant font-label-md uppercase tracking-tighter opacity-70">Proyek Rilis (Published)</p>
                <h3 class="font-headline-md text-headline-md"><?= esc($totalPublished) ?></h3>
            </div>
        </div>

        <!-- Proyek Draf -->
        <div class="glass-card p-6 rounded-2xl flex flex-col gap-4 relative overflow-hidden group">
            <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:scale-110 transition-transform duration-500">
                <span class="material-symbols-outlined text-9xl">description</span>
            </div>
            <div class="flex justify-between items-start">
                <div class="p-3 bg-tertiary/10 rounded-xl">
                    <span class="material-symbols-outlined text-tertiary">description</span>
                </div>
            </div>
            <div>
                <p class="text-on-surface-variant font-label-md uppercase tracking-tighter opacity-70">Proyek Draf (Draft)</p>
                <h3 class="font-headline-md text-headline-md"><?= esc($totalDraft) ?></h3>
            </div>
        </div>
    </div>

    <!-- Proyek Terbaru -->
    <div class="grid grid-cols-1 gap-6">
        <div class="glass-card rounded-2xl p-6">
            <h3 class="font-headline-md text-[24px] font-bold text-on-surface mb-6">Proyek Terbaru</h3>

            <div class="space-y-4">
                <?php if (empty($latestProyeks)): ?>
                    <p class="text-on-surface-variant/50 text-sm py-4 text-center">Belum ada proyek yang ditambahkan.</p>
                <?php else: ?>
                    <?php foreach ($latestProyeks as $p): ?>
                        <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-white/[0.03] transition-colors group">
                            <!-- Thumbnail -->
                            <?php if (!empty($p['thumbnail'])): ?>
                                <img class="w-14 h-14 rounded-xl object-cover shrink-0" alt="<?= esc($p['judul']) ?>" src="<?= base_url('uploads/proyek/' . $p['thumbnail']['nama_file']) ?>">
                            <?php else: ?>
                                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-primary/30 to-secondary/20 flex items-center justify-center shrink-0">
                                    <span class="material-symbols-outlined text-primary">folder_special</span>
                                </div>
                            <?php endif; ?>
                            
                            <div class="flex-1 min-w-0">
                                <p class="text-on-surface font-medium text-sm truncate"><?= esc($p['judul']) ?></p>
                                <div class="flex items-center gap-3 mt-1 text-xs text-on-surface-variant opacity-60">
                                    <span class="bg-white/5 px-2 py-0.5 rounded border border-white/5 text-[10px] uppercase font-semibold text-primary"><?= esc($p['kategori']) ?></span>
                                    <span>
                                        <?php if ($p['status'] === 'published'): ?>
                                            <span class="text-green-400 font-medium">Rilis</span>
                                        <?php else: ?>
                                            <span class="text-yellow-400 font-medium">Draf</span>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                            <a href="<?= base_url('/admin/proyek/edit/' . $p['id']) ?>" class="text-on-surface-variant hover:text-primary opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center p-1.5 hover:bg-white/5 rounded-lg" title="Edit Proyek">
                                <span class="material-symbols-outlined text-lg">edit</span>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <a href="<?= base_url('/admin/proyek') ?>" class="block mt-6 text-center text-on-surface-variant font-label-md text-label-md border border-white/10 rounded-xl py-3 hover:bg-white/5 hover:border-primary/30 transition-all no-underline">
                Kelola Semua Proyek
            </a>
        </div>
    </div>
</main>

<?= view('admin/layouts/footer') ?>