<?php
$activePage = $activePage ?? 'beranda';
$settingsModel = new \App\Models\PengaturanModel();
$pengaturan = $settingsModel->first() ?? [
    'nama_situs'     => 'AzeriaDev',
    'email_kontak'   => '',
    'telepon_kontak' => '',
    'github_url'     => '#',
    'linkedin_url'   => '#',
    'instagram_url'  => '#',
];
$hireMeUrl = '#';
if (!empty($pengaturan['telepon_kontak'])) {
    $hireMeUrl = 'https://wa.me/' . preg_replace('/[^0-9]/', '', $pengaturan['telepon_kontak']);
} elseif (!empty($pengaturan['email_kontak'])) {
    $hireMeUrl = 'mailto:' . $pengaturan['email_kontak'];
}
$hireMeTarget = (strpos($hireMeUrl, 'mailto:') === 0) ? '' : 'target="_blank"';
?>
<!DOCTYPE html>
<html class="dark" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title><?= esc($pengaturan['nama_situs']) ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&family=Inter:wght@400;600&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-tertiary-fixed-variant": "#703700",
                        "tertiary-container": "#d97721",
                        "secondary": "#b8c4ff",
                        "on-primary-fixed": "#07006c",
                        "surface-bright": "#3a3939",
                        "on-primary-fixed-variant": "#2f2ebe",
                        "surface": "#131313",
                        "on-secondary": "#1a2b6a",
                        "on-secondary-container": "#a2b1f9",
                        "surface-container-high": "#2a2a2a",
                        "primary": "#c0c1ff",
                        "on-secondary-fixed": "#001354",
                        "secondary-fixed": "#dde1ff",
                        "inverse-surface": "#e5e2e1",
                        "primary-fixed": "#e1e0ff",
                        "surface-container": "#201f1f",
                        "surface-container-lowest": "#0e0e0e",
                        "surface-container-low": "#1c1b1b",
                        "tertiary-fixed": "#ffdcc5",
                        "tertiary-fixed-dim": "#ffb783",
                        "surface-variant": "#353534",
                        "error": "#ffb4ab",
                        "background": "#131313",
                        "inverse-on-surface": "#313030",
                        "outline": "#908fa0",
                        "secondary-fixed-dim": "#b8c4ff",
                        "on-tertiary-fixed": "#301400",
                        "inverse-primary": "#494bd6",
                        "on-tertiary-container": "#452000",
                        "secondary-container": "#334282",
                        "primary-container": "#8083ff",
                        "on-background": "#e5e2e1",
                        "surface-dim": "#131313",
                        "primary-fixed-dim": "#c0c1ff",
                        "error-container": "#93000a",
                        "surface-container-highest": "#353534",
                        "on-error-container": "#ffdad6",
                        "tertiary": "#ffb783",
                        "on-primary": "#1000a9",
                        "on-tertiary": "#4f2500",
                        "on-surface": "#e5e2e1",
                        "surface-tint": "#c0c1ff",
                        "on-error": "#690005",
                        "outline-variant": "#464554",
                        "on-surface-variant": "#c7c4d7",
                        "on-secondary-fixed-variant": "#334282",
                        "on-primary-container": "#0d0096"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "margin-desktop": "64px",
                        "margin-mobile": "20px",
                        "container-max": "1280px",
                        "unit": "4px",
                        "gutter": "24px",
                        "section-gap": "120px",
                        "section-gap-mobile": "60px"
                    },
                    "fontFamily": {
                        "body-md": ["Inter"],
                        "label-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "display": ["Outfit"],
                        "headline-lg-mobile": ["Outfit"],
                        "headline-md": ["Outfit"],
                        "headline-lg": ["Outfit"]
                    },
                    "fontSize": {
                        "body-md": ["16px", {
                            "lineHeight": "24px",
                            "fontWeight": "400"
                        }],
                        "label-md": ["14px", {
                            "lineHeight": "20px",
                            "letterSpacing": "0.05em",
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
                        "headline-lg-mobile": ["32px", {
                            "lineHeight": "40px",
                            "fontWeight": "600"
                        }],
                        "headline-md": ["32px", {
                            "lineHeight": "40px",
                            "fontWeight": "600"
                        }],
                        "headline-lg": ["48px", {
                            "lineHeight": "56px",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "600"
                        }]
                    }
                },
            },
        }
    </script>
    <style>
        body {
            background-color: #131313;
            color: #e5e2e1;
            overflow-x: hidden;
        }

        .glass-card {
            background: rgba(18, 18, 18, 0.7);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: transform 0.2s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .glass-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 0 30px rgba(99, 102, 241, 0.1);
            border-color: rgba(99, 102, 241, 0.3);
        }

        .btn-primary {
            background: #6366F1;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-primary:hover {
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.4);
            transform: scale(1.05);
        }

        .btn-secondary {
            border: 1px solid rgba(255, 255, 255, 0.2);
            background: transparent;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-secondary:hover {
            border-color: #6366F1;
            background: rgba(99, 102, 241, 0.05);
            transform: scale(1.05);
        }

        .splash-screen {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: #131313;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.8s ease, visibility 0.8s ease;
        }

        .splash-fade {
            opacity: 0;
            visibility: hidden;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .scroll-hide::-webkit-scrollbar {
            display: none;
        }

        .scroll-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .inner-glow {
            box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.1);
        }

        .timeline-dot::before {
            content: '';
            position: absolute;
            left: -9px;
            top: 8px;
            width: 18px;
            height: 18px;
            background: #c0c1ff;
            border-radius: 50%;
            border: 4px solid #131313;
        }

        .filter-btn.active {
            background-color: #c0c1ff;
            color: #1000a9;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #131313;
        }

        ::-webkit-scrollbar-thumb {
            background: #353534;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #464554;
        }

        /* Mobile menu overlay */
        .mobile-menu-overlay {
            position: fixed;
            inset: 0;
            z-index: 90;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .mobile-menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 280px;
            max-width: 85vw;
            height: 100%;
            z-index: 100;
            background: rgba(19, 19, 19, 0.97);
            backdrop-filter: blur(20px);
            border-left: 1px solid rgba(255, 255, 255, 0.08);
            transition: right 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
        }

        .mobile-menu.active {
            right: 0;
        }

        .mobile-menu a {
            transition: all 0.2s ease;
        }

        .mobile-menu a:hover,
        .mobile-menu a:active {
            background: rgba(192, 193, 255, 0.08);
        }

        /* Hamburger animation */
        .hamburger-line {
            display: block;
            width: 22px;
            height: 2px;
            background: #e5e2e1;
            border-radius: 2px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hamburger.active .hamburger-line:nth-child(1) {
            transform: translateY(7px) rotate(45deg);
        }

        .hamburger.active .hamburger-line:nth-child(2) {
            opacity: 0;
            transform: scaleX(0);
        }

        .hamburger.active .hamburger-line:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg);
        }
    </style>
