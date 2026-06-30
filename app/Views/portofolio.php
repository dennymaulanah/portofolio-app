<?= view('layouts/header', ['activePage' => 'portofolio']) ?>

<main class="relative">
<!-- Header Section -->
<header class="pt-section-gap pb-12 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto relative z-10">
<div class="max-w-3xl">
<h1 class="font-display text-headline-lg-mobile md:text-display text-on-background leading-tight mb-6">
                    Katalog Proyek Saya
                </h1>
<p class="text-on-surface-variant font-body-lg text-body-lg max-w-2xl">
                    Eksplorasi mahakarya digital yang dibangun dengan presisi teknis dan estetika modern. Dari aplikasi web berskala besar hingga pengalaman mobile yang intuitif.
                </p>
</div>
</header>
<!-- Filter Bar -->
<section class="mb-16 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto relative z-10">
<div class="flex flex-wrap gap-3 items-center">
    <?php
        $categories = [];
        foreach ($proyeks as $p) {
            if (!in_array($p['kategori'], $categories)) {
                $categories[] = $p['kategori'];
            }
        }
    ?>
    <button class="filter-btn active px-6 py-2 rounded-full border border-outline-variant font-label-md text-label-md hover:border-primary transition-all" onclick="filterProjects('all', this)">
        All
    </button>
    <?php foreach ($categories as $cat): ?>
        <?php $catSlug = strtolower(str_replace([' ', '/'], '', $cat)); ?>
        <button class="filter-btn px-6 py-2 rounded-full border border-outline-variant font-label-md text-label-md hover:border-primary transition-all" onclick="filterProjects('<?= $catSlug ?>', this)">
            <?= esc($cat) ?>
        </button>
    <?php endforeach; ?>
</div>
</section>

<!-- Project Grid -->
<section class="pb-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto relative z-10">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter" id="project-grid">
    <?php if (empty($proyeks)): ?>
        <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-16 glass-card rounded-2xl">
            <span class="material-symbols-outlined text-5xl text-on-surface-variant/30 mb-2">folder_open</span>
            <p class="text-on-surface-variant text-sm">Belum ada proyek yang dipublikasikan.</p>
        </div>
    <?php else: ?>
        <?php foreach ($proyeks as $proyek): ?>
            <?php $catSlug = strtolower(str_replace([' ', '/'], '', $proyek['kategori'])); ?>
            <div class="project-card group glass-card rounded-xl overflow-hidden flex flex-col" data-category="<?= $catSlug ?>">
                <div class="relative aspect-video overflow-hidden">
                    <?php if (!empty($proyek['thumbnail'])): ?>
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="<?= esc($proyek['judul']) ?>" src="<?= base_url('uploads/proyek/' . $proyek['thumbnail']['nama_file']) ?>">
                    <?php else: ?>
                        <div class="w-full h-full bg-surface-container-high flex items-center justify-center">
                            <span class="material-symbols-outlined text-on-surface-variant/20 text-4xl">image</span>
                        </div>
                    <?php endif; ?>
                    <a href="<?= base_url('/portofolio/detail/' . $proyek['id']) ?>" class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <span class="text-primary font-label-md text-label-md">Lihat Detail →</span>
                    </a>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <span class="text-primary-container font-label-md text-label-md uppercase tracking-wider mb-2 block text-xs"><?= esc($proyek['kategori']) ?></span>
                        <h3 class="font-headline-md text-on-surface text-2xl mb-3"><?= esc($proyek['judul']) ?></h3>
                        <p class="text-on-surface-variant text-body-md font-body-md mb-4 line-clamp-3"><?= esc($proyek['deskripsi']) ?></p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <?php if (!empty($proyek['teknologi'])): ?>
                            <?php foreach (explode(',', $proyek['teknologi']) as $tech): ?>
                                <span class="bg-primary/10 text-primary-fixed-dim px-3 py-1 rounded-full text-xs font-semibold"><?= esc(trim($tech)) ?></span>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
</section>

<!-- CTA Section -->
<section class="py-section-gap px-margin-mobile md:px-margin-desktop bg-surface-container-lowest relative z-10 border-t border-white/5 overflow-hidden">
<div class="max-w-container-max mx-auto text-center relative z-10">
<h2 class="font-display text-headline-lg-mobile md:text-headline-lg text-on-background mb-8">Punya Proyek Luar Biasa?</h2>
<p class="text-on-surface-variant text-body-lg font-body-lg max-w-2xl mx-auto mb-10">
                    Mari berkolaborasi untuk mewujudkan ide visioner Anda menjadi kenyataan digital yang fungsional dan estetis.
                </p>
<div class="flex flex-col sm:flex-row gap-4 justify-center">
<button class="bg-primary text-on-primary px-10 py-4 rounded-full font-label-md text-lg hover:shadow-[0_0_30px_rgba(99,102,241,0.5)] transition-all active:scale-95">
                        Mulai Konsultasi
                    </button>
<button class="border border-white/20 text-on-surface px-10 py-4 rounded-full font-label-md text-lg hover:bg-white/5 transition-all active:scale-95">
                        Unduh CV Saya
                    </button>
</div>
</div>
<!-- Decorative Gradient -->
<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary/10 blur-[120px] rounded-full pointer-events-none"></div>
</section>
</main>
<script>
        function filterProjects(category, btnElement) {
            const cards = document.querySelectorAll('.project-card');
            const buttons = document.querySelectorAll('.filter-btn');

            // Update button states
            buttons.forEach(btn => btn.classList.remove('active'));
            if (btnElement) {
                btnElement.classList.add('active');
            }

            // Filter cards
            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'scale(0.95)';
                
                setTimeout(() => {
                    if (category === 'all' || card.getAttribute('data-category') === category) {
                        card.style.display = 'flex';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'scale(1)';
                        }, 50);
                    } else {
                        card.style.display = 'none';
                    }
                }, 300);
            });
        }

        // Intersection Observer for scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    entry.target.classList.remove('opacity-0', 'translate-y-10');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.project-card').forEach(card => {
            card.classList.add('opacity-0', 'translate-y-10', 'transition-all', 'duration-700', 'ease-out');
            observer.observe(card);
        });
</script>

<?= view('layouts/footer') ?>
