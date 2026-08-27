<?php
declare(strict_types=1);

$toast = \Core\Toast::resolve($config ?? null);
?>

<?php if (($toast['message'] ?? '') !== '' || ($toast['title'] ?? null) !== null): ?>

<?php $hasHeader = ($toast['title'] ?? null) !== null || ($toast['timestamp'] ?? null) !== null; ?>

<div
    <?= ($toast['id'] ?? null) ? 'id="' . htmlspecialchars((string) $toast['id'], ENT_QUOTES, 'UTF-8') . '"' : '' ?>
    class="pmvc-toast-wrap <?= htmlspecialchars((string) ($toast['class_attr'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
    data-delay="<?= round((int) ($toast['delay'] ?? 5000) / 1000, 1) ?>s"
    <?php foreach ((array) ($toast['attrs'] ?? []) as $key => $value): ?><?php if ($value === null || $value === false): ?><?php continue; ?><?php endif; ?><?= ' ' . htmlspecialchars((string) $key, ENT_QUOTES, 'UTF-8') ?><?php if ($value !== true): ?>="<?= htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8') ?>"<?php endif; ?><?php endforeach; ?>
>
    <?php if ($hasHeader): ?>
        <div class="toast-header <?= htmlspecialchars((string) ($toast['header_class'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
            <?php if ($toast['icon'] ?? null): ?>
                <span class="d-flex align-items-center tw-text-base tw-leading-none">
                    <?php if ($toast['icon_is_html'] ?? false): ?>
                        <?= $toast['icon'] ?>
                    <?php else: ?>
                        <i class="<?= htmlspecialchars((string) $toast['icon'], ENT_QUOTES, 'UTF-8') ?>" aria-hidden="true"></i>
                    <?php endif; ?>
                </span>
            <?php endif; ?>
            <?php if (($toast['title'] ?? null) !== null): ?>
                <strong class="me-auto"><?= htmlspecialchars((string) $toast['title'], ENT_QUOTES, 'UTF-8') ?></strong>
            <?php endif; ?>
            <?php if (($toast['timestamp'] ?? null) !== null): ?>
                <small><?= htmlspecialchars((string) $toast['timestamp'], ENT_QUOTES, 'UTF-8') ?></small>
            <?php endif; ?>
            <button type="button" class="btn-close ms-2" data-bs-dismiss="toast" aria-label="Bezár"></button>
        </div>
    <?php endif; ?>

    <div class="pmvc-toast-body toast-body <?= htmlspecialchars((string) ($toast['body_class'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (($toast['icon'] ?? null) && !$hasHeader): ?>
            <span class="d-flex align-items-center tw-text-[1.15rem] tw-leading-none tw-shrink-0 tw-mt-px">
                <?php if ($toast['icon_is_html'] ?? false): ?>
                    <?= $toast['icon'] ?>
                <?php else: ?>
                    <i class="<?= htmlspecialchars((string) $toast['icon'], ENT_QUOTES, 'UTF-8') ?>" aria-hidden="true"></i>
                <?php endif; ?>
            </span>
        <?php endif; ?>
        <span class="tw-flex-1"><?= htmlspecialchars((string) $toast['message'], ENT_QUOTES, 'UTF-8') ?></span>
        <?php if (!$hasHeader): ?>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Bezár"></button>
        <?php endif; ?>
    </div>

    <?php if ($toast['autohide'] ?? true): ?>
        <div class="pmvc-toast-progress"></div>
    <?php endif; ?>
</div>
<script>
(function () {
    var wrap = document.currentScript ? document.currentScript.previousElementSibling : null;
    if (!wrap || !wrap.classList.contains('toast')) return;
    if (wrap.dataset.delay) wrap.style.setProperty('--pmvc-delay', wrap.dataset.delay);
    wrap.addEventListener('shown.bs.toast', function () {
        var bar = wrap.querySelector('.pmvc-toast-progress');
        if (bar) bar.classList.add('is-running');
    });
})();
</script>
<?php endif; ?>
