<?php

/**
 * Regisztráció visszaigazoló oldal (dizájn nélküli alap).
 *   controller : App\Http\Controllers\RegistrationController::success()
 *   szövegek   : resources/lang/{hu,en}/registration.php
 *
 * @var array $t             a 'success' nyelvi blokk
 * @var array $rows          megjelenítendő adatpárok
 * @var array $event         config/event.php
 * @var string $reference
 * @var string $statusLabel
 */
?>

<h1><?= e($t['title']) ?></h1>
<p><?= e($t['lead']) ?></p>

<p>
    <?= e($t['reference']) ?>: <strong><?= e($reference) ?></strong><br>
    <?= e($t['refhint']) ?>
</p>

<h2><?= e($t['datatitle']) ?></h2>

<dl>
    <?php foreach ($rows as $row): ?>
        <dt><?= e($row['label']) ?></dt>
        <dd><?= e($row['value']) ?></dd>
    <?php endforeach; ?>
</dl>

<p>
    <strong><?= e($t['eventtitle']) ?>:</strong><br>
    <?= e($t['eventdate']) ?><br>
    <?= e($event['venue']) ?> &middot; <?= e($event['address']) ?>
</p>

<p>
    <?= e($t['contact']) ?>
    <a href="mailto:<?= e($event['contact_email']) ?>"><?= e($event['contact_email']) ?></a>
</p>

<p><a href="/"><?= e($t['back']) ?></a></p>
