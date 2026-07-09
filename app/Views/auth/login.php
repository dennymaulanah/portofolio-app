<!DOCTYPE html>
<html class="dark" lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Portal Portofolio | Azeria</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;900&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/tailwind.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>" />
</head>

<body class="flex items-center justify-center px-4 py-6 sm:px-6 sm:py-8">

    <!-- Background Atmosphere Orbs -->
    <div class="obsidian-glow glow-1" id="glow1"></div>
    <div class="obsidian-glow glow-2" id="glow2"></div>
    <div class="obsidian-glow glow-3" id="glow3"></div>

    <!-- Floating Particles Container -->
    <div id="particles"></div>

    <!-- Login Container -->
    <div class="relative z-10 w-full max-w-[420px]">

        <!-- Brand Logo Header -->
        <div class="flex flex-col items-center mb-8 sm:mb-10 space-y-3 brand-header fade-up fade-up-delay-1">
            <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-primary/20 to-primary/5 border border-primary/20 flex items-center justify-center pulse-ring">
                <span class="material-symbols-outlined text-primary text-2xl sm:text-3xl" style="font-variation-settings: 'FILL' 1;">shield_person</span>
            </div>
            <div class="text-center">
                <h1 class="font-headline-md text-[24px] sm:text-headline-md text-on-surface tracking-tight leading-tight">Portal Portofolio</h1>
                <p class="font-body-md text-[14px] sm:text-body-md text-on-surface-variant mt-1 opacity-70">Portal Akses</p>
            </div>
        </div>

        <!-- Glassmorphism Form Card -->
        <div class="glass-card rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-10 fade-up fade-up-delay-2">

            <!-- Alert Error -->
            <div id="errorAlert" class="hidden mb-5 p-3.5 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 text-sm flex items-start gap-2.5 transition-all">
                <span class="material-symbols-outlined text-[20px] shrink-0 mt-0.5">error</span>
                <span id="errorMessage" class="leading-relaxed"></span>
            </div>

            <form class="space-y-5 sm:space-y-6" id="loginForm">

                <!-- Email Input -->
                <div class="space-y-2 input-group">
                    <label class="block font-label-md text-[12px] sm:text-label-md text-on-surface-variant tracking-widest" for="email">ALAMAT EMAIL</label>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-3.5 sm:left-4 top-1/2 -translate-y-1/2 text-outline-variant group-focus-within:text-primary transition-colors text-[20px] sm:text-[24px]">
                            mail
                        </span>
                        <input class="w-full input-field rounded-lg sm:rounded-xl py-3 sm:py-3.5 pl-11 sm:pl-12 pr-4 text-on-surface focus:outline-none font-body-md text-[15px] sm:text-[16px] placeholder:text-on-surface-variant/30" id="email" name="email" placeholder="admin@azeria.com" required type="email" autocomplete="email">
                    </div>
                </div>

                <!-- Password Input -->
                <div class="space-y-2 input-group">
                    <label class="block font-label-md text-[12px] sm:text-label-md text-on-surface-variant tracking-widest" for="password">KATA SANDI</label>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-3.5 sm:left-4 top-1/2 -translate-y-1/2 text-outline-variant group-focus-within:text-primary transition-colors text-[20px] sm:text-[24px]">
                            lock
                        </span>
                        <input class="w-full input-field rounded-lg sm:rounded-xl py-3 sm:py-3.5 pl-11 sm:pl-12 pr-11 sm:pr-12 text-on-surface focus:outline-none font-body-md text-[15px] sm:text-[16px] placeholder:text-on-surface-variant/30" id="password" name="password" placeholder="••••••••" required type="password" autocomplete="current-password">
                        <button class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 text-outline-variant hover:text-on-surface active:scale-90 transition-all p-0.5" onclick="togglePassword()" type="button" aria-label="Toggle password visibility">
                            <span class="material-symbols-outlined text-[20px] sm:text-[24px]" id="passIcon">visibility</span>
                        </button>
                    </div>
                </div>

                <!-- Submit Button -->
                <button class="w-full primary-btn text-white font-label-md text-[13px] sm:text-label-md py-3.5 sm:py-4 rounded-lg sm:rounded-xl flex items-center justify-center gap-2 group mt-2" type="submit" id="submitBtn">
                    <span>Masuk ke Dashboard</span>
                    <span class="material-symbols-outlined text-[20px] group-hover:translate-x-1 transition-transform">
                        arrow_forward
                    </span>
                </button>
            </form>

            <!-- Secondary Info -->
            <div class="mt-6 sm:mt-8 pt-5 sm:pt-6 border-t border-white/5 flex flex-col items-center space-y-3">
                <p class="font-body-md text-[13px] sm:text-body-md text-on-surface-variant text-center opacity-50">
                    Sistem Manajemen Internal
                </p>
                <div class="flex gap-4 sm:gap-5">
                    <span class="flex items-center gap-1.5 font-label-md text-[11px] sm:text-[12px] text-on-surface-variant/35">
                        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">verified_user</span>
                        Secure SSL
                    </span>
                    <span class="flex items-center gap-1.5 font-label-md text-[11px] sm:text-[12px] text-on-surface-variant/35">
                        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">history</span>
                        v1.0.0
                    </span>
                </div>
            </div>
        </div>

        <!-- Decorative Footer -->
        <p class="mt-8 sm:mt-12 text-center font-label-md text-[10px] sm:text-[11px] text-on-surface-variant opacity-30 uppercase tracking-[0.2em] footer-section fade-up fade-up-delay-3">
            © <?= date('Y') ?> AZERIA • ALL RIGHTS RESERVED
        </p>
    </div>

    <!-- Scripts -->
    <script>
        // ── Password Toggle ──
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('passIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = 'visibility_off';
            } else {
                input.type = 'password';
                icon.textContent = 'visibility';
            }
        }

        // ── Parallax Glow Orbs (mouse + touch) ──
        function moveGlows(x, y) {
            const g1 = document.getElementById('glow1');
            const g2 = document.getElementById('glow2');
            const g3 = document.getElementById('glow3');
            const nx = (x / window.innerWidth) - 0.5;
            const ny = (y / window.innerHeight) - 0.5;
            if (g1) g1.style.transform = `translate(${nx * 30}px, ${ny * 30}px)`;
            if (g2) g2.style.transform = `translate(${nx * -20}px, ${ny * -20}px)`;
            if (g3) g3.style.transform = `translate(calc(-50% + ${nx * 15}px), calc(-50% + ${ny * 15}px))`;
        }

        document.addEventListener('mousemove', (e) => moveGlows(e.clientX, e.clientY));
        document.addEventListener('touchmove', (e) => {
            const t = e.touches[0];
            moveGlows(t.clientX, t.clientY);
        }, {
            passive: true
        });

        // ── Floating Particles ──
        (function createParticles() {
            const container = document.getElementById('particles');
            const count = window.innerWidth < 640 ? 6 : 12;
            for (let i = 0; i < count; i++) {
                const p = document.createElement('div');
                p.className = 'particle';
                p.style.left = Math.random() * 100 + '%';
                p.style.bottom = '-4px';
                p.style.width = (Math.random() * 2 + 1) + 'px';
                p.style.height = p.style.width;
                p.style.animation = `float ${Math.random() * 8 + 8}s linear ${Math.random() * 6}s infinite`;
                p.style.opacity = '0';
                container.appendChild(p);
            }
        })();

        // ── Input Focus Ripple Effect ──
        document.querySelectorAll('.input-field').forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.classList.add('scale-[1.01]');
                input.parentElement.style.transition = 'transform 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
            });
            input.addEventListener('blur', () => {
                input.parentElement.classList.remove('scale-[1.01]');
            });
        });

        // ── AJAX Form Handling ──
        document.getElementById('loginForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const form = e.target;
            const btn = document.getElementById('submitBtn');
            const originalContent = btn.innerHTML;
            const errorAlert = document.getElementById('errorAlert');
            const errorMessage = document.getElementById('errorMessage');

            errorAlert.classList.add('hidden');

            // Loading state
            btn.disabled = true;
            btn.innerHTML = '<span class="material-symbols-outlined animate-spin text-[18px]">progress_activity</span><span>Memproses...</span>';

            try {
                const formData = new FormData(form);
                const response = await fetch('<?= base_url('/admin') ?>', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const result = await response.json();

                if (result.status === 'success') {
                    // Success state
                    btn.innerHTML = '<span class="material-symbols-outlined text-[20px]">check_circle</span><span>Berhasil!</span>';
                    btn.style.background = 'linear-gradient(135deg, #059669, #10b981)';
                    btn.style.boxShadow = '0 4px 25px rgba(16, 185, 129, 0.35)';

                    setTimeout(() => {
                        window.location.href = '<?= base_url('/admin/dashboard') ?>';
                    }, 800);
                } else {
                    btn.innerHTML = originalContent;
                    btn.disabled = false;

                    // Show error
                    errorMessage.innerHTML = result.message;
                    errorAlert.classList.remove('hidden');
                    errorAlert.classList.add('animate-shake');
                    setTimeout(() => errorAlert.classList.remove('animate-shake'), 400);
                }
            } catch (error) {
                btn.innerHTML = originalContent;
                btn.disabled = false;
                errorMessage.innerText = 'Terjadi kesalahan sistem, silakan coba lagi.';
                errorAlert.classList.remove('hidden');
                errorAlert.classList.add('animate-shake');
                setTimeout(() => errorAlert.classList.remove('animate-shake'), 400);
            }
        });
    </script>
</body>

</html>