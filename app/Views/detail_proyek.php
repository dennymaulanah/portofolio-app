<?= view('layouts/header', ['activePage' => 'portofolio']) ?>
<?php
$settingsModel = new \App\Models\PengaturanModel();
$pengaturan = $settingsModel->first() ?? [
    'nama_situs'     => 'AzeriaDev',
    'telepon_kontak' => '6281234567890',
];
$waPhone = preg_replace('/[^0-9]/', '', $pengaturan['telepon_kontak']);
$waText = 'Halo ' . $pengaturan['nama_situs'] . ', saya tertarik dengan proyek ' . $proyek['judul'];
$waUrl = 'https://wa.me/' . $waPhone . '?text=' . urlencode($waText);
?>

<main class="relative min-h-screen">
    <!-- Background Atmospheric Glows -->
    <div class="absolute top-0 right-0 w-[300px] h-[300px] md:w-[500px] md:h-[500px] bg-primary/5 blur-[120px] -z-10 rounded-full pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[250px] h-[250px] md:w-[400px] md:h-[400px] bg-secondary/5 blur-[100px] -z-10 rounded-full pointer-events-none"></div>

    <article class="pt-24 pb-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto relative z-10">
        <!-- Breadcrumb / Back Button -->
        <div class="mb-8">
            <a href="<?= base_url('/portofolio') ?>" class="inline-flex items-center gap-2 text-on-surface-variant hover:text-primary transition-colors duration-200 group">
                <span class="material-symbols-outlined text-lg transition-transform group-hover:-translate-x-1">arrow_back</span>
                <span class="text-sm font-semibold">Kembali ke Portofolio</span>
            </a>
        </div>

        <!-- Project Hero Header -->
        <header class="mb-12 max-w-4xl">
            <div class="flex items-center gap-3 mb-4">
                <span class="bg-primary/10 text-primary-fixed-dim px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wider border border-primary/20">
                    <?= esc($proyek['kategori']) ?>
                </span>
                <span class="text-on-surface-variant/40 text-xs">•</span>
                <span class="text-on-surface-variant/60 text-xs">
                    <?= date('d F Y', strtotime($proyek['created_at'])) ?>
                </span>
            </div>
            <h1 class="font-display text-[32px] sm:text-headline-lg md:text-display text-on-background leading-tight">
                <?= esc($proyek['judul']) ?>
            </h1>
        </header>

        <!-- Main Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Left Column: Gallery & Details -->
            <div class="lg:col-span-2 space-y-10">
                <!-- Gallery Section -->
                <div class="space-y-4">
                    <!-- Main Preview Carousel -->
                    <div class="glass-card rounded-2xl overflow-hidden aspect-video relative group select-none">
                        <?php if (!empty($proyek['foto'])): ?>
                            <div id="carouselWrapper" class="flex w-full h-full transition-transform duration-500 ease-out" style="transform: translateX(0%);">
                                <?php foreach ($proyek['foto'] as $foto): ?>
                                    <div class="w-full h-full shrink-0">
                                        <img class="w-full h-full object-cover" src="<?= base_url('uploads/proyek/' . $foto['nama_file']) ?>" alt="<?= esc($proyek['judul']) ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            
                            <!-- Carousel Controls (only if multiple photos) -->
                            <?php if (count($proyek['foto']) > 1): ?>
                                <button onclick="prevSlide()" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/55 backdrop-blur-md border border-white/10 text-white flex items-center justify-center hover:bg-primary hover:border-primary hover:text-on-primary transition-all duration-300 opacity-0 group-hover:opacity-100 focus:outline-none active:scale-95">
                                    <span class="material-symbols-outlined text-xl">chevron_left</span>
                                </button>
                                <button onclick="nextSlide()" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/55 backdrop-blur-md border border-white/10 text-white flex items-center justify-center hover:bg-primary hover:border-primary hover:text-on-primary transition-all duration-300 opacity-0 group-hover:opacity-100 focus:outline-none active:scale-95">
                                    <span class="material-symbols-outlined text-xl">chevron_right</span>
                                </button>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="w-full h-full bg-surface-container-high flex flex-col items-center justify-center text-on-surface-variant/30 gap-2">
                                <span class="material-symbols-outlined text-5xl">image</span>
                                <p class="text-sm">Tidak ada foto proyek.</p>
                            </div>
                        <?php endif; ?>
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent pointer-events-none"></div>
                    </div>

                    <!-- Thumbnails List (if multiple photos) -->
                    <?php if (!empty($proyek['foto']) && count($proyek['foto']) > 1): ?>
                        <div id="thumbSlider" class="flex gap-3 overflow-x-auto pb-2 scroll-hide cursor-grab active:cursor-grabbing select-none">
                            <?php foreach ($proyek['foto'] as $index => $foto): ?>
                                <button onclick="goToSlide(<?= $index ?>, this)" 
                                        class="thumbnail-btn relative w-24 h-16 sm:w-28 sm:h-20 rounded-xl overflow-hidden border-2 <?= $index === 0 ? 'border-primary' : 'border-white/10' ?> shrink-0 hover:border-primary/50 transition-all focus:outline-none">
                                    <img class="w-full h-full object-cover pointer-events-none" src="<?= base_url('uploads/proyek/' . $foto['nama_file']) ?>" alt="Thumbnail">
                                </button>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Description Card -->
                <div class="glass-card p-6 sm:p-10 rounded-2xl space-y-6">
                    <h2 class="font-display text-xl sm:text-2xl text-on-surface font-semibold flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary text-xl">description</span>
                        Tentang Proyek
                    </h2>
                    <div class="text-on-surface-variant text-body-md sm:text-body-lg leading-relaxed space-y-4">
                        <?= nl2br(esc($proyek['deskripsi'])) ?>
                    </div>
                </div>
            </div>

            <!-- Right Column: Sidebar Specs -->
            <div class="space-y-6">
                <!-- Project Specifications Card -->
                <div class="glass-card p-6 sm:p-8 rounded-2xl space-y-6 sticky top-24">
                    <h3 class="font-display text-lg text-on-surface font-semibold flex items-center gap-2 border-b border-white/5 pb-4">
                        <span class="material-symbols-outlined text-primary text-xl">info</span>
                        Spesifikasi Proyek
                    </h3>

                    <!-- Kategori -->
                    <div class="space-y-1.5">
                        <p class="text-xs text-on-surface-variant/40 uppercase tracking-widest font-semibold">Kategori</p>
                        <p class="text-sm font-semibold text-on-surface"><?= esc($proyek['kategori']) ?></p>
                    </div>

                    <!-- Tanggal Rilis -->
                    <div class="space-y-1.5">
                        <p class="text-xs text-on-surface-variant/40 uppercase tracking-widest font-semibold">Tanggal Rilis</p>
                        <p class="text-sm font-semibold text-on-surface"><?= date('d F Y', strtotime($proyek['created_at'])) ?></p>
                    </div>

                    <!-- Teknologi -->
                    <?php if (!empty($proyek['teknologi'])): ?>
                        <div class="space-y-3">
                            <p class="text-xs text-on-surface-variant/40 uppercase tracking-widest font-semibold">Teknologi</p>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach (explode(',', $proyek['teknologi']) as $tech): ?>
                                    <span class="bg-primary/10 text-primary-fixed-dim px-3 py-1 rounded-full text-xs font-semibold border border-primary/10">
                                        <?= esc(trim($tech)) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <hr class="border-white/5">

                    <!-- CTA WhatsApp -->
                    <div class="pt-2">
                        <a href="<?= $waUrl ?>" 
                           target="_blank"
                           class="btn-primary text-white w-full py-4 rounded-xl font-label-md flex items-center justify-center gap-2 group/btn">
                            <span class="material-symbols-outlined text-lg">chat_bubble</span>
                            Hubungi Developer
                            <span class="material-symbols-outlined text-sm transition-transform group-hover/btn:translate-x-1">north_east</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</main>

