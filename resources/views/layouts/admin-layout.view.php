<?php

/**
 * Admin layout.
 *
 * A téma (light/dark) az admin beállításából jön.
 * Opcionális controller adat: 'styles', 'scripts' (extra asset lista).
 */

$adminId       = $_SESSION['admin_id'] ?? null;
$adminSettings = $adminId ? \App\Models\AdminSettings::where('admin_id', $adminId)->first() : null;
$theme         = $adminSettings->theme ?? 'light';
?>
<!doctype html>
<html lang="hu" data-theme="<?= e($theme) ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title ?? 'Admin') ?> &middot; ZeroDay 2026</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            prefix: 'tw-',
            corePlugins: { preflight: false }
        };
    </script>

    <link rel="stylesheet" href="/resources/css/admin.css">
    <link rel="stylesheet" href="/resources/css/toast.css">

    <?php foreach (($styles ?? []) as $style): ?>
        <link rel="stylesheet" href="<?= e($style) ?>">
    <?php endforeach; ?>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Toast notifications -->
    <div class="toast-container position-fixed top-0 end-0 p-3 tw-z-[1090]">
        <?php require base_path('resources/views/components/toast.view.php'); ?>
    </div>

    <?php require base_path('resources/views/components/admin-navbar.view.php'); ?>

    <main class="flex-grow-1">
        <?= $content ?? '' ?>
    </main>

    <!-- Alert overlay -->
    <div class="alert-container position-fixed bottom-0 start-50 translate-middle-x p-3 tw-w-2/4 tw-z-[1080]">
        <?php require base_path('resources/views/components/alert.view.php'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/resources/js/admin.js" defer></script>

    <?php foreach (($scripts ?? []) as $script): ?>
        <script src="<?= e($script) ?>" defer></script>
    <?php endforeach; ?>

    <script type="module" src="/resources/js/main.js"></script>
</body>

</html>
