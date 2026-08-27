<div id="zd-main" class="zd-page">

    <!-- ================================================================== -->
    <!-- HERO                                                               -->
    <!-- ================================================================== -->
    <header class="zd-hero">
        <div class="zd-shell">
            <div class="zd-hero-grid">

                <div class="zd-hero-copy zd-reveal">
                    <span class="zd-eyebrow"><?= e($t['hero']['eyebrow']) ?></span>

                    <h1 class="zd-h1">
                        <span class="zd-h1-a">ZERO</span><span class="zd-h1-b">DAY</span>
                    </h1>

                    <p class="zd-kicker"><?= e($t['hero']['kicker']) ?></p>
                    <p class="zd-tagline"><?= e($t['hero']['tagline']) ?></p>
                    <p class="zd-lead"><?= e($t['hero']['lead']) ?></p>

                    <div class="zd-hero-actions">
                        <a href="#register" class="zd-btn zd-btn-primary"><?= e($t['hero']['cta1']) ?></a>
                        <a href="#program" class="zd-btn zd-btn-ghost"><?= e($t['hero']['cta2']) ?></a>
                    </div>

                    <dl class="zd-chips">
                        <?php foreach ($t['hero']['chips'] as $chip): ?>
                            <div class="zd-chip">
                                <dt><?= e($chip['label']) ?></dt>
                                <dd><?= e($chip['value']) ?></dd>
                            </div>
                        <?php endforeach; ?>
                    </dl>
                </div>

                <aside class="zd-hero-side zd-reveal" style="--zd-delay: 90ms">
                    <figure class="zd-logo-frame">
                        <img src="/resources/img/zeroday-lockup-<?= $lang ?>.svg"
                            alt="ZeroDay Cyber Conference 2026 – ELTE · GDE · PTE" width="402" height="351">
                    </figure>
                </aside>
            </div>

            <!-- Visszaszámláló -->
            <section class="zd-card zd-countdown zd-reveal" style="--zd-delay: 160ms"
                aria-labelledby="zd-countdown-title" data-target="<?= e($event['iso']) ?>">
                <div class="zd-countdown-head">
                    <div>
                        <h2 id="zd-countdown-title"><?= e($t['countdown']['title']) ?></h2>
                        <p><?= e($t['countdown']['target']) ?></p>
                    </div>
                    <span class="zd-live"><span class="zd-dot"></span><?= e($t['countdown']['live']) ?></span>
                </div>

                <div class="zd-timer" aria-live="polite" aria-atomic="true">
                    <?php foreach (['days', 'hours', 'minutes', 'seconds'] as $i => $unit): ?>
                        <div class="zd-time-box">
                            <strong data-cd="<?= $unit ?>">00</strong>
                            <span><?= e($t['countdown']['units'][$i]) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>

                <p class="zd-countdown-msg" data-cd="msg" hidden><?= e($t['countdown']['started']) ?></p>
            </section>

            <!-- Arculati pillérek -->
            <ul class="zd-pillars zd-reveal" style="--zd-delay: 220ms">
                <?php foreach ($t['pillars'] as $p): ?>
                    <li>
                        <h3><?= e($p['title']) ?></h3>
                        <p><?= e($p['text']) ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </header>

    <!-- ================================================================== -->
    <!-- A KONFERENCIA CÉLJA                                                -->
    <!-- ================================================================== -->
    <section id="about" class="zd-section">
        <div class="zd-shell">
            <div class="zd-about-grid">
                <div class="zd-reveal">
                    <span class="zd-eyebrow"><?= e($t['about']['eyebrow']) ?></span>
                    <h2 class="zd-h2"><?= $t['about']['title'] /* szándékos HTML: <br> + <span> */ ?></h2>
                </div>

                <div class="zd-prose zd-reveal" style="--zd-delay: 80ms">
                    <?php foreach ($t['about']['body'] as $i => $para): ?>
                        <p class="<?= $i === 0 ? 'zd-prose-lead' : '' ?>"><?= e($para) ?></p>
                    <?php endforeach; ?>
                </div>
            </div>

            <ul class="zd-facts zd-reveal" style="--zd-delay: 140ms">
                <?php foreach ($t['about']['facts'] as $f): ?>
                    <li>
                        <strong><?= e($f['num']) ?></strong>
                        <span><?= e($f['label']) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <!-- ================================================================== -->
    <!-- KIKET VÁRUNK                                                       -->
    <!-- ================================================================== -->
    <section id="audience" class="zd-section">
        <div class="zd-shell">
            <div class="zd-section-head zd-reveal">
                <span class="zd-eyebrow"><?= e($t['audience']['eyebrow']) ?></span>
                <h2 class="zd-h2"><?= e($t['audience']['title']) ?></h2>
            </div>

            <div class="zd-audience">
                <?php foreach ($t['audience']['items'] as $i => $item): ?>
                    <article class="zd-card zd-audience-card zd-reveal" style="--zd-delay: <?= $i * 70 ?>ms">
                        <span class="zd-num"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
                        <h3><?= e($item['tag']) ?></h3>
                        <p><?= e($item['text']) ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ================================================================== -->
    <!-- PROGRAM                                                            -->
    <!-- ================================================================== -->
    <section id="program" class="zd-section">
        <div class="zd-shell">
            <div class="zd-section-head zd-reveal">
                <span class="zd-eyebrow"><?= e($t['program']['eyebrow']) ?></span>
                <h2 class="zd-h2"><?= e($t['program']['title']) ?></h2>
            </div>

            <ol class="zd-timeline">
                <?php foreach ($t['program']['rows'] as $i => $row): ?>
                    <li class="zd-tl-item is-<?= e($row['type']) ?> zd-reveal" style="--zd-delay: <?= min($i, 8) * 40 ?>ms">
                        <time class="zd-tl-time"><?= e($row['time']) ?></time>
                        <span class="zd-tl-node" aria-hidden="true"></span>
                        <div class="zd-tl-body">
                            <h3><?= e($row['title']) ?></h3>
                            <?php if (!empty($row['desc'])): ?>
                                <p><?= e($row['desc']) ?></p>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ol>

            <p class="zd-note zd-reveal"><?= e($t['program']['note']) ?></p>
        </div>
    </section>

    <!-- ================================================================== -->
    <!-- HELYSZÍN                                                           -->
    <!-- ================================================================== -->
    <section id="venue" class="zd-section">
        <div class="zd-shell">
            <div class="zd-card zd-venue zd-reveal">
                <div class="zd-venue-copy">
                    <span class="zd-eyebrow"><?= e($t['venue']['eyebrow']) ?></span>
                    <h2 class="zd-h2 zd-h2-sm"><?= e($t['venue']['title']) ?></h2>
                    <p class="zd-lead"><?= e($t['venue']['text']) ?></p>

                    <dl class="zd-deflist">
                        <?php foreach ($t['venue']['rows'] as $row): ?>
                            <div>
                                <dt><?= e($row['label']) ?></dt>
                                <dd><?= e($row['value']) ?></dd>
                            </div>
                        <?php endforeach; ?>
                    </dl>

                    <a class="zd-btn zd-btn-ghost" href="<?= e($event['maps']) ?>" target="_blank" rel="noopener noreferrer">
                        <?= e($t['venue']['maplink']) ?>
                        <svg width="13" height="13" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                        </svg>
                    </a>
                </div>

                <!-- Stilizált hálómintás "térkép"-panel -->
                <div class="zd-venue-visual" aria-hidden="true">
                    <div class="zd-venue-pin">
                        <svg width="26" height="26" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                        </svg>
                    </div>
                    <span class="zd-venue-label">Budapest</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================================================== -->
    <!-- REGISZTRÁCIÓ  ->  POST /registration                              -->
    <!-- Controller: App\Http\Controllers\RegistrationController::store()     -->
    <!-- ================================================================== -->
    <section id="register" class="zd-section">
        <div class="zd-shell zd-shell-narrow">
            <div class="zd-section-head zd-reveal">
                <span class="zd-eyebrow"><?= e($t['form']['eyebrow']) ?></span>
                <h2 class="zd-h2"><?= e($t['form']['title']) ?></h2>
                <p class="zd-lead"><?= e($t['form']['lead']) ?></p>
            </div>
            <form class="zd-card zd-form zd-reveal" method="POST" action="/registration" novalidate>
                <?= csrf('registration') ?>

                <!-- Részvételi típus -->
                <fieldset class="zd-field">
                    <legend class="zd-label">
                        <?= e($t['form']['typelabel']) ?><span class="zd-req">*</span>
                    </legend>

                    <div class="zd-segmented" data-segmented>
                        <?php foreach ($regTypes as $type): ?>
                            <label class="zd-seg<?= $type['open'] ? ($type['checked'] ? ' is-checked' : '') : ' is-disabled' ?>">
                                <input type="radio" name="type" value="<?= e($type['value']) ?>"
                                    <?= $type['checked'] ? 'checked' : '' ?>
                                    <?= $type['open'] ? '' : 'disabled' ?> required>
                                <span><?= e($type['label']) ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>

                    <?php foreach ($regTypes as $type): ?>
                        <?php if (!$type['open']): ?>
                            <p class="zd-hint zd-hint-end">
                                <?= e($type['label']) ?>: <?= e($t['form']['closed']) ?>
                            </p>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <?php errors('type', $errors); ?>
                </fieldset>

                <div class="zd-field-row">
                    <!-- Név -->
                    <div class="zd-field">
                        <label class="zd-label" for="zd-name"><?= e($t['form']['name']) ?><span class="zd-req">*</span></label>
                        <input class="zd-input" id="zd-name" name="name" type="text" autocomplete="name"
                            placeholder="<?= e($t['form']['name']) ?>"
                            value="<?= e(oldValue('name')) ?>" required>
                        <?php errors('name', $errors); ?>
                    </div>

                    <!-- E-mail -->
                    <div class="zd-field">
                        <label class="zd-label" for="zd-email"><?= e($t['form']['email']) ?><span class="zd-req">*</span></label>
                        <input class="zd-input" id="zd-email" name="email" type="email" autocomplete="email"
                            placeholder="<?= e($t['form']['email']) ?>"
                            value="<?= e(oldValue('email')) ?>" required>
                        <?php errors('email', $errors); ?>
                    </div>

                    <!-- Cég / Egyetem -->
                    <div class="zd-field">
                        <label class="zd-label" for="zd-company"><?= e($t['form']['company']) ?><span class="zd-req">*</span></label>
                        <input class="zd-input" id="zd-company" name="company" type="text" autocomplete="organization"
                            placeholder="<?= e($t['form']['company']) ?>"
                            value="<?= e(oldValue('company')) ?>" required>
                        <?php errors('company', $errors); ?>
                    </div>

                    <!-- Telefon -->
                    <div class="zd-field">
                        <label class="zd-label" for="zd-phone"><?= e($t['form']['phone']) ?><span class="zd-req">*</span></label>
                        <input class="zd-input" id="zd-phone" name="phone" type="tel" autocomplete="tel"
                            placeholder="<?= e($t['form']['phone']) ?>"
                            value="<?= e(oldValue('phone')) ?>" required>
                        <?php errors('phone', $errors); ?>
                    </div>
                </div>

                <!-- Részvétel módja -->
                <fieldset class="zd-field">
                    <legend class="zd-label"><?= e($t['form']['modelabel']) ?><span class="zd-req">*</span></legend>
                    <div class="zd-segmented" data-segmented>
                        <label class="zd-seg">
                            <input type="radio" name="mode" value="online"
                                <?= oldValue('mode') === 'online' ? 'checked' : '' ?> required>
                            <span>
                                <svg width="15" height="15" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                                    <path d="M0 4s0-2 2-2h12c2 0 2 2 2 2v6s0 2-2 2h-1l1 1.5V15H2v-1.5L3 12H2c-2 0-2-2-2-2V4zm2-1a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H2z" />
                                </svg>
                                <?= e($t['form']['online']) ?>
                            </span>
                        </label>
                        <label class="zd-seg">
                            <input type="radio" name="mode" value="in_person"
                                <?= oldValue('mode') === 'in_person' ? 'checked' : '' ?> required>
                            <span>
                                <svg width="15" height="15" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                </svg>
                                <?= e($t['form']['inperson']) ?>
                            </span>
                        </label>
                    </div>

                    <?php errors('mode', $errors); ?>
                </fieldset>

                <!-- GDPR -->
                <label class="zd-check">
                    <input type="checkbox" name="gdpr" value="1" required>
                    <span class="zd-check-box" aria-hidden="true">
                        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2.4"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 8.5 6.2 11.7 13 4.9" />
                        </svg>
                    </span>
                    <span class="zd-check-text"><?= e($t['form']['gdpr']) ?><span class="zd-req">*</span></span>
                </label>
                <?php errors('gdpr', $errors); ?>

                <div class="zd-form-foot">
                    <button type="submit" class="zd-btn zd-btn-primary zd-btn-block">
                        <?= e($t['form']['submit']) ?>
                    </button>
                    <p class="zd-hint"><?= e($t['form']['after']) ?></p>
                </div>
            </form>
        </div>
    </section>

    <!-- ================================================================== -->
    <!-- KORÁBBI KONFERENCIÁK                                               -->
    <!-- TODO: a tényleges linkeket a szervezőktől kell megkapni.            -->
    <!-- ================================================================== -->
    <section id="archive" class="zd-section">
        <div class="zd-shell">
            <div class="zd-section-head zd-reveal">
                <span class="zd-eyebrow"><?= e($t['archive']['eyebrow']) ?></span>
                <h2 class="zd-h2"><?= e($t['archive']['title']) ?></h2>
                <p class="zd-lead"><?= e($t['archive']['text']) ?></p>
            </div>

            <div class="zd-archive">
                <?php foreach ($t['archive']['items'] as $i => $item): ?>
                    <a class="zd-card zd-archive-card zd-reveal" href="#" style="--zd-delay: <?= $i * 70 ?>ms">
                        <span class="zd-archive-year"><?= e($item['year']) ?></span>
                        <h3><?= e($item['title']) ?></h3>
                        <p><?= e($item['meta']) ?></p>
                        <span class="zd-archive-link">
                            <?= e($t['archive']['link']) ?>
                            <svg width="13" height="13" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                            </svg>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ================================================================== -->
    <!-- SZERVEZŐK                                                          -->
    <!-- ================================================================== -->
    <section class="zd-section zd-section-tight">
        <div class="zd-shell">
            <div class="zd-section-head zd-reveal">
                <span class="zd-eyebrow"><?= e($t['organisers']['eyebrow']) ?></span>
                <h2 class="zd-h2 zd-h2-sm"><?= e($t['organisers']['title']) ?></h2>
            </div>

            <ul class="zd-organisers zd-reveal">
                <?php foreach ($t['organisers']['items'] as $o): ?>
                    <li>
                        <strong><?= e($o['short']) ?></strong>
                        <span><?= e($o['name']) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
</div>
