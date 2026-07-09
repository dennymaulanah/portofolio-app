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
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;900&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/tailwind.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/admin-main.css') ?>" />
</head>

<body class="min-h-screen">