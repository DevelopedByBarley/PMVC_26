<?php

/**
 * Egy regisztráció részletei + döntés.
 *   controller : App\Http\Controllers\Admin\RegistrationController::show()
 *   stílus     : resources/css/admin.css
 *
 * @var \App\Models\Registration $registration
 * @var \Illuminate\Support\Collection $events
 * @var array $rows
 */
?>

<header class="admin-header">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
                <span class="admin-eyebrow">✦ <?= e($registration->reference) ?></span>
                <h1 class="admin-title"><?= e($registration->name) ?></h1>
                <p class="admin-subtitle">
                    <?= e($registration->typeLabel()) ?> &middot;
                    <?= e($registration->modeLabel()) ?> &middot;
                    beküldve: <?= e($registration->created_at?->format('Y.m.d. H:i') ?? '') ?>
                </p>
            </div>
            <a href="/admin/registrations" class="admin-header-btn">&larr; Vissza a listához</a>
        </div>
    </div>
</header>

<div class="container py-4">
    <div class="row g-4">

        <!-- Adatok -->
        <div class="col-lg-7">
            <div class="admin-card mb-4">
                <div class="admin-card-head d-flex justify-content-between align-items-center">
                    <span>Jelentkezési adatok</span>
                    <span class="badge <?= e($registration->statusBadge()) ?>">
                        <?= e($registration->statusLabel()) ?>
                    </span>
                </div>
                <div class="admin-card-body">
                    <dl class="admin-detail-rows">
                        <?php foreach ($rows as $row): ?>
                            <div>
                                <dt><?= e($row['label']) ?></dt>
                                <dd><?= e($row['value']) ?></dd>
                            </div>
                        <?php endforeach; ?>
                    </dl>
                </div>
            </div>

            <!-- Belső megjegyzés -->
            <div class="admin-card">
                <div class="admin-card-head">Belső megjegyzés</div>
                <div class="admin-card-body">
                    <form method="POST" action="/admin/registrations/<?= (int) $registration->id ?>/note">
                        <?= csrf() ?>
                        <textarea class="form-control form-control-sm mb-2" name="note" rows="3"
                                  placeholder="Csak az adminok látják."><?= e((string) $registration->admin_note) ?></textarea>
                        <button class="btn btn-sm btn-dark" type="submit">Megjegyzés mentése</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Döntés + idővonal -->
        <div class="col-lg-5">
            <div class="admin-card mb-4">
                <div class="admin-card-head">Döntés</div>
                <div class="admin-card-body">
                    <?php if ($registration->isPending()): ?>
                        <p class="admin-subtitle mb-3" style="color: var(--text-muted);">
                            Az indoklás bekerül a naplóba, és a jelentkezőnek kiküldött levélbe.
                        </p>

                        <form method="POST" action="/admin/registrations/<?= (int) $registration->id ?>/approve">
                            <?= csrf() ?>
                            <input type="hidden" name="from" value="show">
                            <textarea class="form-control form-control-sm mb-2" name="reason" rows="2"
                                      placeholder="Megjegyzés az elfogadáshoz (opcionális)"></textarea>
                            <button class="btn btn-success w-100 mb-3" type="submit">Regisztráció elfogadása</button>
                        </form>

                        <form method="POST" action="/admin/registrations/<?= (int) $registration->id ?>/reject">
                            <?= csrf() ?>
                            <input type="hidden" name="from" value="show">
                            <textarea class="form-control form-control-sm mb-2" name="reason" rows="2"
                                      placeholder="Elutasítás indoklása (opcionális)"></textarea>
                            <button class="btn btn-outline-danger w-100" type="submit">Regisztráció elutasítása</button>
                        </form>
                    <?php else: ?>
                        <dl class="admin-detail-rows mb-3">
                            <div>
                                <dt>Elbírálta</dt>
                                <dd><?= e($registration->reviewer?->name ?? '—') ?></dd>
                            </div>
                            <div>
                                <dt>Elbírálás ideje</dt>
                                <dd><?= e($registration->reviewed_at?->format('Y.m.d. H:i') ?? '—') ?></dd>
                            </div>
                            <?php if ($registration->decision_reason): ?>
                                <div>
                                    <dt>Indoklás</dt>
                                    <dd><?= e((string) $registration->decision_reason) ?></dd>
                                </div>
                            <?php endif; ?>
                        </dl>

                        <form method="POST" action="/admin/registrations/<?= (int) $registration->id ?>/revert">
                            <?= csrf() ?>
                            <input type="hidden" name="from" value="show">
                            <button class="btn btn-sm btn-outline-warning w-100" type="submit">
                                Visszaállítás elbírálásra
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Idővonal -->
            <div class="admin-card mb-4">
                <div class="admin-card-head">Előzmények</div>
                <div class="admin-card-body">
                    <ul class="admin-timeline">
                        <?php foreach ($events as $event): ?>
                            <li>
                                <span class="admin-timeline-dot"
                                      style="background: <?= e($event->actionIconColor()) ?>;"></span>
                                <div class="admin-timeline-title"><?= e($event->actionLabel()) ?></div>
                                <div class="admin-timeline-meta">
                                    <?= e($event->created_at?->format('Y.m.d. H:i') ?? '') ?>
                                    <?php if ($event->admin): ?>
                                        &middot; <?= e($event->admin->name) ?>
                                    <?php endif; ?>
                                </div>
                                <?php if ($event->note): ?>
                                    <p class="admin-timeline-note"><?= e((string) $event->note) ?></p>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <!-- Törlés -->
            <div class="admin-card">
                <div class="admin-card-head">Törlés</div>
                <div class="admin-card-body">
                    <p class="admin-subtitle mb-3" style="color: var(--text-muted);">
                        A regisztráció és az előzményei véglegesen törlődnek.
                    </p>
                    <form method="POST" action="/admin/registrations/<?= (int) $registration->id ?>/delete"
                          onsubmit="return confirm('Biztosan törlöd ezt a regisztrációt?');">
                        <?= csrf() ?>
                        <button class="btn btn-sm btn-outline-danger w-100" type="submit">Végleges törlés</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
