<?php

/**
 * ZeroDay 2026 – publikus footer.
 *   szövegek : resources/lang/{hu,en}/footer.php
 *   stílus   : resources/css/zeroday.css
 */

$foot = \Core\Language::load('footer');
?>

<footer class="zd-footer">
    <div class="zd-shell">

        <div class="zd-footer-grid">

            <!-- Brand: a navbarral egyező mark + wordmark (élesebb, mint a kicsinyített lockup) -->
            <div class="zd-footer-brand">
                <a class="zd-footer-logo" href="/" aria-label="ZeroDay Cyber Conference 2026">
                    <svg viewBox="116 20 36 39" role="img" aria-hidden="true" focusable="false">
                        <g fill="#ffffff">
                            <path d="M128.11,53.33c-6.01-1.74-10.41-7.28-10.41-13.85,0-4.48,2.05-8.49,5.25-11.13l-1.65-1.96c-3.8,3.13-6.22,7.86-6.22,13.16,0,7.97,5.48,14.65,12.88,16.51-.09-.36-.16-.74-.16-1.13,0-.57.12-1.1.3-1.6Z" />
                            <path d="M149.16,39.55c0-2.76-.67-5.36-1.84-7.67-.6.63-1.37,1.09-2.25,1.29.93,1.91,1.47,4.05,1.47,6.32,0,6.43-4.21,11.87-10.02,13.73.22.53.34,1.11.34,1.71,0,.35-.05.68-.12,1.01,7.16-2.02,12.42-8.58,12.42-16.39Z" />
                            <circle cx="135.91" cy="47.61" r="1.6" />
                            <circle cx="144.04" cy="28.85" r="3.51" />
                            <circle cx="132.42" cy="54.89" r="3.17" />
                            <circle cx="130.87" cy="36.59" r="2.87" />
                            <circle cx="132.29" cy="47.06" r=".7" />
                            <rect x="131.7" y="32.94" width="11.06" height=".47" transform="translate(1.8 73.06) rotate(-30)" />
                            <rect x="133.05" y="50.41" width="3.04" height=".26" transform="translate(27.07 145.97) rotate(-62.18)" />
                            <rect x="137.35" y="49.06" width="4.29" height=".26" transform="translate(258.82 136.59) rotate(-163.21)" />
                            <rect x="132.09" y="47.08" width="4.29" height=".26" transform="translate(260.65 112.55) rotate(-172.05)" />
                        </g>
                        <g fill="#24d0e9">
                            <path d="M139.82,27.3c.29-.83.82-1.55,1.51-2.08-2.66-1.71-5.81-2.71-9.2-2.71-3.61,0-6.96,1.13-9.72,3.05l1.65,1.96c2.3-1.55,5.08-2.46,8.06-2.46,2.83,0,5.47.83,7.7,2.24Z" />
                            <rect x="118.32" y="41.42" width="11.06" height=".34" transform="translate(.59 84.91) rotate(-37.93)" />
                            <rect x="121.15" y="32.77" width="7.45" height=".35" transform="translate(206.63 132.91) rotate(-144.06)" />
                            <rect x="132.55" y="39.1" width="14.66" height=".43" transform="translate(49.87 153.37) rotate(-67.42)" />
                            <rect x="126.11" y="45.24" width="11.89" height=".43" transform="translate(98.67 181.06) rotate(-95.16)" />
                            <circle cx="130.84" cy="36.59" r="1.87" />
                            <circle cx="132.42" cy="54.8" r="1.87" />
                            <circle cx="135.91" cy="47.61" r=".99" />
                            <circle cx="144.04" cy="28.85" r="2.44" />
                            <circle cx="132.3" cy="47.05" r=".45" />
                        </g>
                    </svg>
                    <span>
                        <strong>ZERO<span>DAY</span></strong>
                        <small><?= e($foot['tagline']) ?></small>
                    </span>
                </a>
                <p><?= e($foot['blurb']) ?></p>
            </div>

            <!-- Oldalon belüli navigáció -->
            <nav class="zd-footer-col" aria-label="<?= e($foot['navTitle']) ?>">
                <h2><?= e($foot['navTitle']) ?></h2>
                <ul>
                    <?php foreach ($foot['nav'] as $item): ?>
                        <li><a href="<?= e($item['href']) ?>"><?= e($item['label']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <!-- Tudnivalók -->
            <div class="zd-footer-col">
                <h2><?= e($foot['infoTitle']) ?></h2>
                <dl class="zd-footer-info">
                    <?php foreach ($foot['info'] as $row): ?>
                        <div>
                            <dt><?= e($row['label']) ?></dt>
                            <dd><?= e($row['value']) ?></dd>
                        </div>
                    <?php endforeach; ?>
                </dl>
            </div>

            <!-- Kapcsolat -->
            <div class="zd-footer-col">
                <h2><?= e($foot['contactTitle']) ?></h2>
                <ul class="zd-footer-contact">
                    <li>
                        <a href="mailto:<?= e($foot['email']) ?>">
                            <svg width="15" height="15" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                            </svg>
                            <?= e($foot['email']) ?>
                        </a>
                    </li>
                    <li>
                        <a href="https://zeroday.gde.hu" target="_blank" rel="noopener noreferrer">
                            <svg width="15" height="15" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                                <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287V1.077zM4.249 3.539c.142-.384.304-.744.481-1.078.234-.44.501-.822.797-1.145A6.99 6.99 0 0 0 3.051 3.05c.362.184.763.349 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9.124 9.124 0 0 1-1.565-.667A6.964 6.964 0 0 0 1.018 7.5h2.49zm1.4-2.741a12.344 12.344 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332zM8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.612 13.612 0 0 1 7.5 10.91V8.5H4.51zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741H8.5zm-3.282 3.696c.12.312.252.604.395.872.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a6.991 6.991 0 0 1-.798-1.144 8.113 8.113 0 0 1-.481-1.078 8.938 8.938 0 0 0-1.198.49 6.99 6.99 0 0 0 2.477 1.732zm-1.383-2.964A13.36 13.36 0 0 1 3.508 8.5h-2.49a6.963 6.963 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667zm6.728 2.964a6.99 6.99 0 0 0 2.477-1.732 8.926 8.926 0 0 0-1.198-.49 8.113 8.113 0 0 1-.481 1.078 6.991 6.991 0 0 1-.798 1.144zm.653-2.964c.247.92.4 1.938.435 3.008h2.49a6.963 6.963 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667zm1.033-3.348c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 7.5h-2.49a13.36 13.36 0 0 1-.436 3.008zM11.91 8.5H8.5v2.409c.81.03 1.577.13 2.282.287.143-.268.276-.56.395-.872z" />
                            </svg>
                            <?= e($foot['site']) ?>
                        </a>
                    </li>
                </ul>

                <h2 class="zd-footer-partners-title"><?= e($foot['partners']) ?></h2>
                <ul class="zd-footer-partners">
                    <li>ELTE</li>
                    <li>GDE</li>
                    <li>PTE</li>
                </ul>
            </div>
        </div>

        <!-- Alsó sáv -->
        <div class="zd-footer-bar">
            <p class="zd-footer-copy">
                &copy; <?= date('Y') ?> ZeroDay Cyber Conference &middot; <?= e($foot['rights']) ?>
            </p>

            <ul class="zd-footer-legal">
                <?php foreach ($foot['legal'] as $item): ?>
                    <li><a href="<?= e($item['href']) ?>"><?= e($item['label']) ?></a></li>
                <?php endforeach; ?>
            </ul>

            <a href="#zd-main" class="zd-footer-top">
                <?= e($foot['top']) ?>
                <svg width="13" height="13" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
                </svg>
            </a>
        </div>
    </div>
</footer>
