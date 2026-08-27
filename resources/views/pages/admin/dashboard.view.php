<?php

/**
 * Admin dashboard.
 *   controller : App\Http\Controllers\Admin\AdminController::index()
 *   stílus     : resources/css/admin.css
 *
 * @var string $adminName
 * @var array $stats
 * @var array $statCards
 * @var \Illuminate\Database\Eloquent\Collection $recent
 */
?>

<header class="admin-header">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
                <span class="admin-eyebrow">✦ Admin Panel</span>
                <h1 class="admin-title">Üdv, <?= e($adminName) ?>!</h1>
                <p class="admin-subtitle"><?= date('Y. m. d.') ?> &mdash; ZeroDay 2026 áttekintés</p>
            </div>
            <a href="/admin/registrations" class="admin-header-btn">Regisztrációk kezelése</a>
        </div>
    </div>
</header>

<div class="container py-4">

    <div class="admin-stats mb-4">
        <?php foreach ($statCards as $card): ?>
            <a href="<?= e($card['url']) ?>" class="admin-stat">
                <span class="admin-stat-label"><?= e($card['label']) ?></span>
                <span class="admin-stat-value <?= e($card['tone']) ?>"><?= (int) $card['value'] ?></span>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="row g-4">
        <!-- Legutóbbi jelentkezések -->
        <div class="col-lg-8">
            <div class="admin-card">
                <div class="admin-card-head d-flex justify-content-between align-items-center">
                    <span>Legutóbbi jelentkezések</span>
                    <a class="btn btn-sm btn-outline-secondary" href="/admin/registrations">Összes</a>
                </div>

                <?php if ($recent->isEmpty()): ?>
                    <p class="admin-empty">Még nem érkezett regisztráció.</p>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table admin-table">
                            <thead>
                                <tr>
                                    <th>Azonosító</th>
                                    <th>Jelentkező</th>
                                    <th>Típus</th>
                                    <th>Beküldve</th>
                                    <th>Státusz</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent as $registration): ?>
                                    <tr>
                                        <td class="admin-ref">
                                            <a href="/admin/registrations/<?= (int) $registration->id ?>"
                                               class="text-decoration-none">
                                                <?= e($registration->reference) ?>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="admin-name"><?= e($registration->name) ?></div>
                                            <div class="admin-email"><?= e($registration->email) ?></div>
                                        </td>
                                        <td><?= e($registration->typeLabel()) ?></td>
                                        <td><?= e($registration->created_at?->format('m.d. H:i') ?? '') ?></td>
                                        <td>
                                            <span class="badge <?= e($registration->statusBadge()) ?>">
                                                <?= e($registration->statusLabel()) ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Megoszlás -->
        <div class="col-lg-4">
            <div class="admin-card">
                <div class="admin-card-head">Elfogadott jelentkezők megoszlása</div>
                <div class="admin-card-body">
                    <dl class="admin-detail-rows">
                        <div>
                            <dt>Helyszíni</dt>
                            <dd><?= (int) $stats['in_person'] ?></dd>
                        </div>
                        <div>
                            <dt>Online</dt>
                            <dd><?= (int) $stats['online'] ?></dd>
                        </div>
                        <div>
                            <dt>Előadói jelentkezés</dt>
                            <dd><?= (int) $stats['speakers'] ?></dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
