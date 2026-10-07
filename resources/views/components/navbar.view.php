<?php

/**
 * Publikus fejléc (dizájn nélküli alap).
 *   szövegek : resources/lang/{hu,en}/navbar.php
 */

$lang = \Core\Language::current();
$nav  = \Core\Language::load('navbar');
?>

<a href="#main" class="visually-hidden-focusable"><?= e($nav['skip']) ?></a>

<header>
    <nav aria-label="<?= e($nav['menu']) ?>">
        <a href="/">ZeroDay 2026</a>

        <div role="group" aria-label="<?= e($nav['langlabel']) ?>">
            <a href="/lang/hu" <?= $lang === 'hu' ? 'aria-current="true"' : '' ?>>HU</a>
            <a href="/lang/en" <?= $lang === 'en' ? 'aria-current="true"' : '' ?>>EN</a>
        </div>
    </nav>
</header>
