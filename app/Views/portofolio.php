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
<button class="filter-btn active px-6 py-2 rounded-full border border-outline-variant font-label-md text-label-md hover:border-primary transition-all" onclick="filterProjects('all')">
                    All
                </button>
<button class="filter-btn px-6 py-2 rounded-full border border-outline-variant font-label-md text-label-md hover:border-primary transition-all" onclick="filterProjects('web')">
                    Web
                </button>
<button class="filter-btn px-6 py-2 rounded-full border border-outline-variant font-label-md text-label-md hover:border-primary transition-all" onclick="filterProjects('mobile')">
                    Mobile
                </button>
<button class="filter-btn px-6 py-2 rounded-full border border-outline-variant font-label-md text-label-md hover:border-primary transition-all" onclick="filterProjects('uiux')">
                    UI/UX
                </button>
</div>
</section>
<!-- Project Grid -->
<section class="pb-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto relative z-10">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter" id="project-grid">
<!-- Project 1 -->
<div class="project-card group glass-card rounded-xl overflow-hidden flex flex-col" data-category="web">
<div class="relative aspect-video overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="A high-fidelity mockup of a sleek, obsidian-themed financial dashboard displayed on a high-resolution wide monitor. The UI features vibrant indigo glowing charts and neon-accented data points against a deep charcoal glassmorphic background. Soft teal ambient lighting hits the edges of the screen, creating a high-end fintech aesthetic in a dark studio setting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD2zQIo0OO8Sa9tzxmjFMsUPizo4bzvCW8FFC01lRfri9XkK8lT6hXMPOYfvRmnFpKeaDy8NM0yEYt_ah2GlGhrNdumBOaXSJ_MJpRPexmCxwfI-XYpP8WfP7RHWzz_RjVxhlWc_lOSjfkEWGZsOokaEvXBCi6VxmWBdT-DsNYgfrIALl6tQP_2lObob_8wLWC2nxGH3eNaLheHDH0Uv1mrVhP67RJj9zoCDXOUWL6BOXbthsKFull5kHsa2L_m5Dj_I6zoegV2hNw">
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
<span class="text-primary font-label-md text-label-md">Lihat Detail →</span>
</div>
</div>
<div class="p-6 flex-1 flex flex-col justify-between">
<div>
<span class="text-primary-container font-label-md text-label-md uppercase tracking-wider mb-2 block">Web Development</span>
<h3 class="font-headline-md text-on-surface text-2xl mb-3">NeoBank Dashboard</h3>
<p class="text-on-surface-variant text-body-md font-body-md mb-4">Platform manajemen aset kripto dengan integrasi real-time data dan visualisasi interaktif.</p>
</div>
<div class="flex gap-2">
<span class="bg-primary/10 text-primary-fixed-dim px-3 py-1 rounded-full text-xs font-semibold">React</span>
<span class="bg-primary/10 text-primary-fixed-dim px-3 py-1 rounded-full text-xs font-semibold">Three.js</span>
</div>
</div>
</div>
<!-- Project 2 -->
<div class="project-card group glass-card rounded-xl overflow-hidden flex flex-col" data-category="mobile">
<div class="relative aspect-video overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Two premium smartphones placed side-by-side on a dark reflective surface, showcasing a health and fitness mobile app interface. The UI is designed with a dark mode aesthetic, featuring rounded glass cards and vibrant violet progress rings. Soft purple glows emanate from the phone screens, illuminating the minimalist surrounding environment with a tech-forward atmosphere." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDXVnZfcztwCCy66jwWPjlLT4CMCvmlxDhM39c92p12VaHBZ5X_0OA2Qe4pwaYvpxPEzs9x4ldJqz49yZJWddg11fO9lsVmaDD6eiDVbWhxhPrHLu-ZXcW_FG0KFXLpt6LOeLvTRvxy1qVYCUeWiLqDSyeru6Bchf3oJGXCoIXffgz0JDWine2NRfPucKA_vNUECDAf0hNcZJ_Dop7wRvepW5eBjXQX5g7z-GYcdxqEHgsMrXFN9I-0OWeB0bTk6kGoeHWgwf3JvIE">
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
<span class="text-primary font-label-md text-label-md">Lihat Detail →</span>
</div>
</div>
<div class="p-6 flex-1 flex flex-col justify-between">
<div>
<span class="text-primary-container font-label-md text-label-md uppercase tracking-wider mb-2 block">Mobile App</span>
<h3 class="font-headline-md text-on-surface text-2xl mb-3">ZenFit Wellness</h3>
<p class="text-on-surface-variant text-body-md font-body-md mb-4">Aplikasi pemantau kesehatan mental dan fisik dengan fitur meditasi berbasis AI.</p>
</div>
<div class="flex gap-2">
<span class="bg-primary/10 text-primary-fixed-dim px-3 py-1 rounded-full text-xs font-semibold">Flutter</span>
<span class="bg-primary/10 text-primary-fixed-dim px-3 py-1 rounded-full text-xs font-semibold">Firebase</span>
</div>
</div>
</div>
<!-- Project 3 -->
<div class="project-card group glass-card rounded-xl overflow-hidden flex flex-col" data-category="uiux">
<div class="relative aspect-video overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="A clean and modern UI design system documentation layout displayed on a tablet. The layout shows a library of glassmorphic buttons, cards, and input fields using a palette of deep slate, primary indigo, and translucent whites. The scene is lit by cool cinematic highlights, emphasizing the depth and transparency of the UI elements in a professional designer's workspace." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCExWN8V3DyDUai1J_cDA83M6QXvxwpiowXLpI7SGbSy7fup16bw4YT40czi2Bh4e_Mi2fvuMeJGwudiLXHtKMXYCAODuYTprGCnkTRalvQt3aYpGIFpvNZ8XlUSBBa-07LFazQTrsMckdftyoN0pvAM5DMpg2Q4wBCvYh11fmGhQpncDwK1qcCAnIsTmEAmNsIBvanJoGFa1zzslMFgBRhl_ZD15bZYxcMP63RUqCMnkgRdkoXYDKJgqzX6FxgMr92Jy5Z3pyTtBg">
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
<span class="text-primary font-label-md text-label-md">Lihat Detail →</span>
</div>
</div>
<div class="p-6 flex-1 flex flex-col justify-between">
<div>
<span class="text-primary-container font-label-md text-label-md uppercase tracking-wider mb-2 block">UI/UX Design</span>
<h3 class="font-headline-md text-on-surface text-2xl mb-3">Lumina Design System</h3>
<p class="text-on-surface-variant text-body-md font-body-md mb-4">Sistem desain komprehensif untuk produk enterprise dengan fokus pada aksesibilitas.</p>
</div>
<div class="flex gap-2">
<span class="bg-primary/10 text-primary-fixed-dim px-3 py-1 rounded-full text-xs font-semibold">Figma</span>
<span class="bg-primary/10 text-primary-fixed-dim px-3 py-1 rounded-full text-xs font-semibold">Tokens</span>
</div>
</div>
</div>
<!-- Project 4 -->
<div class="project-card group glass-card rounded-xl overflow-hidden flex flex-col" data-category="web">
<div class="relative aspect-video overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="A futuristic e-commerce website for luxury watches shown on a sleek laptop screen. The design uses high-contrast typography, large immersive product photography, and a deep obsidian color scheme. Minimalist navigation and glass-like call-to-action buttons are visible, all set within a dimly lit, high-performance tech studio environment." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCB74DNa8xCpGsz5MYxVjMwQhqmULJ0oqQEbBmHEIMKS92zbP-E8HsimMQU-m65VqCZ3zo9_CokzHbCOCH6YuTvoM1-M2hrEFRHOTDx4_IHPtuXk-aY4wv09ZGK4s8QWEPg9ahwVrhEtR71C-_mHt_FigHWzcSM6ZpCEUhH5nERPC7auzcbhyWoKzJYJP5oDdRWOmP2faHJM6fd9rUtIswCWWJfWQUyCUORyZdCQEbHgS8QiBn67xxMZRLr7NLaHmq5tSQkrm5RuhM">
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
<span class="text-primary font-label-md text-label-md">Lihat Detail →</span>
</div>
</div>
<div class="p-6 flex-1 flex flex-col justify-between">
<div>
<span class="text-primary-container font-label-md text-label-md uppercase tracking-wider mb-2 block">Web Development</span>
<h3 class="font-headline-md text-on-surface text-2xl mb-3">Chronos Luxury Shop</h3>
<p class="text-on-surface-variant text-body-md font-body-md mb-4">Toko daring eksklusif dengan pengalaman belanja yang imersif dan checkout cepat.</p>
</div>
<div class="flex gap-2">
<span class="bg-primary/10 text-primary-fixed-dim px-3 py-1 rounded-full text-xs font-semibold">Next.js</span>
<span class="bg-primary/10 text-primary-fixed-dim px-3 py-1 rounded-full text-xs font-semibold">Stripe</span>
</div>
</div>
</div>
<!-- Project 5 -->
<div class="project-card group glass-card rounded-xl overflow-hidden flex flex-col" data-category="mobile">
<div class="relative aspect-video overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="A smartphone displaying a social networking app for digital nomads. The interface features a map with glowing location pins, glassmorphic chat bubbles, and a vibrant user profile screen. The lighting is warm and golden, simulating a sunset atmosphere, contrasting with the dark, sophisticated UI elements of the application." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBv8ZCxlGn7J6DsmdO8m79Bho9EQBSkxizFPVz4kQfIZabFH1od_z_YsYySLJQy91fbDiAGJuHe-njJGEiW9PjuGizzBVcUu-xXtuFyXPg1vQuKw-9Or-n1EI2YZyOvdDJ-BJKCQ7HlswEy8fG2KEnRbE2q_4ASLgR9mzG4AzYq7tELKZ0xkBqP6cLPXFaceLaGL4DMB3gh0XNsdURet4jNgMl_87VFpvk4nxcxnL0Fv-QO8_ySsR689itbnHEa3llitNBhOlQk-cI">
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
<span class="text-primary font-label-md text-label-md">Lihat Detail →</span>
</div>
</div>
<div class="p-6 flex-1 flex flex-col justify-between">
<div>
<span class="text-primary-container font-label-md text-label-md uppercase tracking-wider mb-2 block">Mobile App</span>
<h3 class="font-headline-md text-on-surface text-2xl mb-3">NomadConnect</h3>
<p class="text-on-surface-variant text-body-md font-body-md mb-4">Jejaring sosial berbasis lokasi untuk komunitas pengelana digital di seluruh dunia.</p>
</div>
<div class="flex gap-2">
<span class="bg-primary/10 text-primary-fixed-dim px-3 py-1 rounded-full text-xs font-semibold">SwiftUI</span>
<span class="bg-primary/10 text-primary-fixed-dim px-3 py-1 rounded-full text-xs font-semibold">MapLibre</span>
</div>
</div>
</div>
<!-- Project 6 -->
<div class="project-card group glass-card rounded-xl overflow-hidden flex flex-col" data-category="uiux">
<div class="relative aspect-video overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="A professional creative portfolio showcase on a large iMac screen. The website design features asymmetrical grid layouts, large bold serif headings, and smooth scroll animations. The overall aesthetic is minimal yet high-end, utilizing a dark theme with subtle grain textures and precise whitespace management in a modern home office setting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDeTGh1xhuDF_LIGr1In2ELSbnDCneKyNGBJvPNUkV3thvSZ0-03xYfzuL0Om8tks8oPV69w0-bgSYhxb3q3iCRNbHvbz32do3W3sOOsVhAl94BIGdV5EuY_J3KA0H92g4DodpfhJccfVboEiP-LvVcXUEpNyR94_cI9pe8ASO_PCjmxoEY5u5H657cM_HNZi_3_wYM86KEyv0sqY0jnMwD7EwC3MrJK6UD4Li_OGRae3-iYNX6nO4GCp_FPnWGUWXdduF_EDC4UhY">
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
<span class="text-primary font-label-md text-label-md">Lihat Detail →</span>
</div>
</div>
<div class="p-6 flex-1 flex flex-col justify-between">
<div>
<span class="text-primary-container font-label-md text-label-md uppercase tracking-wider mb-2 block">UI/UX Design</span>
<h3 class="font-headline-md text-on-surface text-2xl mb-3">Visionary Portfolio</h3>
<p class="text-on-surface-variant text-body-md font-body-md mb-4">Redesain portofolio untuk agensi kreatif dengan navigasi non-linear yang unik.</p>
</div>
<div class="flex gap-2">
<span class="bg-primary/10 text-primary-fixed-dim px-3 py-1 rounded-full text-xs font-semibold">Webflow</span>
<span class="bg-primary/10 text-primary-fixed-dim px-3 py-1 rounded-full text-xs font-semibold">GSAP</span>
</div>
</div>
</div>
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
        function filterProjects(category) {
            const cards = document.querySelectorAll('.project-card');
            const buttons = document.querySelectorAll('.filter-btn');

            // Update button states
            buttons.forEach(btn => {
                btn.classList.remove('active');
                if (btn.textContent.toLowerCase().includes(category)) {
                    btn.classList.add('active');
                } else if (category === 'all' && btn.textContent.toLowerCase().includes('all')) {
                    btn.classList.add('active');
                }
            });

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
