<?php

/**
 * Admin navbar.
 *   stílus    : resources/css/admin.css (2. blokk)
 *   viselkedés: resources/js/admin.js
 */

if (!checkAuth('admin')) {
    return;
}

$admin = \App\Models\Admin::find($_SESSION['admin_id'] ?? 0);

$adminMenu = [
    ['href' => '/admin/dashboard',      'label' => 'Dashboard'],
    ['href' => '/admin/registrations',  'label' => 'Regisztrációk'],
    ['href' => '/admin/settings',       'label' => 'Beállítások'],
];
?>

<nav id="adminNavbar" class="navbar navbar-expand-lg admin-nav" aria-label="Admin menü">
    <div class="container">

        <a class="navbar-brand admin-brand" href="/admin/dashboard">
            <span class="admin-brand-mark" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="white" viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                </svg>
            </span>
            <span class="admin-brand-text">ZeroDay Admin</span>
        </a>

        <button class="navbar-toggler border-0 shadow-none admin-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#adminNavCollapse"
                aria-controls="adminNavCollapse" aria-expanded="false" aria-label="Menü">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="adminNavCollapse">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-1">
                <?php foreach ($adminMenu as $item): ?>
                    <li class="nav-item">
                        <a class="nav-link admin-nav-link" href="<?= e($item['href']) ?>">
                            <?= e($item['label']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="d-flex align-items-center gap-3">
                <div class="admin-badge d-none d-lg-flex">
                    <div class="admin-badge-mark" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="white" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="admin-badge-name"><?= e($admin?->name ?? 'Admin') ?></div>
                        <div class="admin-badge-role">Adminisztrátor</div>
                    </div>
                </div>

                <form method="POST" action="/admin/logout" class="m-0">
                    <?= csrf() ?>
                    <button type="submit" class="btn btn-sm admin-logout">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>
                        Kilépés
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
