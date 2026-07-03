<?php
$settingsModel = new \App\Models\PengaturanModel();
$pengaturan = $settingsModel->first() ?? [
    'nama_situs'     => 'AzeriaDev',
    'email_kontak'   => '',
    'telepon_kontak' => '',
    'github_url'     => '#',
    'linkedin_url'   => '#',
    'instagram_url'  => '#',
];
?>
<!-- Footer -->
<footer class="bg-surface border-t border-white/5">
    <div class="flex flex-col md:flex-row justify-between items-center py-12 md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto gap-6 md:gap-8">
        <div class="flex flex-col items-center md:items-start gap-3 md:gap-4">
            <div class="font-display text-[24px] md:text-headline-md text-on-surface font-bold"><?= esc($pengaturan['nama_situs']) ?></div>
            <p class="text-on-surface-variant text-[14px] md:text-body-md font-body-md max-w-xs text-center md:text-left">
                Membangun masa depan digital dengan kode yang bersih dan desain yang bermakna.
            </p>
        </div>
        <div class="flex flex-col items-center gap-4 md:gap-6">
            <div class="flex gap-5 md:gap-6">
                <a class="text-on-surface-variant hover:text-primary transition-colors duration-200 p-1" href="<?= base_url('/portofolio') ?>" title="Portofolio">
                    <span class="material-symbols-outlined text-xl md:text-2xl">code</span>
                </a>
                <a class="text-on-surface-variant hover:text-primary transition-colors duration-200 p-1" href="<?= !empty($pengaturan['email_kontak']) ? 'mailto:' . esc($pengaturan['email_kontak']) : '#' ?>" title="Hubungi Kami">
                    <span class="material-symbols-outlined text-xl md:text-2xl">contact_mail</span>
                </a>
                <a class="text-on-surface-variant hover:text-primary transition-colors duration-200 p-1" href="<?= base_url('/tentang') ?>" title="Tentang Saya">
                    <span class="material-symbols-outlined text-xl md:text-2xl">person</span>
                </a>
            </div>
            <p class="text-on-surface-variant text-[13px] md:text-body-md font-body-md">
                © <?= date('Y') ?> <?= esc($pengaturan['nama_situs']) ?>. Built with Precision.
            </p>
        </div>
        <div class="flex gap-6 md:gap-8 text-on-surface-variant font-label-md text-[12px] md:text-label-md">
            <?php if (!empty($pengaturan['linkedin_url'])): ?>
                <a class="hover:text-primary transition-colors duration-200" href="<?= esc($pengaturan['linkedin_url']) ?>" target="_blank">LinkedIn</a>
            <?php endif; ?>
            <?php if (!empty($pengaturan['github_url'])): ?>
                <a class="hover:text-primary transition-colors duration-200" href="<?= esc($pengaturan['github_url']) ?>" target="_blank">GitHub</a>
            <?php endif; ?>
            <?php if (!empty($pengaturan['instagram_url'])): ?>
                <a class="hover:text-primary transition-colors duration-200" href="<?= esc($pengaturan['instagram_url']) ?>" target="_blank">Instagram</a>
            <?php endif; ?>
        </div>
    </div>
</footer>
<script>
    // Splash Screen Reveal Logic
    window.addEventListener('DOMContentLoaded', () => {
        const splash = document.getElementById('splash');
        if (splash) {
            setTimeout(() => {
                splash.classList.add('splash-fade');
                document.body.style.overflowY = 'auto';
            }, 1500);
        }
    });

    // Smooth Scroll Micro-interaction
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // Sticky Nav Transformation on Scroll
    window.addEventListener('scroll', () => {
        const nav = document.querySelector('nav');
        if (nav) {
            if (window.scrollY > 50) {
                nav.classList.add('bg-surface/90');
                nav.classList.remove('bg-surface/70');
            } else {
                nav.classList.add('bg-surface/70');
                nav.classList.remove('bg-surface/90');
            }
        }
    });
</script>
</body>

</html>