</head>

<body class="font-body-md text-body-md">
    <!-- Splash Screen -->
    <div class="splash-screen" id="splash">
        <div class="relative w-24 h-24 flex items-center justify-center animate-pulse">
            <img alt="Logo" class="w-full h-full object-contain" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAYAAACtWK6eAAAQAElEQVR4Aexda5AcVRW+dzYPSbIPFVALkCIhkbIUSrGAAGJUHhEloEKVP8BKNmwwKFggilqQAoOKoIBgGdhXoAqkylIQLAkgyAoRQQRBfEBIYkFiVFCzj0Ag7m77ncw2zPbOo3v6vvuk7sntx+1zz/3O/XbuN9PTUxL8jxFgBGoiwASpCQ2fYASEYILwLGAE6iDABKkDDp9iBJggPAcYgToIaCRInV75FCPgCQJMEE8SxWHaQYAJYgd37tUTBJggniSKw7SDABPEDu7cqycI+EkQT8DlMP1HgAnifw55BBoRYIJoBJdd+48AE8T/HPIINCLABNEILrv2HwEmSCKHvMsIVCLABKlEg7cZgQQCTJAEILzLCFQiwASpRIO3GYEEAkyQBCC8ywhUIsAEqURD7zZ79xABJoiHSeOQzSHABDGHNffkIQJMEA+TxiGbQ4AJYg5r7slDBJggHiZtash8RBcCTBBdyLLfIBBgggSRRh6ELgSYILqQZb9BIMAECSKNPAhdCDBBdCEbit+Cj4MJUvAJwMOvjwATpD4+fLbgCDBBCj4BePj1EWCC1MeHzxYcASZIwSeAzeH70DcTxIcscYzWEGCCWIOeO/YBASaID1niGK0hwASxBn26jqMo2ge2EPaudFdwK5UIMEFUoqnIF8iwH+wq2ItwuRX2MOwZ7FN5Cv9dAzsJ1orjXKYioOwIE0QZlGocYdIfBk9PwM6D7QVLloNx4IuwO2Hb0f4R2Ldgx8LehGNcFCLABFEIZl5XmOCfhI+HYHvC0pQWNDoc9jXYL2GD8PEA7GLYUbBpOMYlBwJMkBzgqbwUk/lt8PcT2AxYs2UmLlwE+wZsPYxeYe6C7wtg74dxvgFKlsKAZUFLb9uz4V51PubA58dgV8Ieh20GSc6DtWGbSwoEVCckRZfcpAYCXTWOqzy8P5xdBdsGkhyPmksDBKYSpMEFfFo9Apish8LrO2Cmymx09GP0ewBqLnUQYILUAcfgqWMN9hV31Y6Ne0ASIgs2uVRDgAlSDRXzx2wtd+ZjqKfCuNRAgAlSAxhTh/EXnN61OspUf1X6+UyVY3xoAgEmyAQQFit6W5benrUVwnEgaYetzl3v1yhBXAfDUnzHWeo37pY+bNwv3uF6MgLBE6TzrMEPdHYNXt65YnDr8hVDEewl2LrlXUMXLV264+2T4bCyZ5sgNGi634vqKUYYAatVnV1DdwM3wi4iLDuB6ZlnDtK7b1OuCelA0ARBEntlJB+TUl4ohdxnInF7ol4spFjdMmPsH0h2/9KlkZV7mLC0oXeSDkE8NssrwGd7MgDChLAhjIDVpVKKE9CGsMOu3EcC06gkfw+Mu3E82BIkQS65JCp1dg3diiQub5Q5EGdZy4zh2+maRm01nD9Rg8+sLp9KXkBYlGYM30HYJM8l94FxF7C+KXk8lP0gCfLCtuFrpRRZ3p1Z/MK2oV4LSXVheUU3OU4a+pZtwzdJIVK/9QysP4tl2HWTnASyEwpBXk9HZ9fwEiT3868fSLkhhVzWedbwwpTNVTX7uCpHOfzcV3ntsq6RD2H/dFi2IsUXCPtsF7nfOiiCLF++c38hxm9uGvZILGn62owXQn/QNwT3zniZ6uYvwyF9GQtVuUg5dlJ5q5n/x28u56CZa928JiiCRC2v3SGlbPpbdjIaN6kJXFhePQC8xiZPTUl3/04+lHIPvlopBymbe9EsGIJAKK7BMinfO0JSmPzAzAWCTNEfMopy3QpPOcDbwT8UgfwLgiC09pVSfC53TiI5kttHCgdYXtGHcx9N0VR3k0n6gzqLpNxBdU5bSTnJ6cOJy70nSHnNm0N3TE5DFYJMbqBo73D4sX0X7YtSyr8gjkkFryCkSyYda24nDD3iNUEWLYqm0ZoXiW5adySSf29iX9euC8urddUGF8nSlGVXtXaNjlFOKDeUo0ZtXT7vNUHmzh++jta8agCOdrTINvq2nRp39b24QJCqRJgmWi+PRLSzfvjpzlJu5i0YvjZdazdbldwMq3FUy84cOVWq0B0TXUVCXt3dLYcmdrVV0B+z4JyWWKislqqvloSBjErXKIxsJeVKoT+jrkpGe1PUGekOvF/fr8idwF/MpzZvaKMngahyWc8PiXPbj+N5Wkr5Uq0gNz3XuoowqXU+63HKFeUs63UutPeOILSmpbUtEqxEd+Av+ogcm3nywIAcNZSQN5ZXhjqs0k3V5VXcjrAgTAib+FiemnJFOaPc5fFj41rvCKJWdxDkpdP7+vZ4nrYMmfMEIRzKmJSy33JCF1cxX/WIVwSh99alQt2BPK7p72mjR3hiU3/BX2R6lOhB+nuq2wO9Uv6qbouJk4RNFInrJ3ZVVN59PuINQcpr2PHm77NKpJfW2Js2tJ2bOKx714WbE9dLKXelHejm59rOIazStm/czq/PR7wgCK1daQ2LxPqqO+J548XyKg6W6qLrES8IEoDuoLlGZuz5V9RZDasr0KtdU2Q94jxBfNcd8YSD/qCfLbB9e/sgXoUfi2PKUhdVjzhNkEB0RzwPXVhe3R8H00xdRD3iLEEC0h3xXHSBIJmXV3HwVBdRjzhLkIB0h8Dyim5vX0STzLLlIgjFXjQ94iRBQtEdNKEm7BjUNp+eiO7FFuiPzbSR00SR9IhzBAlMd8Rz0YXlVdXb2+MAs9ZF0SNOESRA3RHPOxcIknt5FQ+G6qLoEacIEpLuoElEBv1BT0+0/YjOCLEoJQj8iSLoEWcIEqDuoDlERq8ekjYs2uPQH1q+6xK6HnGCIIHqjpgPRJB421at/NWjciDq9Ejs1Z37tawTJGDdEWe76edMxQ4U1FoJErIesU6QEHVHPKGhP+Zh2/Zvb7yGGB6EaS2h6hGrBAlYd8ST0YWbEwegPxJPT4zDU1uHqEesESRw3RHPvOD1RzzQuA5Nj1ghSAF0Rzxf6AEN8batWqv+SA7KWT2SDDTlvhWChKw7YtyhPw7Dtsln/aK7KYWenvjHKUc1HwhJjxgnSAF0Rzz9XNAfU569Gwenuw5FjxglSEF0Rzz3Cqc/4oHHdQh6xBhBCqQ76Pb2GZgkR8Nsl1/YDCAEPWKMIEXQHRWTkcS57acnPoO3d2s+PbEiVq2bvuuRNATJDWCBdEeMlQv6w+i7V/HAq9U+6xHtBCmY7ojnR+H1RwxEXPuqR7QSpEi6I54IeHuXnp743njfUk1PT8z1gAbVcfuqR7QSZO78ocukkIeoArtUallaXtOq8qjFzwlavGZz+ij0xyvZLtHfmnJHOVTVE82tefNHtD6VXxtBli17ZT8k6XxVYMDPmt4bWm9D7Xph/VEnQ5RDpc/7ldEF5WV8nU5znNJGEDlt1/cR13RYnZLuFD0b1sJzdNMFN7VV8Le3Tx1ytiOK9cj0qLTrimwRpG+thSCnnRa1CCFPEQr+YU1v+vc7mo4asb4bF9t+eiL9COejiMPZolqPYKCnleccthQXLQTp6BiZJ6WQamI1/vsdecJ24d2r+6WURm5vzwMU6REh1Pz+iJRCzn7rq1q+d6OFIKOj05T8CCTWqq+WStL2B25Z5gHrjwxoUW4pxxkuqdl02uiYkjmX7EALQdaunbVFROK/yc6y7uMvw5vGx8du1CnCssZUqz2WV1hWig/XOm/wuDMfENYbM+WUcks5rtcuzTlgP9jbO+dfadpmbaOFIBREJMWtVOc1KWUr/TYIfaaSyZf5xkeiy9kwm4Vub3/WZgBp+qZcUk4pt2naN2qDFdbaRm2aPa+NIKXxltWqXj4BwCHzFgxf2+wgDV3ngv6wenNiWpxV3pdHc2zntGh12r6zttNGkN0veVJekzWgOu1XdnaNfLrOedunWH+kyADlUKr8nUkprvzRmo7tKbpuqok2glA0mze0XkyfYdC2GhtbS2tXNb7UecEaeBa8HQGzXe6yHUC9/su5G1O2HKK5tXlDm5+fpBNQqt/vlu7qkeMxXgmzWZ4EPlqenqhiUKp1B/4oGfl8TOsrCAGr8v1u8ieFtK5HKI6EuaA/rH29NoFF1V2VuqPcgZnPx7QThAbj8/cBKP4UdmyKNrqbOPv2bmfX8BKpUncIsYbmlG5Ayb8RglBHiu+/gUs3nt+Kl/p9EcwCmM1CT08csBlArb7LumP85lrnsx4n3WHyvjxjBBkYkKNybObJmFAjWUGp1l66o0dcuL19PfDYVQ0nm8d81R2VmBkjCHUaqB5h/UHJrWK+6o7KoRglCHVMa0d8uHM9bSsyfD4yvESRr2bcqHwFaaZ/usY5/eGz7iBAYzNOEOo4FD2C5eL7MB7bT08cxPLqccThTPFdd1QCaYUgAekRF5ZX91Ym1PZ2CLqjEkMrBKEAAtEjLhDEqc8/QtAdND9js0YQCsBnPYLlFT098YM0Dsum9Oed84wlFN1RiYFVglAgHuuRYxD/TJjNshH6Y2u6APS2Ckl3VCJlnSAe6xEXlldOvHsVmu5wiiAUjKd6xAWCOKE/QtMdNCdjs/4KEgfikx6B/mhH3PQWLyprJULPd8OslhB1RyWgzhCEgvJIjyymeC3b76A/rD49MVTdUZlXpwjikR5xYXllVX9M0h2VM6rJbbwqG/l+R9bwnCIIBe+JHqEvSFG4Ns2q/ghZd1Qm1TmCUHAu6xH8pZuPGLU8pAx+0xa6vX192saq24WuOyrxcpIgFKDDesSF5ZW1pycWQXfQ/IvNWYI4rEdcIIgV/VEU3RGTg2pnCULBOapHXCCIFf1hQ3fQPLBpThOEgHFJj0B/0KN9XHh64p8IG5NWJN1RiavzBKFgHdIjLrx63EOYmLSi6Y5KbL0giEN6xAWCGNUfRdQd3hGEAratR7C8oqcnLqRYLJvR20uKqDsq8+vFK0gcsGU9Qj9tYPu3Sv4spXwpxkN3HbjuSAWfVwShEVnUI4VaXhVZd9A8i807gljUI4UhSNF1R0wOqr0jCAVNeqRUallK2yqMnvc7d8Hwqlq+oD/2wjn6gU5U1sooeh6AaS+EBWGiqiPKFeVMlT+TfrwkCAHUe0PrbSqfryVFdN4ZZ0S1PuNw4aedH4b+0H57+4oVUTthQRgrsjWUK0W+jLvxliCElFo9IudM32P4fPJbxQqzvBoVw18SQs4RCv6Zfo6ugpCnuGiOIFPc2DkwoPp5v5GoRQQXbm838vmHrI1BpiRjWerk9zsyDQKNvSYI4hfltW3pdNrOa5GM2pI+kOj34NjeMJvlZSyvHjURQCTFFAya69fM73c0F1v6q7wnCA1V4ecjreQvYbVeVRLNtO4afHpiVA2DrIMz9vsdWQPL2j4IgtCg+3vaV4ooepK2mzUsL4arXOsCQYwsrybGPjhRN1chB33d7Wc3d7F7VwVDkN3Qjs88BUuiHL8/In+628/Ef/DVgs2PwGwXgwSZjEGWgQOvEYEcZLnG9bbOESQPYHn1iIxm3JLo/2js23564hboj42Iw0iRYyKJQYZ+w9AdlQMOiiA0sP6etjujSFxH21kMxDor0AAABA9JREFUf/2+09u7x98S17iwvDJ6e3tfX/tGvD37vQQODXcJc8K+YUPPGgRHEMK/v6f9XBGJH9B2GgM5bu/v6fhqlbYuEMTg8qqMQH93xwXAZNJys3ym5v8Q5cC85ml/TwRJEEpHX0/7OSDJxbRdz/CX7xaQ41M12ti+vSRCXEZfQdDf7gJMTiVsdu/U/U9eGJIoTw41WILQQEGSy6JReZAYF9/EO1wTy6eIbtfYhOSvk+NiIV5tqn6Ggr+g0+FDySfK8NNs+QP0x1CzF+e9jrAhjIAVkXQTll47J3xiW6wek2JBX3fbFRPHgqyCJghlrL+/7dm+3vaL+no65vZ1t8u+7o7ZqA9E8k/s7W1/hNrUMLpBscYpY4eNL6+SIyOMgNXi3Zh1d8xCDQzbD+zvbl914w3tzyXbh7YfPEFyJIy+mESvNjlc5L7UOkFyj8BzB0yQGgnE0uZ/OHUXzFahpyc+ZKtz7reMABOkjEOt/39W64SB4w+CpLsM9MNd1EGACVIHHJwigvwVtY1i8P4rG8Pzo08mSJ084S/4yzhNX5b6N+o6Rcup+7R4ZaeZEGCCNIALJHkeTU6EvQozVTai31w3XpoKNPR+mCApMozJ+hiaHQC7FPZ3mO7ybd0dsP90CDBB0uEkQJJ/wi5B83fCDoV9GbYOtgOmsrwAZzfBuDiAABMkYxJAknHYE7Dvwmjp9Wa4oLt+V6EegNHbs6iaKv/BVZ+A3zHUXBxAgAmSMwmYzKOw38BWw+jpi0QYusmRlkn0Ndm0k30bQjkCPp5G/UbhLasIMEEUw48JvhN2H+zrMPq5BCLMEnRzNaza5KdXjStx7nC0N/a9D/THJQUCTJAUIOVpgkk/Avs57HzYwfD1Ftgi2JGwfXFsT9hXYFuxz8UxBJgghhMCImyH/Rr2W5iJd8QMjzCs7pggYeWTR6MYASaIYkB9csexNkaACdIYI25RYASYIAVOPg+9MQJMkMYYcYsCI8AEKXDyeeiNEWCCNMaIW2RHIJgrmCDBpJIHogMBJogOVNlnMAgwQYJJJQ9EBwJMEB2oss9gEGCCBJPKogzE7DiZIGbx5t48Q4AJ4lnCOFyzCDBBzOLNvXmGABPEs4RxuGYRYIKYxZt7cxmBKrExQaqAwocYgRgBJkiMBNeMQBUEmCBVQOFDjECMABMkRoJrRqAKAkyQKqDwIUYgRkAVQWJ/XDMCQSHABAkqnTwY1QgwQVQjyv6CQoAJElQ6eTCqEWCCqEaU/QWFgAcECQpvHoxnCDBBPEsYh2sWASaIWby5N88QYIJ4ljAO1ywCTBCzeHNvniFQbIJ4liwO1zwCTBDzmHOPHiHABPEoWRyqeQSYIOYx5x49QoAJ4lGyOFTzCDBBNGHObsNA4P8AAAD//3YM8s0AAAAGSURBVAMACJJO+r7TVpYAAAAASUVORK5CYII=" />
        </div>
    </div>

    <!-- Navigation Shell -->
    <nav class="sticky top-0 z-50 w-full bg-surface/70 backdrop-blur-xl border-b border-white/10 shadow-sm transition-all h-16 md:h-20">
        <div class="flex justify-between items-center max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop h-full">
            <div class="flex items-center gap-3">
                <img alt="Logo" class="w-8 h-8 md:w-10 md:h-10 object-contain hover:scale-105 transition-all" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAYAAACtWK6eAAAQAElEQVR4Aexda5AcVRW+dzYPSbIPFVALkCIhkbIUSrGAAGJUHhEloEKVP8BKNmwwKFggilqQAoOKoIBgGdhXoAqkylIQLAkgyAoRQQRBfEBIYkFiVFCzj0Ag7m77ncw2zPbOo3v6vvuk7sntx+1zz/3O/XbuN9PTUxL8jxFgBGoiwASpCQ2fYASEYILwLGAE6iDABKkDDp9iBJggPAcYgToIaCRInV75FCPgCQJMEE8SxWHaQYAJYgd37tUTBJggniSKw7SDABPEDu7cqycI+EkQT8DlMP1HgAnifw55BBoRYIJoBJdd+48AE8T/HPIINCLABNEILrv2HwEmSCKHvMsIVCLABKlEg7cZgQQCTJAEILzLCFQiwASpRIO3GYEEAkyQBCC8ywhUIsAEqURD7zZ79xABJoiHSeOQzSHABDGHNffkIQJMEA+TxiGbQ4AJYg5r7slDBJggHiZtash8RBcCTBBdyLLfIBBgggSRRh6ELgSYILqQZb9BIMAECSKNPAhdCDBBdCEbit+Cj4MJUvAJwMOvjwATpD4+fLbgCDBBCj4BePj1EWCC1MeHzxYcASZIwSeAzeH70DcTxIcscYzWEGCCWIOeO/YBASaID1niGK0hwASxBn26jqMo2ge2EPaudFdwK5UIMEFUoqnIF8iwH+wq2ItwuRX2MOwZ7FN5Cv9dAzsJ1orjXKYioOwIE0QZlGocYdIfBk9PwM6D7QVLloNx4IuwO2Hb0f4R2Ldgx8LehGNcFCLABFEIZl5XmOCfhI+HYHvC0pQWNDoc9jXYL2GD8PEA7GLYUbBpOMYlBwJMkBzgqbwUk/lt8PcT2AxYs2UmLlwE+wZsPYxeYe6C7wtg74dxvgFKlsKAZUFLb9uz4V51PubA58dgV8Ieh20GSc6DtWGbSwoEVCckRZfcpAYCXTWOqzy8P5xdBdsGkhyPmksDBKYSpMEFfFo9Apish8LrO2Cmymx09GP0ewBqLnUQYILUAcfgqWMN9hV31Y6Ne0ASIgs2uVRDgAlSDRXzx2wtd+ZjqKfCuNRAgAlSAxhTh/EXnN61OspUf1X6+UyVY3xoAgEmyAQQFit6W5benrUVwnEgaYetzl3v1yhBXAfDUnzHWeo37pY+bNwv3uF6MgLBE6TzrMEPdHYNXt65YnDr8hVDEewl2LrlXUMXLV264+2T4bCyZ5sgNGi634vqKUYYAatVnV1DdwM3wi4iLDuB6ZlnDtK7b1OuCelA0ARBEntlJB+TUl4ohdxnInF7ol4spFjdMmPsH0h2/9KlkZV7mLC0oXeSDkE8NssrwGd7MgDChLAhjIDVpVKKE9CGsMOu3EcC06gkfw+Mu3E82BIkQS65JCp1dg3diiQub5Q5EGdZy4zh2+maRm01nD9Rg8+sLp9KXkBYlGYM30HYJM8l94FxF7C+KXk8lP0gCfLCtuFrpRRZ3p1Z/MK2oV4LSXVheUU3OU4a+pZtwzdJIVK/9QysP4tl2HWTnASyEwpBXk9HZ9fwEiT3868fSLkhhVzWedbwwpTNVTX7uCpHOfzcV3ntsq6RD2H/dFi2IsUXCPtsF7nfOiiCLF++c38hxm9uGvZILGn62owXQn/QNwT3zniZ6uYvwyF9GQtVuUg5dlJ5q5n/x28u56CZa928JiiCRC2v3SGlbPpbdjIaN6kJXFhePQC8xiZPTUl3/04+lHIPvlopBymbe9EsGIJAKK7BMinfO0JSmPzAzAWCTNEfMopy3QpPOcDbwT8UgfwLgiC09pVSfC53TiI5kttHCgdYXtGHcx9N0VR3k0n6gzqLpNxBdU5bSTnJ6cOJy70nSHnNm0N3TE5DFYJMbqBo73D4sX0X7YtSyr8gjkkFryCkSyYda24nDD3iNUEWLYqm0ZoXiW5adySSf29iX9euC8urddUGF8nSlGVXtXaNjlFOKDeUo0ZtXT7vNUHmzh++jta8agCOdrTINvq2nRp39b24QJCqRJgmWi+PRLSzfvjpzlJu5i0YvjZdazdbldwMq3FUy84cOVWq0B0TXUVCXt3dLYcmdrVV0B+z4JyWWKislqqvloSBjErXKIxsJeVKoT+jrkpGe1PUGekOvF/fr8idwF/MpzZvaKMngahyWc8PiXPbj+N5Wkr5Uq0gNz3XuoowqXU+63HKFeUs63UutPeOILSmpbUtEqxEd+Av+ogcm3nywIAcNZSQN5ZXhjqs0k3V5VXcjrAgTAib+FiemnJFOaPc5fFj41rvCKJWdxDkpdP7+vZ4nrYMmfMEIRzKmJSy33JCF1cxX/WIVwSh99alQt2BPK7p72mjR3hiU3/BX2R6lOhB+nuq2wO9Uv6qbouJk4RNFInrJ3ZVVN59PuINQcpr2PHm77NKpJfW2Js2tJ2bOKx714WbE9dLKXelHejm59rOIazStm/czq/PR7wgCK1daQ2LxPqqO+J548XyKg6W6qLrES8IEoDuoLlGZuz5V9RZDasr0KtdU2Q94jxBfNcd8YSD/qCfLbB9e/sgXoUfi2PKUhdVjzhNkEB0RzwPXVhe3R8H00xdRD3iLEEC0h3xXHSBIJmXV3HwVBdRjzhLkIB0h8Dyim5vX0STzLLlIgjFXjQ94iRBQtEdNKEm7BjUNp+eiO7FFuiPzbSR00SR9IhzBAlMd8Rz0YXlVdXb2+MAs9ZF0SNOESRA3RHPOxcIknt5FQ+G6qLoEacIEpLuoElEBv1BT0+0/YjOCLEoJQj8iSLoEWcIEqDuoDlERq8ekjYs2uPQH1q+6xK6HnGCIIHqjpgPRJB421at/NWjciDq9Ejs1Z37tawTJGDdEWe76edMxQ4U1FoJErIesU6QEHVHPKGhP+Zh2/Zvb7yGGB6EaS2h6hGrBAlYd8ST0YWbEwegPxJPT4zDU1uHqEesESRw3RHPvOD1RzzQuA5Nj1ghSAF0Rzxf6AEN8batWqv+SA7KWT2SDDTlvhWChKw7YtyhPw7Dtsln/aK7KYWenvjHKUc1HwhJjxgnSAF0Rzz9XNAfU569Gwenuw5FjxglSEF0Rzz3Cqc/4oHHdQh6xBhBCqQ76Pb2GZgkR8Nsl1/YDCAEPWKMIEXQHRWTkcS57acnPoO3d2s+PbEiVq2bvuuRNATJDWCBdEeMlQv6w+i7V/HAq9U+6xHtBCmY7ojnR+H1RwxEXPuqR7QSpEi6I54IeHuXnp743njfUk1PT8z1gAbVcfuqR7QSZO78ocukkIeoArtUallaXtOq8qjFzwlavGZz+ij0xyvZLtHfmnJHOVTVE82tefNHtD6VXxtBli17ZT8k6XxVYMDPmt4bWm9D7Xph/VEnQ5RDpc/7ldEF5WV8nU5znNJGEDlt1/cR13RYnZLuFD0b1sJzdNMFN7VV8Le3Tx1ytiOK9cj0qLTrimwRpG+thSCnnRa1CCFPEQr+YU1v+vc7mo4asb4bF9t+eiL9COejiMPZolqPYKCnleccthQXLQTp6BiZJ6WQamI1/vsdecJ24d2r+6WURm5vzwMU6REh1Pz+iJRCzn7rq1q+d6OFIKOj05T8CCTWqq+WStL2B25Z5gHrjwxoUW4pxxkuqdl02uiYkjmX7EALQdaunbVFROK/yc6y7uMvw5vGx8du1CnCssZUqz2WV1hWig/XOm/wuDMfENYbM+WUcks5rtcuzTlgP9jbO+dfadpmbaOFIBREJMWtVOc1KWUr/TYIfaaSyZf5xkeiy9kwm4Vub3/WZgBp+qZcUk4pt2naN2qDFdbaRm2aPa+NIKXxltWqXj4BwCHzFgxf2+wgDV3ngv6wenNiWpxV3pdHc2zntGh12r6zttNGkN0veVJekzWgOu1XdnaNfLrOedunWH+kyADlUKr8nUkprvzRmo7tKbpuqok2glA0mze0XkyfYdC2GhtbS2tXNb7UecEaeBa8HQGzXe6yHUC9/su5G1O2HKK5tXlDm5+fpBNQqt/vlu7qkeMxXgmzWZ4EPlqenqhiUKp1B/4oGfl8TOsrCAGr8v1u8ieFtK5HKI6EuaA/rH29NoFF1V2VuqPcgZnPx7QThAbj8/cBKP4UdmyKNrqbOPv2bmfX8BKpUncIsYbmlG5Ayb8RglBHiu+/gUs3nt+Kl/p9EcwCmM1CT08csBlArb7LumP85lrnsx4n3WHyvjxjBBkYkKNybObJmFAjWUGp1l66o0dcuL19PfDYVQ0nm8d81R2VmBkjCHUaqB5h/UHJrWK+6o7KoRglCHVMa0d8uHM9bSsyfD4yvESRr2bcqHwFaaZ/usY5/eGz7iBAYzNOEOo4FD2C5eL7MB7bT08cxPLqccThTPFdd1QCaYUgAekRF5ZX91Ym1PZ2CLqjEkMrBKEAAtEjLhDEqc8/QtAdND9js0YQCsBnPYLlFT098YM0Dsum9Oed84wlFN1RiYFVglAgHuuRYxD/TJjNshH6Y2u6APS2Ckl3VCJlnSAe6xEXlldOvHsVmu5wiiAUjKd6xAWCOKE/QtMdNCdjs/4KEgfikx6B/mhH3PQWLyprJULPd8OslhB1RyWgzhCEgvJIjyymeC3b76A/rD49MVTdUZlXpwjikR5xYXllVX9M0h2VM6rJbbwqG/l+R9bwnCIIBe+JHqEvSFG4Ns2q/ghZd1Qm1TmCUHAu6xH8pZuPGLU8pAx+0xa6vX192saq24WuOyrxcpIgFKDDesSF5ZW1pycWQXfQ/IvNWYI4rEdcIIgV/VEU3RGTg2pnCULBOapHXCCIFf1hQ3fQPLBpThOEgHFJj0B/0KN9XHh64p8IG5NWJN1RiavzBKFgHdIjLrx63EOYmLSi6Y5KbL0giEN6xAWCGNUfRdQd3hGEAratR7C8oqcnLqRYLJvR20uKqDsq8+vFK0gcsGU9Qj9tYPu3Sv4spXwpxkN3HbjuSAWfVwShEVnUI4VaXhVZd9A8i807gljUI4UhSNF1R0wOqr0jCAVNeqRUallK2yqMnvc7d8Hwqlq+oD/2wjn6gU5U1sooeh6AaS+EBWGiqiPKFeVMlT+TfrwkCAHUe0PrbSqfryVFdN4ZZ0S1PuNw4aedH4b+0H57+4oVUTthQRgrsjWUK0W+jLvxliCElFo9IudM32P4fPJbxQqzvBoVw18SQs4RCv6Zfo6ugpCnuGiOIFPc2DkwoPp5v5GoRQQXbm838vmHrI1BpiRjWerk9zsyDQKNvSYI4hfltW3pdNrOa5GM2pI+kOj34NjeMJvlZSyvHjURQCTFFAya69fM73c0F1v6q7wnCA1V4ecjreQvYbVeVRLNtO4afHpiVA2DrIMz9vsdWQPL2j4IgtCg+3vaV4ooepK2mzUsL4arXOsCQYwsrybGPjhRN1chB33d7Wc3d7F7VwVDkN3Qjs88BUuiHL8/In+628/Ef/DVgs2PwGwXgwSZjEGWgQOvEYEcZLnG9bbOESQPYHn1iIxm3JLo/2js23564hboj42Iw0iRYyKJQYZ+w9AdlQMOiiA0sP6etjujSFxH21kMxDor0AAABA9JREFUf/2+09u7x98S17iwvDJ6e3tfX/tGvD37vQQODXcJc8K+YUPPGgRHEMK/v6f9XBGJH9B2GgM5bu/v6fhqlbYuEMTg8qqMQH93xwXAZNJys3ym5v8Q5cC85ml/TwRJEEpHX0/7OSDJxbRdz/CX7xaQ41M12ti+vSRCXEZfQdDf7gJMTiVsdu/U/U9eGJIoTw41WILQQEGSy6JReZAYF9/EO1wTy6eIbtfYhOSvk+NiIV5tqn6Ggr+g0+FDySfK8NNs+QP0x1CzF+e9jrAhjIAVkXQTll47J3xiW6wek2JBX3fbFRPHgqyCJghlrL+/7dm+3vaL+no65vZ1t8u+7o7ZqA9E8k/s7W1/hNrUMLpBscYpY4eNL6+SIyOMgNXi3Zh1d8xCDQzbD+zvbl914w3tzyXbh7YfPEFyJIy+mESvNjlc5L7UOkFyj8BzB0yQGgnE0uZ/OHUXzFahpyc+ZKtz7reMABOkjEOt/39W64SB4w+CpLsM9MNd1EGACVIHHJwigvwVtY1i8P4rG8Pzo08mSJ084S/4yzhNX5b6N+o6Rcup+7R4ZaeZEGCCNIALJHkeTU6EvQozVTai31w3XpoKNPR+mCApMozJ+hiaHQC7FPZ3mO7ybd0dsP90CDBB0uEkQJJ/wi5B83fCDoV9GbYOtgOmsrwAZzfBuDiAABMkYxJAknHYE7Dvwmjp9Wa4oLt+V6EegNHbs6iaKv/BVZ+A3zHUXBxAgAmSMwmYzKOw38BWw+jpi0QYusmRlkn0Ndm0k30bQjkCPp5G/UbhLasIMEEUw48JvhN2H+zrMPq5BCLMEnRzNaza5KdXjStx7nC0N/a9D/THJQUCTJAUIOVpgkk/Avs57HzYwfD1Ftgi2JGwfXFsT9hXYFuxz8UxBJgghhMCImyH/Rr2W5iJd8QMjzCs7pggYeWTR6MYASaIYkB9csexNkaACdIYI25RYASYIAVOPg+9MQJMkMYYcYsCI8AEKXDyeeiNEWCCNMaIW2RHIJgrmCDBpJIHogMBJogOVNlnMAgwQYJJJQ9EBwJMEB2oss9gEGCCBJPKogzE7DiZIGbx5t48Q4AJ4lnCOFyzCDBBzOLNvXmGABPEs4RxuGYRYIKYxZt7cxmBKrExQaqAwocYgRgBJkiMBNeMQBUEmCBVQOFDjECMABMkRoJrRqAKAkyQKqDwIUYgRkAVQWJ/XDMCQSHABAkqnTwY1QgwQVQjyv6CQoAJElQ6eTCqEWCCqEaU/QWFgAcECQpvHoxnCDBBPEsYh2sWASaIWby5N88QYIJ4ljAO1ywCTBCzeHNvniFQbIJ4liwO1zwCTBDzmHOPHiHABPEoWRyqeQSYIOYx5x49QoAJ4lGyOFTzCDBBNGHObsNA4P8AAAD//3YM8s0AAAAGSURBVAMACJJO+r7TVpYAAAAASUVORK5CYII=" />
                <span class="font-display text-[20px] md:text-headline-md font-bold text-primary"><?= esc($pengaturan['nama_situs']) ?></span>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex gap-8 items-center">
                <a class="font-body-md text-body-md <?= $activePage === 'beranda' ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary' ?> transition-all duration-200" href="<?= base_url('/') ?>">Beranda</a>
                <a class="font-body-md text-body-md <?= $activePage === 'portofolio' ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary' ?> transition-all duration-200" href="<?= base_url('/portofolio') ?>">Portofolio</a>
                <a class="font-body-md text-body-md <?= $activePage === 'tentang' ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary' ?> transition-all duration-200" href="<?= base_url('tentang') ?>">Tentang</a>
            </div>

            <div class="flex items-center gap-3">
                <!-- Hire Me button - hidden on small mobile, shown from sm up -->
                <a href="<?= $hireMeUrl ?>" <?= $hireMeTarget ?> class="btn-primary text-white px-4 py-2 sm:px-6 sm:py-2 rounded-full font-label-md text-[12px] sm:text-label-md flex items-center gap-2 hidden sm:flex">
                    Hire Me
                    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                </a>

                <!-- Hamburger Button - visible on mobile only -->
                <button class="hamburger md:hidden flex flex-col gap-[5px] p-2 -mr-2" id="hamburgerBtn" aria-label="Toggle menu">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay md:hidden" id="mobileOverlay"></div>

    <!-- Mobile Slide-in Menu -->
    <div class="mobile-menu md:hidden" id="mobileMenu">
        <div class="p-6 border-b border-white/10 flex items-center justify-between">
            <span class="font-display text-[18px] font-bold text-primary">Menu</span>
            <button class="p-2 text-on-surface-variant hover:text-primary transition-colors" id="closeMenuBtn" aria-label="Close menu">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <nav class="p-4 space-y-1">
            <a class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-body-md <?= $activePage === 'beranda' ? 'text-primary bg-primary/10 font-bold' : 'text-on-surface-variant' ?>" href="<?= base_url('/') ?>">
                <span class="material-symbols-outlined text-[20px]">home</span>
                Beranda
            </a>
            <a class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-body-md <?= $activePage === 'portofolio' ? 'text-primary bg-primary/10 font-bold' : 'text-on-surface-variant' ?>" href="<?= base_url('/portofolio') ?>">
                <span class="material-symbols-outlined text-[20px]">folder_special</span>
                Portofolio
            </a>
            <a class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-body-md <?= $activePage === 'tentang' ? 'text-primary bg-primary/10 font-bold' : 'text-on-surface-variant' ?>" href="<?= base_url('tentang') ?>">
                <span class="material-symbols-outlined text-[20px]">person</span>
                Tentang
            </a>
        </nav>
        <div class="p-4 mt-2">
            <a href="<?= $hireMeUrl ?>" <?= $hireMeTarget ?> class="btn-primary text-white w-full py-3.5 rounded-xl font-label-md flex items-center justify-center gap-2">
                Hire Me
                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
            </a>
        </div>
    </div>

    <!-- Mobile Menu Script -->
    <script>
        (function() {
            const hamburger = document.getElementById('hamburgerBtn');
            const menu = document.getElementById('mobileMenu');
            const overlay = document.getElementById('mobileOverlay');
            const closeBtn = document.getElementById('closeMenuBtn');

            function openMenu() {
                hamburger.classList.add('active');
                menu.classList.add('active');
                overlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            }

            function closeMenu() {
                hamburger.classList.remove('active');
                menu.classList.remove('active');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }

            if (hamburger) hamburger.addEventListener('click', openMenu);
            if (closeBtn) closeBtn.addEventListener('click', closeMenu);
            if (overlay) overlay.addEventListener('click', closeMenu);

            // Close on nav link click
            menu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', closeMenu);
            });
        })();
    </script>