<?php $activePage = $activePage ?? 'ringkasan'; ?>

<!-- SIDEBAR -->
<aside class="h-full w-64 fixed left-0 top-0 border-r border-white/10 backdrop-blur-xl bg-surface/70 shadow-md flex flex-col py-6 px-4 z-[60]">
    <div class="mb-10 px-2">
        <h1 class="font-headline-md text-headline-md font-bold text-primary">DevPortal Admin</h1>
    </div>

    <nav class="flex-1 space-y-2">
        <a class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg <?= $activePage === 'ringkasan' ? 'active' : '' ?>" href="<?= base_url('/admin/dashboard') ?>">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="font-label-md">Ringkasan</span>
        </a>
        <a class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg <?= $activePage === 'proyek' ? 'active' : '' ?>" href="<?=base_url('/admin/proyek') ?>">
            <span class="material-symbols-outlined">folder_special</span>
            <span class="font-label-md">Proyek</span>
        </a>
        <a class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg <?= $activePage === 'tentang' ? 'active' : '' ?>" href="#">
            <span class="material-symbols-outlined">person</span>
            <span class="font-label-md">Tentang</span>
        </a>
        <a class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg <?= $activePage === 'pengaturan' ? 'active' : '' ?>" href="#">
            <span class="material-symbols-outlined">settings</span>
            <span class="font-label-md">Pengaturan</span>
        </a>
    </nav>

    <div class="mt-auto p-2">
        <div class="flex items-center gap-3 p-2 bg-white/5 rounded-xl border border-white/5">
            <img class="w-10 h-10 rounded-full border border-primary/30" alt="Admin avatar" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCAQZRkqJ5IzriPN7AavHdQw5xthwKZ5fkmUSkbcnit8hITQLbJyxqxKrjW136vdCxivRdoNJg7U9Tl693TvkspwKEuy5p_SnNHuQBmdFfNuTqXGgEgdNzUTPUrNxcCUIhnG7x2G6YMldaad_YwZsEBvulDBjZzoB1I9J6MZze7u65uRfnUSgxCTxyd39HESxV3BJ35YQhb-QqWVu4DkFdf8kf5v4YQt52yJzwZGXt2uY5nYRK5-d7gQfn5MV-Sb6_biYJJ02giKIc">
            <div class="overflow-hidden">
                <p class="font-label-md text-on-surface truncate">Admin Profile</p>
                <p class="text-[10px] text-on-surface-variant uppercase tracking-widest">Main Developer</p>
            </div>
        </div>
    </div>
</aside>

<!-- TOP BAR -->
<header class="ml-64 flex justify-between items-center w-[calc(100%-16rem)] px-8 h-16 border-b border-white/10 backdrop-blur-xl bg-surface/70 shadow-sm fixed top-0 z-50">
    <div class="flex items-center">
        <h2 class="font-headline-md text-headline-md font-black text-on-surface"><?= esc($pageTitle ?? 'Ringkasan') ?></h2>
    </div>
    <div class="flex items-center gap-6">
        <div class="relative hidden lg:block">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-sm">search</span>
            <input class="bg-surface-container-lowest border border-white/10 rounded-full pl-10 pr-4 py-1.5 text-sm focus:outline-none focus:border-primary/50 transition-all w-64" placeholder="Cari data..." type="text">
        </div>
        <div class="flex items-center gap-2">
            <button class="material-symbols-outlined text-on-surface-variant hover:text-primary hover:bg-white/5 rounded-full p-2 transition-all duration-200 cursor-pointer active:opacity-70">notifications</button>
            <button class="material-symbols-outlined text-on-surface-variant hover:text-primary hover:bg-white/5 rounded-full p-2 transition-all duration-200 cursor-pointer active:opacity-70">account_circle</button>
        </div>
    </div>
</header>
