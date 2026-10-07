<?php

/**
 * Publikus footer (dizájn nélküli alap).
 *   szövegek : resources/lang/{hu,en}/footer.php
 */

$foot = \Core\Language::load('footer');
?>

<footer>
    <p>&copy; <?= date('Y') ?> ZeroDay Cyber Conference &middot; <?= e($foot['rights']) ?></p>
</footer>
