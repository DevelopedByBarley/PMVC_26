<?php
    $adminId       = $_SESSION['admin_id'] ?? null;
    $adminSettings = $adminId ? \App\Models\AdminSettings::where('admin_id', $adminId)->first() : null;
    $theme         = $adminSettings->theme ?? 'light';
?>
<!doctype html>
<html lang="hu" data-theme="<?= $theme ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($title ?? 'Admin | PMVC', ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            prefix: 'tw-',
            corePlugins: {
                preflight: false
            }
        };
    </script>
    <style>
        :root {
            --bg-body:   #f8fafc;
            --bg-card:   #ffffff;
            --text-main: #0f172a;
            --text-muted:#64748b;
            --border:    #e2e8f0;
        }
        [data-theme="dark"] {
            --bg-body:   #0f172a;
            --bg-card:   #1e293b;
            --text-main: #f1f5f9;
            --text-muted:#94a3b8;
            --border:    #334155;
        }
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: var(--bg-body);
            color: var(--text-main);
            transition: background 0.3s, color 0.3s;
        }
        main {
            flex: 1 0 auto;
        }
        [data-theme="dark"] .card {
            background: var(--bg-card) !important;
            border-color: var(--border) !important;
        }
        [data-theme="dark"] .table {
            color: var(--text-main);
        }
        [data-theme="dark"] .table thead tr {
            background: #263348 !important;
        }
        [data-theme="dark"] .form-select,
        [data-theme="dark"] .form-control {
            background: #1e293b;
            color: var(--text-main);
            border-color: var(--border);
        }
        [data-theme="dark"] .form-select option {
            background: #1e293b;
        }
    </style>
</head>

<body>

    <!-- Toast notifications -->
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1090;">
        <?php require base_path('resources/views/components/toast.view.php'); ?>
    </div>

    <!-- Admin Navbar -->
    <?php require base_path('resources/views/components/admin-navbar.view.php'); ?>

    <!-- Page content -->
    <main>
        <?= $content ?? '' ?>
    </main>

    <!-- Alert overlay -->
    <div class="alert-container position-fixed bottom-0 start-50 translate-middle-x p-3 tw-w-2/4" style="z-index: 1080;">
        <?php require base_path('resources/views/components/alert.view.php'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (!window.bootstrap || !window.bootstrap.Toast) return;
            document.querySelectorAll('.toast').forEach(function(element) {
                var toast = window.bootstrap.Toast.getOrCreateInstance(element);
                toast.show();
            });
        });
    </script>
    <script type="module" src="/resources/js/main.js"></script>
</body>

</html>
