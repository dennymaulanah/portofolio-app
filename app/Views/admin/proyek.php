<?= view('admin/layouts/header', ['activePage' => 'proyek', 'pageTitle' => 'Manajemen Proyek']) ?>
<?= view('admin/layouts/sidebar', ['activePage' => 'proyek', 'pageTitle' => 'Manajemen Proyek']) ?>

<!-- MAIN CONTENT -->
<main class="ml-0 md:ml-64 mt-16 p-4 md:p-8 lg:p-12 relative z-10 space-y-8 md:space-y-12">
    <!-- Hero Section / Header -->
    <section class="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <h2 class="font-headline-lg text-headline-lg text-on-surface">Manajemen Proyek</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant mt-2 max-w-2xl">Kelola etalase karya digital Anda. Pantau performa, perbarui konten, dan publikasikan inovasi terbaru ke portofolio global.</p>
        </div>
        <a href="<?= base_url('/admin/proyek/tambah') ?>" class="primary-button flex items-center gap-2 px-6 py-3 rounded-xl font-label-md text-label-md whitespace-nowrap no-underline">
            <span class="material-symbols-outlined text-xl">add</span>
            Tambah Proyek Baru
        </a>
    </section>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="glass-card p-4 rounded-xl border-l-4 border-emerald-500 bg-emerald-500/5 flash-message">
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-emerald-400">check_circle</span>
                <p class="text-sm text-emerald-300 font-medium"><?= session()->getFlashdata('success') ?></p>
            </div>
        </div>
    <?php endif; ?>

    <!-- Stats Overview -->
    <section class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="glass-card p-6 rounded-2xl">
            <p class="text-on-surface-variant text-xs uppercase tracking-widest font-semibold">Total Proyek</p>
            <h3 class="text-4xl font-black text-primary mt-2"><?= $totalProyek ?></h3>
        </div>
        <div class="glass-card p-6 rounded-2xl">
            <p class="text-on-surface-variant text-xs uppercase tracking-widest font-semibold">Published</p>
            <h3 class="text-4xl font-black text-on-surface mt-2"><?= $totalPublished ?></h3>
            <?php if ($totalProyek > 0): ?>
            <div class="w-full bg-surface-container-highest h-1.5 rounded-full mt-4 overflow-hidden">
                <div class="bg-primary h-full transition-all duration-500" style="width: <?= round(($totalPublished / $totalProyek) * 100) ?>%"></div>
            </div>
            <?php endif; ?>
        </div>
        <div class="glass-card p-6 rounded-2xl">
            <p class="text-on-surface-variant text-xs uppercase tracking-widest font-semibold">Draft</p>
            <h3 class="text-4xl font-black text-on-surface mt-2"><?= $totalDraft ?></h3>
            <p class="text-xs text-on-surface-variant/60 mt-1">Perlu review</p>
        </div>
        <div class="glass-card p-6 rounded-2xl border-primary/20 bg-primary/5">
            <p class="text-primary text-xs uppercase tracking-widest font-semibold">Kategori Aktif</p>
            <?php
                $categories = [];
                foreach ($proyeks as $p) {
                    if (!in_array($p['kategori'], $categories)) {
                        $categories[] = $p['kategori'];
                    }
                }
            ?>
            <h3 class="text-4xl font-black text-primary mt-2"><?= count($categories) ?></h3>
            <p class="text-xs text-primary/60 mt-1"><?= implode(', ', array_slice($categories, 0, 3)) ?></p>
        </div>
    </section>

    <!-- Projects Data Table -->
    <section class="glass-card rounded-2xl overflow-hidden">
        <div class="p-6 border-b border-white/5 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-4">
                <h4 class="font-headline-md text-sm font-bold text-on-surface">Daftar Proyek</h4>
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
                    <?php if (empty($proyeks)): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center gap-4">
                                    <div class="w-16 h-16 rounded-2xl bg-surface-container-high border border-white/10 flex items-center justify-center">
                                        <span class="material-symbols-outlined text-3xl text-on-surface-variant/30">folder_off</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-on-surface-variant/50">Belum ada proyek</p>
                                        <p class="text-xs text-on-surface-variant/30 mt-1">Mulai dengan menambahkan proyek pertama Anda</p>
                                    </div>
                                    <a href="<?= base_url('/admin/proyek/tambah') ?>" class="primary-button flex items-center gap-2 px-5 py-2.5 rounded-xl font-label-md text-label-md text-sm no-underline mt-2">
                                        <span class="material-symbols-outlined text-lg">add</span>
                                        Tambah Proyek
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($proyeks as $proyek): ?>
                            <tr class="table-row-hover transition-colors">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-lg overflow-hidden bg-surface-container border border-white/10 shrink-0">
                                            <?php if (!empty($proyek['thumbnail'])): ?>
                                                <img class="w-full h-full object-cover" alt="<?= esc($proyek['judul']) ?>" src="<?= base_url('uploads/proyek/' . $proyek['thumbnail']['nama_file']) ?>">
                                            <?php else: ?>
                                                <div class="w-full h-full flex items-center justify-center bg-surface-container-high">
                                                    <span class="material-symbols-outlined text-on-surface-variant/30 text-lg">image</span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <p class="font-bold text-on-surface"><?= esc($proyek['judul']) ?></p>
                                            <?php if (!empty($proyek['teknologi'])): ?>
                                                <div class="flex flex-wrap gap-1 mt-1">
                                                    <?php foreach (array_slice(explode(',', $proyek['teknologi']), 0, 3) as $tech): ?>
                                                        <span class="text-[10px] px-1.5 py-0.5 rounded bg-primary/10 text-primary/70 border border-primary/10"><?= esc(trim($tech)) ?></span>
                                                    <?php endforeach; ?>
                                                    <?php if (count(explode(',', $proyek['teknologi'])) > 3): ?>
                                                        <span class="text-[10px] px-1.5 py-0.5 rounded bg-white/5 text-on-surface-variant/50">+<?= count(explode(',', $proyek['teknologi'])) - 3 ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            <?php elseif (!empty($proyek['deskripsi'])): ?>
                                                <p class="text-xs text-on-surface-variant/60 truncate max-w-[200px]"><?= esc(mb_substr($proyek['deskripsi'], 0, 50)) ?><?= mb_strlen($proyek['deskripsi']) > 50 ? '...' : '' ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <?php
                                        $kategoriColors = [
                                            'Web Dev' => 'bg-secondary/10 text-on-secondary-container border-secondary/20',
                                            'Mobile'  => 'bg-tertiary/10 text-tertiary border-tertiary/20',
                                            'UI/UX'   => 'bg-primary/10 text-primary border-primary/20',
                                            'Desktop' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20',
                                            'API'     => 'bg-violet-500/10 text-violet-400 border-violet-500/20',
                                        ];
                                        $colorClass = $kategoriColors[$proyek['kategori']] ?? 'bg-white/5 text-on-surface-variant border-white/10';
                                    ?>
                                    <span class="<?= $colorClass ?> text-xs px-3 py-1 rounded-full border"><?= esc($proyek['kategori']) ?></span>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-2">
                                        <?php if ($proyek['status'] === 'published'): ?>
                                            <span class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]"></span>
                                            <span class="text-xs font-medium text-on-surface">Published</span>
                                        <?php else: ?>
                                            <span class="w-2 h-2 rounded-full bg-amber-500 shadow-[0_0_8px_rgba(245,158,11,0.5)]"></span>
                                            <span class="text-xs font-medium text-on-surface">Draft</span>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="px-6 py-5 text-sm text-on-surface-variant">
                                    <?= date('d M Y', strtotime($proyek['created_at'])) ?>
                                </td>
                                <td class="px-6 py-5 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="<?= base_url('/admin/proyek/edit/' . $proyek['id']) ?>" class="p-2 rounded-lg hover:bg-white/5 text-on-surface-variant hover:text-primary transition-all active:scale-90" title="Edit">
                                            <span class="material-symbols-outlined text-lg">edit</span>
                                        </a>
                                        <button onclick="openDeleteModal(<?= $proyek['id'] ?>, '<?= esc(addslashes($proyek['judul'])) ?>')" class="p-2 rounded-lg hover:bg-error/10 text-on-surface-variant hover:text-error transition-all active:scale-90" title="Delete">
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

        <?php if (!empty($proyeks)): ?>
        <!-- Pagination Info -->
        <div class="p-4 border-t border-white/5 flex items-center justify-between">
            <p class="text-xs text-on-surface-variant">Menampilkan <?= count($proyeks) ?> proyek</p>
        </div>
        <?php endif; ?>
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

    .flash-message {
        animation: slideInDown 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 z-[100] hidden">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeDeleteModal()"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-md">
        <div class="glass-card rounded-2xl p-8 border border-white/10 shadow-2xl mx-4" style="animation: fadeInUp 0.3s ease">
            <div class="flex flex-col items-center text-center gap-4">
                <div class="w-16 h-16 rounded-2xl bg-red-500/10 border border-red-500/20 flex items-center justify-center">
                    <span class="material-symbols-outlined text-3xl text-red-400">warning</span>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-on-surface">Hapus Proyek?</h3>
                    <p class="text-sm text-on-surface-variant/60 mt-2">Anda akan menghapus proyek "<strong id="deleteProyekName" class="text-on-surface"></strong>". Semua foto terkait juga akan dihapus. Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <form id="deleteForm" method="POST" class="w-full flex gap-3 mt-2">
                    <?= csrf_field() ?>
                    <button type="button" onclick="closeDeleteModal()" class="flex-1 px-4 py-3 rounded-xl border border-white/10 text-on-surface-variant hover:bg-white/5 transition-all font-medium text-sm">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 px-4 py-3 rounded-xl bg-red-500 hover:bg-red-600 text-white transition-all font-medium text-sm active:scale-95">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

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

    // Auto-dismiss flash message
    const flashMsg = document.querySelector('.flash-message');
    if (flashMsg) {
        setTimeout(() => {
            flashMsg.style.transition = 'all 0.4s ease';
            flashMsg.style.opacity = '0';
            flashMsg.style.transform = 'translateY(-10px)';
            setTimeout(() => flashMsg.remove(), 400);
        }, 4000);
    }

    // Delete modal
    function openDeleteModal(id, name) {
        document.getElementById('deleteProyekName').textContent = name;
        document.getElementById('deleteForm').action = '<?= base_url('/admin/proyek/hapus/') ?>' + '/' + id;
        document.getElementById('deleteModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        document.body.style.overflow = '';
    }

    // Close modal on Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeDeleteModal();
    });
</script>

<?= view('admin/layouts/footer') ?>