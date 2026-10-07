<!doctype html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($title ?? 'PMVC', ENT_QUOTES, 'UTF-8') ?></title>
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
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
            background: #f8fafc;
            min-height: 100vh;
        }
        main {
            flex: 1 0 auto;
        }
        footer {
            flex-shrink: 0;
        }
    </style>
</head>

<body>

    <!-- Toast notifications -->
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1090;">
        <?php require base_path('resources/views/components/toast.view.php'); ?>
    </div>

    <!-- Navbar -->
    <?php require base_path('resources/views/components/navbar.view.php'); ?>

    <!-- Page content -->
    <main>
        <?= $content ?? '' ?>
    </main>

    <!-- Footer -->
    <?php require base_path('resources/views/components/footer.view.php'); ?>

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
