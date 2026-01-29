<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$flash = flash_get();
$authUser = $_SESSION['auth_user'] ?? null;
$loginUrl = absolute_url('index.php?route=login');
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= h($title ?? 'Sistema de Gestión') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f7fb;
        }
        .app-hero {
            background: linear-gradient(120deg, #1c6dd0 0%, #5e72e4 100%);
            color: #fff;
            border-radius: 1rem;
            padding: 2rem;
        }
        .app-card {
            border: 0;
            border-radius: 1rem;
        }
        .app-card .icon-wrap {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(94, 114, 228, 0.12);
            color: #3c4fd8;
            font-size: 1.4rem;
        }
        .app-action {
            border-radius: 999px;
            padding-inline: 1.25rem;
        }
    </style>
</head>
<body class="bg-light">
<header class="bg-white border-bottom shadow-sm">
    <nav class="navbar navbar-expand-lg container py-3">
        <a class="navbar-brand fw-semibold" href="<?= h(absolute_url('index.php?route=dashboard')) ?>">Boutique CRUD</a>
        <div class="ms-auto d-flex align-items-center gap-3">
            <?php if ($authUser): ?>
                <span class="text-muted small">Conectado como <?= h($authUser) ?></span>
                <a class="btn btn-outline-secondary btn-sm" href="<?= h(absolute_url('index.php?route=logout')) ?>">
                    <i class="bi bi-box-arrow-right me-1"></i>Salir
                </a>
            <?php else: ?>
                <a class="btn btn-primary btn-sm" href="<?= h($loginUrl) ?>">
                    <i class="bi bi-shield-lock me-1"></i>Iniciar sesión
                </a>
            <?php endif; ?>
        </div>
    </nav>
</header>
<main class="container py-4">
    <h1 class="h3 mb-3"><?= h($title ?? '') ?></h1>
    <?php if ($flash): ?>
        <div class="alert alert-<?= h($flash['type']) ?> alert-dismissible fade show" role="alert">
            <?= h($flash['message']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
