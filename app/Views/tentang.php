<?= view('layouts/header', ['activePage' => 'tentang']) ?>
<?php
$settingsModel = new \App\Models\PengaturanModel();
$pengaturan = $settingsModel->first();
$waUrl = 'https://wa.me/628123456789';
if ($pengaturan && !empty($pengaturan['telepon_kontak'])) {
    $waUrl = 'https://wa.me/' . preg_replace('/[^0-9]/', '', $pengaturan['telepon_kontak']);
}
?>

<main class="min-h-screen">
    <!-- Hero / Profile Section -->
    <section class="py-12 md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 md:gap-gutter items-center">
            <div class="lg:col-span-5 relative">
                <div class="aspect-square max-w-[320px] sm:max-w-[400px] lg:max-w-none mx-auto rounded-3xl overflow-hidden glass-card p-3 md:p-4 relative z-10">
                    <?php
                    $photoUrl = 'https://lh3.googleusercontent.com/aida-public/AB6AXuACcwX8uD_10xYXnSNdTG85QwBjIl63UiSEKPDgLlTlrpuz31mhvVoAw2cncs0FUUbx1kOcysfsKH65ZXa3k03drvmEEUtyk4ZzqUu9qdptYIAs8-EedMAby7rirbOapeA85bVDJMiZs2i3-Lfg-qLs7oW_PS88M6I08RKXCurbBVdJ7RaOcO5GLirA6xHTv-MxQvYqsGka964OZp-Ynd-zhXsMJtoXT0x048nFvxPG4FUHS597nTIESYSJGw9s8HmIgVwYtOguOUM';
                    if (!empty($profil['foto'])) {
                        $photoUrl = (strpos($profil['foto'], 'http') === 0) ? $profil['foto'] : base_url('uploads/profil/' . $profil['foto']);
                    }
                    ?>
                    <img class="w-full h-full object-cover rounded-2xl" alt="Professional portrait" src="<?= $photoUrl ?>" />
                </div>
                <!-- Decorative Element -->
                <div class="absolute -top-12 -left-12 w-40 h-40 md:w-64 md:h-64 bg-primary/10 rounded-full blur-[80px] -z-10"></div>
            </div>
            <div class="lg:col-span-7 space-y-6 md:space-y-8 text-center lg:text-left">
                <div>
                    <?php if (!empty($profil['nama'])): ?>
                    <span class="text-primary font-label-md text-[14px] md:text-[16px] font-bold uppercase tracking-widest mb-1.5 block"><?= esc($profil['nama']) ?></span>
                    <?php endif; ?>
                    <span class="text-on-surface-variant/60 font-label-md text-[11px] md:text-[12px] uppercase tracking-widest mb-3 md:mb-4 block">Tentang Saya</span>
                    <h1 class="font-display text-[24px] sm:text-headline-lg-mobile md:text-headline-lg mb-4 md:mb-6 leading-tight"><?= $profil['tagline'] ?></h1>
                    <p class="text-on-surface-variant font-body-lg text-[15px] md:text-body-lg max-w-2xl mx-auto lg:mx-0">
                        <?= nl2br(esc($profil['biografi'] ?? '')) ?>
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row flex-wrap gap-3 md:gap-4 justify-center lg:justify-start">
                    <?php if (!empty($profil['cv_file'])): ?>
                    <a href="<?= base_url('/cv-latest') ?>" target="_blank" class="flex items-center justify-center gap-3 bg-primary text-on-primary px-6 py-3 md:px-8 md:py-4 rounded-xl font-bold text-[14px] md:text-[16px] hover:scale-105 active:scale-95 hover:shadow-[0_0_20px_rgba(99,102,241,0.4)] transition-all duration-200 no-underline">
                        <span class="material-symbols-outlined text-[20px]">download</span>
                        Download CV
                    </a>
                    <?php endif; ?>
                    <a href="<?= $waUrl ?>" target="_blank" class="flex items-center justify-center gap-3 bg-transparent border border-white/20 text-on-surface px-6 py-3 md:px-8 md:py-4 rounded-xl font-bold text-[14px] md:text-[16px] hover:bg-white/5 transition-all duration-200 no-underline">
                        Hubungi Saya
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Keahlian Teknis Section -->
    <section class="py-12 md:py-section-gap bg-surface-container-lowest relative overflow-hidden">
        <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto relative z-10">
            <div class="text-center mb-8 md:mb-16">
                <h2 class="font-display text-[24px] md:text-headline-md mb-3 md:mb-4">Keahlian Teknis</h2>
                <p class="text-on-surface-variant font-body-md text-[14px] md:text-body-md max-w-xl mx-auto">Tumpukan teknologi yang saya kuasai untuk menghidupkan ide-ide kompleks menjadi kenyataan digital yang elegan.</p>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-6">
                <?php if (empty($skills)): ?>
                    <div class="col-span-2 sm:col-span-3 lg:col-span-4 text-center py-8 text-on-surface-variant/60">Belum ada data keahlian teknis.</div>
                <?php else: ?>
                    <?php foreach ($skills as $s): ?>
                    <?php 
                    $lvl = (int)$s['level'];
                    $badge = 'Beginner';
                    if ($lvl >= 90) {
                        $badge = 'Expert';
                    } elseif ($lvl >= 80) {
                        $badge = 'Advanced';
                    } elseif ($lvl >= 60) {
                        $badge = 'Intermediate';
                    }
                    ?>
                    <div class="glass-card p-4 md:p-8 rounded-xl md:rounded-2xl flex flex-col items-center text-center">
                        <div class="w-12 h-12 md:w-16 md:h-16 bg-primary-container/20 rounded-lg md:rounded-xl flex items-center justify-center mb-3 md:mb-6">
                            <span class="material-symbols-outlined text-primary text-2xl md:text-4xl"><?= esc($s['ikon']) ?></span>
                        </div>
                        <h3 class="font-display text-[14px] md:text-body-lg font-bold mb-1 md:mb-2"><?= esc($s['nama']) ?></h3>
                        <div class="w-full h-1 md:h-1.5 bg-white/5 rounded-full mt-2 md:mt-4 overflow-hidden">
                            <div class="h-full bg-primary" style="width: <?= $lvl ?>%"></div>
                        </div>
                        <span class="text-[10px] md:text-xs text-on-surface-variant mt-1.5 md:mt-2 font-label-md"><?= $badge ?></span>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <!-- Decorative Glow -->
        <div class="absolute bottom-0 right-0 w-[300px] h-[300px] md:w-[500px] md:h-[500px] bg-secondary/5 rounded-full blur-[120px] -z-0"></div>
    </section>

    <!-- Pengalaman Terakhir Section -->
    <section class="py-12 md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 md:gap-gutter">
            <div class="lg:col-span-4">
                <h2 class="font-display text-[24px] md:text-headline-md">Jejak Karir &amp; Pengalaman Profesional</h2>
                <p class="mt-3 md:mt-6 text-on-surface-variant font-body-md text-[14px] md:text-body-md">Evolusi saya sebagai pengembang melalui berbagai proyek menantang dan peran strategis.</p>
            </div>
            <div class="lg:col-span-8 border-l border-white/10 ml-2 lg:ml-0 pl-6 lg:pl-12 space-y-8 md:space-y-12 relative">
                <?php if (empty($careers)): ?>
                    <div class="text-on-surface-variant/60 py-8 text-center text-sm">Belum ada riwayat karir yang ditambahkan.</div>
                <?php else: ?>
                    <?php foreach ($careers as $c): ?>
                    <div class="relative">
                        <!-- Dot on timeline -->
                        <div class="absolute -left-[30px] lg:-left-[54px] top-1.5 w-3 h-3 rounded-full bg-primary border-4 border-surface shadow-[0_0_10px_rgba(99,102,241,0.5)]"></div>
                        <span class="text-primary font-label-md text-[12px] md:text-label-md"><?= esc($c['periode']) ?></span>
                        <h3 class="font-display text-[20px] md:text-headline-md mt-1 md:mt-2"><?= esc($c['posisi']) ?></h3>
                        <p class="text-on-surface-variant text-[14px] md:text-body-md font-bold mt-1"><?= esc($c['perusahaan']) ?></p>
                        <?php if (!empty($c['deskripsi']) || !empty($c['tags'])): ?>
                        <div class="mt-3 md:mt-4 glass-card p-4 md:p-6 rounded-xl md:rounded-2xl">
                            <?php if (!empty($c['deskripsi'])): ?>
                            <p class="text-on-surface-variant font-body-md text-[13px] md:text-body-md leading-relaxed">
                                <?= nl2br(esc($c['deskripsi'])) ?>
                            </p>
                            <?php endif; ?>
                            <?php if (!empty($c['tags'])): ?>
                            <div class="flex flex-wrap gap-1.5 md:gap-2 <?= !empty($c['deskripsi']) ? 'mt-3 md:mt-4' : '' ?>">
                                <?php foreach (explode(',', $c['tags']) as $tag): ?>
                                    <?php if (trim($tag) !== ''): ?>
                                    <span class="px-2.5 py-0.5 md:px-3 md:py-1 bg-primary/10 text-primary text-[11px] md:text-xs rounded-full border border-primary/20"><?= esc(trim($tag)) ?></span>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?= view('layouts/footer') ?>