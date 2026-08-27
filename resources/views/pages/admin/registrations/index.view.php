<?php

/**
 * Regisztrációk listája.
 *   controller : App\Http\Controllers\Admin\RegistrationController::index()
 *   stílus     : resources/css/admin.css
 *
 * @var \Illuminate\Pagination\LengthAwarePaginator $registrations
 * @var array $filters   ['status'=>?, 'type'=>?, 'mode'=>?, 'q'=>?]
 * @var array $stats
 * @var array $statusOptions
 * @var array $typeOptions
 * @var array $modeOptions
 * @var array $statCards
 * @var string $exportUrl
 */
?>

<header class="admin-header">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
                <span class="admin-eyebrow">✦ Regisztrációk</span>
                <h1 class="admin-title">Jelentkezések kezelése</h1>
                <p class="admin-subtitle">
                    Összesen <?= (int) $stats['total'] ?> jelentkezés &mdash;
                    <?= (int) $stats['pending'] ?> vár elbírálásra
                </p>
            </div>
            <a href="<?= e($exportUrl) ?>" class="admin-header-btn">CSV export</a>
        </div>
    </div>
</header>

<div class="container py-4">

    <!-- Számok / gyorsszűrők -->
    <div class="admin-stats mb-4">
        <?php foreach ($statCards as $card): ?>
            <a href="<?= e($card['url']) ?>"
               class="admin-stat<?= $card['active'] ? ' is-active' : '' ?>">
                <span class="admin-stat-label"><?= e($card['label']) ?></span>
                <span class="admin-stat-value <?= e($card['tone']) ?>"><?= (int) $card['value'] ?></span>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- Szűrő -->
    <div class="admin-card mb-4">
        <div class="admin-card-body">
            <form class="admin-filters" method="GET" action="/admin/registrations">
                <div class="flex-grow-1" style="min-width: 220px;">
                    <label class="form-label" for="f-q">Keresés</label>
                    <input class="form-control form-control-sm" id="f-q" type="search" name="q"
                           value="<?= e((string) $filters['q']) ?>"
                           placeholder="Név, e-mail, cég vagy azonosító">
                </div>

                <div>
                    <label class="form-label" for="f-status">Státusz</label>
                    <select class="form-select form-select-sm" id="f-status" name="status">
                        <?php foreach ($statusOptions as $value => $label): ?>
                            <option value="<?= e((string) $value) ?>"
                                <?= (string) $filters['status'] === (string) $value ? 'selected' : '' ?>>
                                <?= e($label) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="form-label" for="f-type">Típus</label>
                    <select class="form-select form-select-sm" id="f-type" name="type">
                        <?php foreach ($typeOptions as $value => $label): ?>
                            <option value="<?= e((string) $value) ?>"
                                <?= (string) $filters['type'] === (string) $value ? 'selected' : '' ?>>
                                <?= e($label) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="form-label" for="f-mode">Részvétel</label>
                    <select class="form-select form-select-sm" id="f-mode" name="mode">
                        <?php foreach ($modeOptions as $value => $label): ?>
                            <option value="<?= e((string) $value) ?>"
                                <?= (string) $filters['mode'] === (string) $value ? 'selected' : '' ?>>
                                <?= e($label) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-sm btn-dark" type="submit">Szűrés</button>
                    <a class="btn btn-sm btn-outline-secondary" href="/admin/registrations">Törlés</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Lista -->
    <div class="admin-card">
        <div class="admin-card-head">Jelentkezések</div>

        <?php if ($registrations->total() === 0): ?>
            <p class="admin-empty">Nincs a szűrésnek megfelelő regisztráció.</p>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table admin-table">
                    <thead>
                        <tr>
                            <th>Azonosító</th>
                            <th>Jelentkező</th>
                            <th>Típus</th>
                            <th>Részvétel</th>
                            <th>Beküldve</th>
                            <th>Státusz</th>
                            <th class="text-end">Művelet</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($registrations as $registration): ?>
                            <tr>
                                <td class="admin-ref"><?= e($registration->reference) ?></td>
                                <td>
                                    <div class="admin-name"><?= e($registration->name) ?></div>
                                    <div class="admin-email"><?= e($registration->email) ?></div>
                                    <div class="admin-email"><?= e($registration->company) ?></div>
                                </td>
                                <td><?= e($registration->typeLabel()) ?></td>
                                <td><?= e($registration->modeLabel()) ?></td>
                                <td><?= e($registration->created_at?->format('Y.m.d. H:i') ?? '') ?></td>
                                <td>
                                    <span class="badge <?= e($registration->statusBadge()) ?>">
                                        <?= e($registration->statusLabel()) ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="admin-actions">
                                        <?php if ($registration->isPending()): ?>
                                            <form method="POST"
                                                  action="/admin/registrations/<?= (int) $registration->id ?>/approve">
                                                <?= csrf() ?>
                                                <input type="hidden" name="from" value="index">
                                                <?php require base_path('resources/views/pages/admin/registrations/_filter-fields.view.php'); ?>
                                                <button class="btn btn-sm btn-success" type="submit">Elfogad</button>
                                            </form>
                                            <form method="POST"
                                                  action="/admin/registrations/<?= (int) $registration->id ?>/reject">
                                                <?= csrf() ?>
                                                <input type="hidden" name="from" value="index">
                                                <?php require base_path('resources/views/pages/admin/registrations/_filter-fields.view.php'); ?>
                                                <button class="btn btn-sm btn-outline-danger" type="submit">Elutasít</button>
                                            </form>
                                        <?php endif; ?>
                                        <a class="btn btn-sm btn-outline-secondary"
                                           href="/admin/registrations/<?= (int) $registration->id ?>">Részletek</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="admin-card-body pt-0">
                <?php paginate($registrations); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
