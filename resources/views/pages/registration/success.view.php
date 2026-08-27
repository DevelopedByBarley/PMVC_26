<?php

/**
 * Regisztráció visszaigazoló oldal.
 *   controller : App\Http\Controllers\RegistrationController::success()
 *   szövegek   : resources/lang/{hu,en}/registration.php
 *   stílus     : resources/css/zeroday.css  (4/b. blokk)
 *
 * @var array $t             a 'success' nyelvi blokk
 * @var array $rows          megjelenítendő adatpárok
 * @var array $event         config/event.php
 * @var string $reference
 * @var string $statusLabel
 */
?>

<div id="zd-main" class="zd-page">
    <section class="zd-section zd-section-top">
        <div class="zd-shell zd-shell-narrow">

            <div class="zd-section-head zd-reveal is-visible">
                <span class="zd-eyebrow"><?= e($t['eyebrow']) ?></span>
                <h1 class="zd-h2"><?= e($t['title']) ?></h1>
                <p class="zd-lead"><?= e($t['lead']) ?></p>
            </div>

            <div class="zd-card zd-ticket zd-reveal is-visible">
                <div class="zd-ticket-head">
                    <span class="zd-ticket-label"><?= e($t['reference']) ?></span>
                    <strong class="zd-ticket-ref"><?= e($reference) ?></strong>
                    <p class="zd-hint"><?= e($t['refhint']) ?></p>
                </div>

                <h2 class="zd-ticket-title"><?= e($t['datatitle']) ?></h2>

                <dl class="zd-ticket-rows">
                    <?php foreach ($rows as $row): ?>
                        <div>
                            <dt><?= e($row['label']) ?></dt>
                            <dd><?= e($row['value']) ?></dd>
                        </div>
                    <?php endforeach; ?>
                </dl>

                <div class="zd-ticket-foot">
                    <p>
                        <strong><?= e($t['eventtitle']) ?>:</strong><br>
                        <?= e($t['eventdate']) ?><br>
                        <?= e($event['venue']) ?> &middot; <?= e($event['address']) ?>
                    </p>
                    <p>
                        <?= e($t['contact']) ?>
                        <a href="mailto:<?= e($event['contact_email']) ?>"><?= e($event['contact_email']) ?></a>
                    </p>
                </div>
            </div>

            <p class="zd-back">
                <a href="/" class="zd-btn zd-btn-ghost"><?= e($t['back']) ?></a>
            </p>

        </div>
    </section>
</div>
