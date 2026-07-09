<?php
$activePage = $activePage ?? 'ringkasan';
$pageTitle  = $pageTitle ?? 'Ringkasan';
?>
<!DOCTYPE html>
<html class="dark" lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Portal Portofolio - <?= esc($pageTitle) ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;900&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/admin-main.css') ?>" />
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
                        "background": "#131313",
                        "primary": "#c0c1ff",
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
                    },
                    "spacing": {
                        "margin-desktop": "64px",
                        "margin-mobile": "20px"
                    }
                },
            },
        }
    </script>
</head>

<body class="min-h-screen">