<script>
    // Carousel logic
    let currentSlide = 0;
    const totalSlides = <?= !empty($proyek['foto']) ? count($proyek['foto']) : 0 ?>;
    const carouselWrapper = document.getElementById('carouselWrapper');
    const thumbnailBtns = document.querySelectorAll('.thumbnail-btn');

    function goToSlide(index, btnEl = null) {
        if (index < 0 || index >= totalSlides) return;
        currentSlide = index;

        // Slide the wrapper
        if (carouselWrapper) {
            carouselWrapper.style.transform = `translateX(-${currentSlide * 100}%)`;
        }

        // Highlight selected thumbnail
        thumbnailBtns.forEach((btn, idx) => {
            if (idx === currentSlide) {
                btn.classList.remove('border-white/10');
                btn.classList.add('border-primary');
                // Scroll thumbnail into view if not visible
                btn.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
            } else {
                btn.classList.remove('border-primary');
                btn.classList.add('border-white/10');
            }
        });
    }

    function nextSlide() {
        let nextIdx = (currentSlide + 1) % totalSlides;
        goToSlide(nextIdx);
    }

    function prevSlide() {
        let prevIdx = (currentSlide - 1 + totalSlides) % totalSlides;
        goToSlide(prevIdx);
    }

    // Drag to scroll for thumbnail list
    const slider = document.getElementById('thumbSlider');
    if (slider) {
        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            slider.classList.add('active');
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });

        slider.addEventListener('mouseleave', () => {
            isDown = false;
            slider.classList.remove('active');
        });

        slider.addEventListener('mouseup', () => {
            isDown = false;
            slider.classList.remove('active');
        });

        slider.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 2; // Scroll speed multiplier
            slider.scrollLeft = scrollLeft - walk;
        });
    }
</script>

<?= view('layouts/footer') ?>
