<?= view('layouts/header', ['activePage' => 'beranda']) ?>

<main class="relative overflow-hidden">
    <!-- Background Atmospheric Glows -->
    <div class="absolute top-0 right-0 w-[300px] h-[300px] md:w-[500px] md:h-[500px] bg-primary/10 blur-[120px] -z-10 rounded-full"></div>
    <div class="absolute bottom-0 left-0 w-[250px] h-[250px] md:w-[400px] md:h-[400px] bg-secondary/5 blur-[100px] -z-10 rounded-full"></div>

    <!-- Hero Section -->
    <section class="min-h-[70vh] md:min-h-[80vh] flex flex-col justify-center items-center text-center px-margin-mobile md:px-margin-desktop pt-16 md:pt-20 pb-12 md:pb-32">
        <div class="max-w-4xl space-y-6 md:space-y-8">
            <div class="inline-flex items-center gap-2 px-3 py-1 md:px-4 md:py-1.5 rounded-full bg-primary/10 border border-primary/20 text-primary font-label-md text-[12px] md:text-label-md animate-fade-in">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                </span>
                Tersedia untuk proyek baru
            </div>
            <h1 class="font-display text-[28px] leading-[36px] sm:text-headline-lg-mobile md:text-display text-on-background md:leading-tight">
                Halo, Saya <span class="text-primary italic">AzeriaDev</span> — Membangun Aplikasi Web & Mobile yang Fokus pada Performa.
            </h1>
            <p class="font-body-lg text-[15px] md:text-body-lg text-on-surface-variant max-w-2xl mx-auto leading-relaxed">
                Membantu startup dan korporasi menghadirkan pengalaman digital premium melalui kode yang bersih dan desain yang intuitif.
            </p>
            <div class="flex flex-col sm:flex-row gap-3 md:gap-4 justify-center pt-4 md:pt-8">
                <a class="btn-primary px-6 py-3 md:px-8 md:py-4 rounded-xl font-label-md text-[13px] md:text-label-md text-white flex items-center justify-center gap-3" href="#proyek">
                    Lihat Proyek
                    <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">terminal</span>
                </a>
                <a class="btn-secondary px-6 py-3 md:px-8 md:py-4 rounded-xl font-label-md text-[13px] md:text-label-md text-on-surface flex items-center justify-center gap-3" href="#">
                    Hubungi WhatsApp
                    <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Pilihan Editor Section -->
    <section class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto pt-12 md:pt-24 pb-12 md:pb-24" id="proyek">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-8 md:mb-16 gap-4">
            <div class="space-y-3 md:space-y-4">
                <h2 class="font-display text-[28px] md:text-headline-lg text-on-background leading-tight">Pilihan Editor</h2>
                <p class="font-body-md text-[14px] md:text-body-md text-on-surface-variant max-w-lg">Koleksi karya terpilih yang mendemonstrasikan keahlian teknis dan perhatian terhadap detail.</p>
            </div>
            <div class="flex gap-3 md:gap-4">
                <button class="p-2.5 md:p-3 rounded-full glass-card hover:bg-surface-variant text-on-surface-variant"><span class="material-symbols-outlined text-[20px] md:text-[24px]">chevron_left</span></button>
                <button class="p-2.5 md:p-3 rounded-full glass-card hover:bg-surface-variant text-on-surface-variant"><span class="material-symbols-outlined text-[20px] md:text-[24px]">chevron_right</span></button>
            </div>
        </div>

        <!-- Project Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-gutter">
            <?php if (empty($proyeks)): ?>
                <div class="col-span-1 sm:col-span-2 md:col-span-3 text-center py-12 glass-card rounded-2xl">
                    <span class="material-symbols-outlined text-4xl text-on-surface-variant/30 mb-2">folder_open</span>
                    <p class="text-on-surface-variant text-sm">Belum ada proyek yang dipublikasikan.</p>
                </div>
            <?php else: ?>
                <?php foreach ($proyeks as $proyek): ?>
                    <div class="glass-card rounded-2xl overflow-hidden flex flex-col group h-full">
                        <div class="relative h-48 sm:h-56 md:h-64 w-full overflow-hidden">
                            <?php if (!empty($proyek['thumbnail'])): ?>
                                <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" style="background-image: url('<?= base_url('uploads/proyek/' . $proyek['thumbnail']['nama_file']) ?>')"></div>
                            <?php else: ?>
                                <div class="absolute inset-0 bg-surface-container-high flex items-center justify-center">
                                    <span class="material-symbols-outlined text-on-surface-variant/20 text-4xl">image</span>
                                </div>
                            <?php endif; ?>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-3 left-3 md:bottom-4 md:left-4 flex flex-wrap gap-2">
                                <?php if (!empty($proyek['teknologi'])): ?>
                                    <?php foreach (array_slice(explode(',', $proyek['teknologi']), 0, 3) as $tech): ?>
                                        <span class="px-2.5 py-0.5 md:px-3 md:py-1 rounded-full bg-primary/10 backdrop-blur-md border border-primary/20 text-primary text-[11px] md:text-[12px] font-label-md"><?= esc(trim($tech)) ?></span>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <span class="px-2.5 py-0.5 md:px-3 md:py-1 rounded-full bg-primary/10 backdrop-blur-md border border-primary/20 text-primary text-[11px] md:text-[12px] font-label-md"><?= esc($proyek['kategori']) ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="p-5 md:p-8 space-y-3 md:space-y-4 flex-grow flex flex-col justify-between">
                            <div>
                                <span class="text-primary-container font-label-md text-label-md uppercase tracking-wider mb-1 block text-xs"><?= esc($proyek['kategori']) ?></span>
                                <h3 class="font-headline-md text-[20px] md:text-headline-md text-on-background group-hover:text-primary transition-colors"><?= esc($proyek['judul']) ?></h3>
                                <p class="font-body-md text-[14px] md:text-body-md text-on-surface-variant mt-2 line-clamp-3"><?= esc($proyek['deskripsi']) ?></p>
                            </div>
                            <a class="inline-flex items-center gap-2 text-primary font-label-md text-[13px] md:text-label-md group/link" href="<?= base_url('/portofolio/detail/' . $proyek['id']) ?>">
                                Eksplorasi Kasus
                                <span class="material-symbols-outlined text-[18px] transition-transform group-hover/link:translate-x-1">north_east</span>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="px-margin-mobile md:px-margin-desktop py-8 md:py-12">
        <div class="glass-card p-8 sm:p-12 md:p-20 rounded-3xl md:rounded-[40px] text-center space-y-5 md:space-y-8 relative overflow-hidden group">
            <div class="absolute inset-0 bg-primary/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <h2 class="font-display text-[24px] sm:text-headline-lg md:text-display text-on-background max-w-3xl mx-auto leading-tight relative z-10">Mari Membangun Sesuatu yang Luar Biasa.</h2>
            <p class="font-body-lg text-[14px] md:text-body-lg text-on-surface-variant max-w-xl mx-auto relative z-10">Konsultasikan kebutuhan aplikasi Anda hari ini dan kita buat dampaknya secara global.</p>
            <div class="flex flex-col sm:flex-row flex-wrap justify-center gap-3 md:gap-6 pt-2 md:pt-4 relative z-10">
                <button class="btn-primary px-6 py-3.5 md:px-10 md:py-5 rounded-xl md:rounded-2xl font-label-md text-[13px] md:text-lg text-white">Mulai Proyek</button>
                <button class="btn-secondary px-6 py-3.5 md:px-10 md:py-5 rounded-xl md:rounded-2xl font-label-md text-[13px] md:text-lg text-on-surface">Unduh CV</button>
            </div>
        </div>
    </section>
</main>

<?= view('layouts/footer') ?>