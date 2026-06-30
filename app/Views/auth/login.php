<!DOCTYPE html>
<html class="dark" lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>DevPortal Admin Login | Obsidian Tech</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;900&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface-tint": "#c0c1ff",
                        "surface-container-highest": "#353534",
                        "inverse-surface": "#e5e2e1",
                        "on-background": "#e5e2e1",
                        "on-error-container": "#ffdad6",
                        "on-primary-fixed": "#07006c",
                        "on-tertiary-fixed-variant": "#703700",
                        "background": "#0a0a0a",
                        "primary": "#6366F1",
                        "secondary-fixed": "#dde1ff",
                        "on-surface": "#e5e2e1",
                        "on-secondary-container": "#a2b1f9",
                        "secondary-container": "#334282",
                        "surface-container-high": "#2a2a2a",
                        "secondary": "#b8c4ff",
                        "on-tertiary": "#4f2500",
                        "tertiary-container": "#d97721",
                        "on-surface-variant": "#c7c4d7",
                        "surface-dim": "#131313",
                        "tertiary": "#ffb783",
                        "outline": "#908fa0",
                        "on-tertiary-container": "#452000",
                        "on-secondary-fixed-variant": "#334282",
                        "secondary-fixed-dim": "#b8c4ff",
                        "primary-fixed": "#e1e0ff",
                        "tertiary-fixed-dim": "#ffb783",
                        "primary-fixed-dim": "#c0c1ff",
                        "on-primary": "#1000a9",
                        "error": "#ffb4ab",
                        "primary-container": "#8083ff",
                        "outline-variant": "#464554",
                        "inverse-on-surface": "#313030",
                        "surface-container-lowest": "#0e0e0e",
                        "surface-bright": "#3a3939",
                        "error-container": "#93000a",
                        "on-primary-fixed-variant": "#2f2ebe",
                        "surface-container": "#201f1f",
                        "on-tertiary-fixed": "#301400",
                        "on-secondary": "#1a2b6a",
                        "on-primary-container": "#0d0096",
                        "tertiary-fixed": "#ffdcc5",
                        "surface-variant": "#353534",
                        "inverse-primary": "#494bd6",
                        "surface-container-low": "#1c1b1b",
                        "surface": "#131313",
                        "on-secondary-fixed": "#001354",
                        "on-error": "#690005"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "fontFamily": {
                        "headline-md": ["Outfit"],
                        "body-lg": ["Inter"],
                        "display": ["Outfit"],
                        "label-md": ["Inter"],
                        "headline-lg": ["Outfit"],
                        "body-md": ["Inter"]
                    },
                    "fontSize": {
                        "headline-md": ["32px", {
                            "lineHeight": "40px",
                            "fontWeight": "600"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "28px",
                            "fontWeight": "400"
                        }],
                        "display": ["72px", {
                            "lineHeight": "80px",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "label-md": ["14px", {
                            "lineHeight": "20px",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }],
                        "headline-lg": ["48px", {
                            "lineHeight": "56px",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "600"
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "24px",
                            "fontWeight": "400"
                        }]
                    }
                },
            },
        }
    </script>
    <style>
        body {
            background-color: #0a0a0a;
            color: #e5e2e1;
            overflow: hidden;
            height: 100vh;
        }

        .glass-card {
            background: rgba(18, 18, 18, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.5);
        }

        .obsidian-glow {
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, rgba(99, 102, 241, 0) 70%);
            border-radius: 50%;
            filter: blur(60px);
            z-index: -1;
        }

        .input-glow:focus {
            box-shadow: 0 0 15px rgba(99, 102, 241, 0.2);
            border-color: #6366F1;
        }

        .primary-btn {
            background-color: #6366F1;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .primary-btn:hover {
            box-shadow: 0 0 25px rgba(99, 102, 241, 0.5);
            transform: translateY(-2px);
        }

        .primary-btn:active {
            transform: scale(0.98);
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="flex items-center justify-center p-6">
    <!-- Background Atmosphere -->
    <div class="obsidian-glow -top-48 -left-48"></div>
    <div class="obsidian-glow -bottom-48 -right-48"></div>

    <!-- Login Container -->
    <div class="relative z-10 w-full max-w-md">
        <!-- Brand Logo Header -->
        <div class="flex flex-col items-center mb-10 space-y-4">
            <div class="w-20 h-20 rounded-xl bg-surface-container-low flex items-center justify-center border border-white/5 shadow-2xl">
                <img alt="DevCraft Admin Logo" class="w-14 h-14 object-contain" src="https://lh3.googleusercontent.com/aida/AP1WRLuVkEFQx5ic-Mch7w2IH4P6x8sBbrBTniy8rr1r-bxfcfE01lExrtCoYWk5WNfyPiBg76xo2W_i6o_LwjM5hdB-sWBWABUMt695ZTOiNeSigPAs3qg2guCgWB8ZRaNwr_2h8c4iHuUN4EROFmk9uwwsvyxwSdGh7VsxtMoc1i_VW89AdaSuFsQxvCU5-Wzr0dzdkNbN4pEDNMEzCb5SMk_UsSDHyhLVT1JjLf36Z-b-L87GfS3CTboATTk">
            </div>
            <div class="text-center">
                <h1 class="font-headline-md text-headline-md text-on-surface tracking-tight">DevCraft Admin</h1>
                <p class="font-body-md text-body-md text-on-surface-variant mt-1 opacity-70">Obsidian Tech v1.0 • Portal Akses</p>
            </div>
        </div>

        <!-- Glassmorphism Form Card -->
        <div class="glass-card rounded-2xl p-8 md:p-10">
            <form class="space-y-6" id="loginForm">
                <!-- Email Input -->
                <div class="space-y-2">
                    <label class="block font-label-md text-label-md text-on-surface-variant" for="email">ALAMAT EMAIL</label>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline-variant group-focus-within:text-primary transition-colors">
                            mail
                        </span>
                        <input class="w-full bg-[#0e0e0e] border border-outline-variant/30 rounded-lg py-3.5 pl-12 pr-4 text-on-surface focus:outline-none input-glow transition-all font-body-md" id="email" name="email" placeholder="admin@devcraft.io" required type="email">
                    </div>
                </div>

                <!-- Password Input -->
                <div class="space-y-2">
                    <div class="flex justify-between items-center">
                        <label class="block font-label-md text-label-md text-on-surface-variant" for="password">KATA SANDI</label>
                        <a class="font-label-md text-label-md text-primary hover:underline transition-all" href="#">Lupa Password?</a>
                    </div>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline-variant group-focus-within:text-primary transition-colors">
                            lock
                        </span>
                        <input class="w-full bg-[#0e0e0e] border border-outline-variant/30 rounded-lg py-3.5 pl-12 pr-12 text-on-surface focus:outline-none input-glow transition-all font-body-md" id="password" name="password" placeholder="••••••••" required type="password">
                        <button class="absolute right-4 top-1/2 -translate-y-1/2 text-outline-variant hover:text-on-surface transition-colors" onclick="togglePassword()" type="button">
                            <span class="material-symbols-outlined" id="passIcon">visibility</span>
                        </button>
                    </div>
                </div>

                <!-- Submit Button -->
                <button class="w-full primary-btn text-white font-label-md text-label-md py-4 rounded-lg flex items-center justify-center gap-2 group" type="submit">
                    <span>Masuk ke Dashboard</span>
                    <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">
                        arrow_forward
                    </span>
                </button>
            </form>

            <!-- Secondary Actions -->
            <div class="mt-8 pt-8 border-t border-white/5 flex flex-col items-center space-y-4">
                <p class="font-body-md text-body-md text-on-surface-variant text-center opacity-60">
                    Sistem Manajemen Internal
                </p>
                <div class="flex gap-4">
                    <span class="flex items-center gap-1.5 font-label-md text-label-md text-on-surface-variant/40">
                        <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">verified_user</span>
                        Secure SSL
                    </span>
                    <span class="flex items-center gap-1.5 font-label-md text-label-md text-on-surface-variant/40">
                        <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">history</span>
                        v2.4.0
                    </span>
                </div>
            </div>
        </div>

        <!-- Decorative Footer -->
        <p class="mt-12 text-center font-label-md text-label-md text-on-surface-variant opacity-40 uppercase tracking-widest">
            © 2024 DevCraft Collective • All Rights Reserved
        </p>
    </div>

    <!-- Background Interactions -->
    <script>
        // Password toggle visibility
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

        // Interactive subtle background mouse movement
        document.addEventListener('mousemove', (e) => {
            const glows = document.querySelectorAll('.obsidian-glow');
            const x = (e.clientX / window.innerWidth) - 0.5;
            const y = (e.clientY / window.innerHeight) - 0.5;

            glows.forEach((glow, index) => {
                const multiplier = (index + 1) * 20;
                glow.style.transform = `translate(${x * multiplier}px, ${y * multiplier}px)`;
            });
        });

        // Simple form handling
        document.getElementById('loginForm').addEventListener('submit', (e) => {
            e.preventDefault();
            const btn = e.target.querySelector('button[type="submit"]');
            const originalContent = btn.innerHTML;

            // Loading state simulation
            btn.disabled = true;
            btn.innerHTML = '<span class="material-symbols-outlined animate-spin">sync</span><span>Memproses...</span>';

            setTimeout(() => {
                btn.innerHTML = '<span class="material-symbols-outlined">check_circle</span><span>Berhasil!</span>';
                btn.classList.remove('bg-primary');
                btn.classList.add('bg-green-600');

                setTimeout(() => {
                    alert('Login berhasil diproses. Mengarahkan ke Dashboard...');
                    btn.innerHTML = originalContent;
                    btn.disabled = false;
                    btn.classList.add('bg-primary');
                    btn.classList.remove('bg-green-600');
                }, 1000);
            }, 2000);
        });
    </script>
</body>

</html>