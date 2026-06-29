<?= view('layouts/header', ['activePage' => 'beranda']) ?>

<main class="relative">
    <!-- Background Atmospheric Glows -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-primary/10 blur-[120px] -z-10 rounded-full"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-secondary/5 blur-[100px] -z-10 rounded-full"></div>
    <!-- Hero Section -->
    <section class="min-h-[80vh] flex flex-col justify-center items-center text-center px-margin-mobile md:px-margin-desktop pt-20 pb-section-gap">
        <div class="max-w-4xl space-y-8">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary/10 border border-primary/20 text-primary font-label-md animate-fade-in">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                </span>
                Tersedia untuk proyek baru
            </div>
            <h1 class="font-display text-headline-lg-mobile md:text-display text-on-background leading-tight">
                Halo, Saya <span class="text-primary italic">AzeriaDev</span> — Membangun Aplikasi Web & Mobile yang Fokus pada Performa.
            </h1>
            <p class="font-body-lg text-on-surface-variant max-w-2xl mx-auto leading-relaxed">
                Membantu startup dan korporasi menghadirkan pengalaman digital premium melalui kode yang bersih dan desain yang intuitif.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center pt-8">
                <a class="btn-primary px-8 py-4 rounded-xl font-label-md text-white flex items-center justify-center gap-3" href="#proyek">
                    Lihat Proyek
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">terminal</span>
                </a>
                <a class="btn-secondary px-8 py-4 rounded-xl font-label-md text-on-surface flex items-center justify-center gap-3" href="#">
                    Hubungi WhatsApp
                    <span class="material-symbols-outlined">chat_bubble</span>
                </a>
            </div>
        </div>
    </section>
    <!-- Pilihan Editor Section (Bentoish Grid) -->
    <section class="py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto" id="proyek">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-4">
            <div class="space-y-4">
                <h2 class="font-display text-headline-lg text-on-background">Pilihan Editor</h2>
                <p class="font-body-md text-on-surface-variant max-w-lg">Koleksi karya terpilih yang mendemonstrasikan keahlian teknis dan perhatian terhadap detail.</p>
            </div>
            <div class="flex gap-4">
                <button class="p-3 rounded-full glass-card hover:bg-surface-variant text-on-surface-variant"><span class="material-symbols-outlined">chevron_left</span></button>
                <button class="p-3 rounded-full glass-card hover:bg-surface-variant text-on-surface-variant"><span class="material-symbols-outlined">chevron_right</span></button>
            </div>
        </div>
        <!-- Horizontal Scroll on Mobile, Grid on Desktop -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
            <!-- Project 1 -->
            <div class="glass-card rounded-2xl overflow-hidden flex flex-col group h-full">
                <div class="relative h-64 w-full overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" data-alt="A high-fidelity mockup of a fintech dashboard application on a sleek monitor. The UI features elegant glassmorphic components, vibrant data visualizations in electric indigo and primary purple, and clean typography. The setting is a minimalist, dimly lit home office with soft ambient glow reflecting the obsidian tech aesthetic of the developer portfolio." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBf-0BaewNeFLwc7hLOAXdf-dPD7gQO0dniUPZhiIlh-_uSCbsMDcY0XtqopgapCIWhF-P-M6wIHHtbWXNOatn8U2fzj5wtGIKFjq8c8ToQL_gut0Qiixjh9_76491b-3RNM_HmFq5Nru9gMgH9iHFgyYYo4EBkddh2NlYHnCHKGG-xepMcGBImnstPi08K9vMvDMqV8FRC0NVJ4fF-82ULqPN3yFMgzbhJ7NWZuNfFa8qeCqdi_xCN_Oo6tBrtUjJj3IGJd4_JcBc')"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 flex gap-2">
                        <span class="px-3 py-1 rounded-full bg-primary/10 backdrop-blur-md border border-primary/20 text-primary text-[12px] font-label-md">Next.js</span>
                        <span class="px-3 py-1 rounded-full bg-primary/10 backdrop-blur-md border border-primary/20 text-primary text-[12px] font-label-md">TypeScript</span>
                    </div>
                </div>
                <div class="p-8 space-y-4 flex-grow flex flex-col justify-between">
                    <div>
                        <h3 class="font-headline-md text-on-background group-hover:text-primary transition-colors">NeoBank Dashboard</h3>
                        <p class="font-body-md text-on-surface-variant mt-2">Optimalisasi sistem manajemen keuangan dengan real-time analytics.</p>
                    </div>
                    <a class="inline-flex items-center gap-2 text-primary font-label-md group/link" href="#">
                        Eksplorasi Kasus
                        <span class="material-symbols-outlined transition-transform group-hover/link:translate-x-1">north_east</span>
                    </a>
                </div>
            </div>
            <!-- Project 2 -->
            <div class="glass-card rounded-2xl overflow-hidden flex flex-col group h-full">
                <div class="relative h-64 w-full overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" data-alt="A vibrant mobile app interface for a high-performance fitness tracker. The screen displays dynamic activity rings, dark-mode gradients, and sleek cards for performance stats. The presentation uses a 3D isometric perspective against a deep charcoal background with subtle purple light leaks, aligning with a premium obsidian-tech developer style." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBetxDffQgWqn48XkiZ2aXI8sqG9Nmn-pETEYkibiF6bYg1KXzjcGd9i4KPWl2e3PaILv8gxp4IYXSBJAi0VGBM5_HV9UQlc_poRXs3yd_gO80tewqZxT8QQhb2DuZmBvw1WpFLoW4pg0cGs7hcIvLhuwCk2hauwKizX2QXBiehX6B1ZwtwYPlih0Rdeu2Ha6XnVPGUCQgC9YLHne7GEH1imWIYqsLw_9sQC-2fbCw5WoZbdZbhS2GYb4MeS5Os2cHRCxV2cZFv96U')"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 flex gap-2">
                        <span class="px-3 py-1 rounded-full bg-primary/10 backdrop-blur-md border border-primary/20 text-primary text-[12px] font-label-md">React Native</span>
                        <span class="px-3 py-1 rounded-full bg-primary/10 backdrop-blur-md border border-primary/20 text-primary text-[12px] font-label-md">Firebase</span>
                    </div>
                </div>
                <div class="p-8 space-y-4 flex-grow flex flex-col justify-between">
                    <div>
                        <h3 class="font-headline-md text-on-background group-hover:text-primary transition-colors">Stride Fitness App</h3>
                        <p class="font-body-md text-on-surface-variant mt-2">Aplikasi pelacak kebugaran dengan integrasi sensor biometrik canggih.</p>
                    </div>
                    <a class="inline-flex items-center gap-2 text-primary font-label-md group/link" href="#">
                        Eksplorasi Kasus
                        <span class="material-symbols-outlined transition-transform group-hover/link:translate-x-1">north_east</span>
                    </a>
                </div>
            </div>
            <!-- Project 3 -->
            <div class="glass-card rounded-2xl overflow-hidden flex flex-col group h-full">
                <div class="relative h-64 w-full overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" data-alt="A sophisticated e-commerce platform for high-end digital art assets. The UI showcases large cinematic hero images, minimalist navigation, and refined product filters. The overall color scheme is monochromatic black and white with subtle luminous accents, evoking a sense of digital luxury and exclusivity in a modern gallery style." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD2rmXwjaTaINm4TMgN1lyV4eyl_VtEWAMPqMZabWQL4e517VF4SZky0hTJZLMOCKcSUp4Q0jisZYMFRccFT0chKiigAseuX_QBmmb3_l-HD4MsJtYn9hLnCMyLs21qcDCQ9BqeMV-KHScClkupKhwSPyMy-5-RXh0rboi4H-YRaKxcpYkVN6H2LAS62aadCjVis4RxjtEMlFhSwrxPVvV1H9r4AlRmCR4AtrA4q5SLb8AEnc2xgST9x4BciEgueapO20_4-O8zVB8')"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 flex gap-2">
                        <span class="px-3 py-1 rounded-full bg-primary/10 backdrop-blur-md border border-primary/20 text-primary text-[12px] font-label-md">Shopify</span>
                        <span class="px-3 py-1 rounded-full bg-primary/10 backdrop-blur-md border border-primary/20 text-primary text-[12px] font-label-md">GraphQL</span>
                    </div>
                </div>
                <div class="p-8 space-y-4 flex-grow flex flex-col justify-between">
                    <div>
                        <h3 class="font-headline-md text-on-background group-hover:text-primary transition-colors">Lumina Marketplace</h3>
                        <p class="font-body-md text-on-surface-variant mt-2">Platform jual beli aset digital dengan arsitektur headless yang cepat.</p>
                    </div>
                    <a class="inline-flex items-center gap-2 text-primary font-label-md group/link" href="#">
                        Eksplorasi Kasus
                        <span class="material-symbols-outlined transition-transform group-hover/link:translate-x-1">north_east</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA Section -->
    <section class="py-section-gap px-margin-mobile md:px-margin-desktop">
        <div class="glass-card p-12 md:p-20 rounded-[40px] text-center space-y-8 relative overflow-hidden group">
            <div class="absolute inset-0 bg-primary/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <h2 class="font-display text-headline-lg md:text-display text-on-background max-w-3xl mx-auto">Mari Membangun Sesuatu yang Luar Biasa.</h2>
            <p class="font-body-lg text-on-surface-variant max-w-xl mx-auto">Konsultasikan kebutuhan aplikasi Anda hari ini dan kita buat dampaknya secara global.</p>
            <div class="flex flex-wrap justify-center gap-6 pt-4">
                <button class="btn-primary px-10 py-5 rounded-2xl font-label-md text-white text-lg">Mulai Proyek</button>
                <button class="btn-secondary px-10 py-5 rounded-2xl font-label-md text-on-surface text-lg">Unduh CV</button>
            </div>
        </div>
    </section>
</main>

<?= view('layouts/footer') ?>