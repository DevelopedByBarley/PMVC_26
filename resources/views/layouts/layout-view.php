<?php

/**
 * Publikus layout.
 *
 * A controller opcionálisan átadhatja:
 *   'styles'  => ['/resources/css/valami.css']   – oldal specifikus stílus
 *   'scripts' => ['/resources/js/valami.js']     – oldal specifikus szkript (defer)
 */

$lang = \Core\Language::current();
?>
<!doctype html>
<html lang="<?= e($lang) ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title ?? 'ZeroDay 2026') ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            prefix: 'tw-',
            corePlugins: { preflight: false }
        };
    </script>

    <link rel="stylesheet" href="/resources/css/toast.css">

    <?php foreach (($styles ?? []) as $style): ?>
        <link rel="stylesheet" href="<?= e($style) ?>">
    <?php endforeach; ?>
</head>

<body>

    <!-- Toast notifications -->
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1090;">
        <?php require base_path('resources/views/components/toast.view.php'); ?>
    </div>

    <?php require base_path('resources/views/components/navbar.view.php'); ?>

    <main id="main">
        <?= $content ?? '' ?>
    </main>

    <?php require base_path('resources/views/components/footer.view.php'); ?>

    <!-- Alert overlay -->
    <div class="alert-container position-fixed bottom-0 start-50 translate-middle-x p-3 tw-w-2/4" style="z-index: 1080;">
        <?php require base_path('resources/views/components/alert.view.php'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <?php foreach (($scripts ?? []) as $script): ?>
        <script src="<?= e($script) ?>" defer></script>
    <?php endforeach; ?>

    <script type="module" src="/resources/js/main.js"></script>
</body>

</html>
