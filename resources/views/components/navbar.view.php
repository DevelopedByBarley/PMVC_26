<?php

/**
 * ZeroDay 2026 – publikus fejléc.
 *
 *   1. .zd-nav-hero  – arculati lockup + előadó-ikonok + visszaszámláló
 *   2. #zdNavbar     – sticky menüsáv (linkek, nyelvváltó, CTA)
 *
 *   szövegek  : resources/lang/{hu,en}/navbar.php
 *   adatok    : config/event.php, config/speakers.php
 *   stílus    : resources/css/zeroday.css
 *   viselkedés: resources/js/navbar.js
 */

$lang     = \Core\Language::current();
$nav      = \Core\Language::load('navbar');
$unis     = config('event.universities', []);
$eventIso = (string) config('event.iso', '');
$speakers = config('speakers.featured', []);
$units    = $nav['clock_units'];
$short    = $nav['clock_short'];
?>

<a href="#zd-main" class="zd-skip"><?= e($nav['skip']) ?></a>

<!-- ==========================================================================
     1. Arculati fejléc
     ========================================================================== -->
<header class="zd-nav-hero">
    <div class="zd-nav-hero-inner">

        <!-- Lockup: node-kör motívum + kétsoros wordmark -->
        <a class="zd-lockup" href="/" aria-label="ZeroDay Cyber Conference 2026">
            <?php $markClass = 'zd-lockup-mark';
            require base_path('resources/views/components/brand-mark.view.php'); ?>
            <span class="zd-lockup-text">
                <strong>ZERO</strong>
                <strong>DAY</strong>
            </span>
        </a>

        <!-- Előadók + esemény adatok -->
        <div class="zd-nav-meta">

            <!-- Előadó-ikonok (átmenetileg helyőrzők) -->
            <ul class="zd-faces">
                <?php foreach ($speakers as $i => $speaker): ?>
                    <?php $name = $speaker['name'] ?? sprintf($nav['speaker_soon'], $i + 1); ?>
                    <li class="zd-face<?= $speaker['image'] ? '' : ' is-placeholder' ?>" title="<?= e($name) ?>">
                        <?php if ($speaker['image']): ?>
                            <img src="<?= e($speaker['image']) ?>" alt="<?= e($name) ?>" loading="lazy" decoding="async">
                        <?php else: ?>
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false">
                                <circle cx="12" cy="8.4" r="4.2" />
                                <path
                                    d="M12 14.1c-4.1 0-7.4 2.4-7.4 5.3 0 .4.3.7.7.7h13.4c.4 0 .7-.3.7-.7 0-2.9-3.3-5.3-7.4-5.3Z" />
                            </svg>
                            <span class="zd-face-num" aria-hidden="true"><?= $i + 1 ?></span>
                        <?php endif; ?>
                        <span class="visually-hidden"><?= e($name) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>

            <p class="zd-nav-unis">
                <?php foreach ($unis as $i => $uni): ?>
                    <?php if ($i): ?><i aria-hidden="true"></i><?php endif; ?>
                    <span><?= e($uni) ?></span>
                <?php endforeach; ?>
            </p>

            <p class="zd-nav-headline"><?= e($nav['headline']) ?></p>
            <p class="zd-nav-date"><?= e($nav['date']) ?></p>
        </div>

        <!-- Sürgetés + visszaszámláló -->
        <p class="zd-nav-tick"><?= e($nav['clock']) ?></p>

        <div class="zd-nav-clock">
            <div class="zd-clock" data-clock data-target="<?= e($eventIso) ?>" role="timer"
                aria-label="<?= e($nav['clock_aria']) ?>">
                <?php foreach (['days', 'hours', 'minutes', 'seconds'] as $i => $unit): ?>
                    <?php if ($i): ?><span class="zd-clock-sep" aria-hidden="true">:</span><?php endif; ?>
                    <span class="zd-clock-seg">
                        <b data-clock-unit="<?= e($unit) ?>">00</b>
                        <i aria-hidden="true"><?= e($short[$i]) ?></i>
                        <span class="visually-hidden"><?= e($units[$i]) ?></span>
                    </span>
                <?php endforeach; ?>
            </div>

            <p class="zd-clock-done" data-clock-done hidden><?= e($nav['clock_done']) ?></p>
        </div>
    </div>
</header>

<!-- ==========================================================================
     2. Sticky menüsáv
     ========================================================================== -->
<nav id="zdNavbar" class="zd-nav" aria-label="<?= e($nav['menu']) ?>">
    <div class="zd-nav-inner">

        <!-- Kis brand a sávban (görgetés után ez marad látható) -->
        <a class="zd-brand" href="/" aria-label="ZeroDay Cyber Conference 2026">
            <?php $markClass = 'zd-brand-mark';
            require base_path('resources/views/components/brand-mark.view.php'); ?>
            <span class="zd-brand-text">
                <strong>ZERO<span>DAY</span></strong>
                <small><?= e($nav['tagline']) ?></small>
            </span>
        </a>

        <!-- Mobil toggler -->
        <button class="zd-burger" type="button" aria-expanded="false" aria-controls="zdNavMenu"
            aria-label="<?= e($nav['menu']) ?>">
            <span></span><span></span><span></span>
        </button>

        <!-- Menü -->
        <div class="zd-nav-menu" id="zdNavMenu">
            <ul class="zd-nav-links">
                <li><a href="#about"><?= e($nav['about']) ?></a></li>
                <li><a href="#audience"><?= e($nav['audience']) ?></a></li>
                <li><a href="#program"><?= e($nav['program']) ?></a></li>
                <li><a href="#venue"><?= e($nav['venue']) ?></a></li>
                <li><a href="#archive"><?= e($nav['archive']) ?></a></li>
            </ul>

            <div class="zd-nav-actions">
                <!-- Nyelvváltó -->
                <div class="zd-lang" role="group" aria-label="<?= e($nav['langlabel']) ?>">
                    <a href="/lang/hu" class="<?= $lang === 'hu' ? 'is-active' : '' ?>"
                        <?= $lang === 'hu' ? 'aria-current="true"' : '' ?>>HU</a>
                    <a href="/lang/en" class="<?= $lang === 'en' ? 'is-active' : '' ?>"
                        <?= $lang === 'en' ? 'aria-current="true"' : '' ?>>EN</a>
                </div>

                <a href="#register" class="zd-btn zd-btn-primary zd-nav-cta">
                    <?= e($nav['register']) ?>
                    <svg width="14" height="14" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Olvasási progressz sáv -->
    <div class="zd-progress" aria-hidden="true"><span id="zdProgressBar"></span></div>
</nav>
