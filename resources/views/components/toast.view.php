<?php
declare(strict_types=1);

$toast = \Core\Toast::resolve($config ?? null);
?>

<?php if (($toast['message'] ?? '') !== '' || ($toast['title'] ?? null) !== null): ?>
<?php if (!defined('PMVC_TOAST_STYLES')): define('PMVC_TOAST_STYLES', true); ?>
<style>
    @keyframes pmvc-toast-progress {
        from { transform: scaleX(1); }
        to   { transform: scaleX(0); }
    }
    .pmvc-toast-wrap.toast {
        border: none !important;
        background: #ffffff !important;
        border-radius: 16px !important;
        overflow: hidden;
        min-width: 300px;
        max-width: 380px;
        box-shadow: 0 10px 40px rgba(0,0,0,.10), 0 2px 8px rgba(0,0,0,.06) !important;
    }
    .pmvc-toast-wrap .toast-header {
        background: #ffffff !important;
        border-bottom: 1px solid #f1f5f9 !important;
        padding: 12px 14px 11px !important;
        gap: 8px;
    }
    .pmvc-toast-wrap .toast-header strong { font-size:.85rem; font-weight:600; color:#0f172a; letter-spacing:-.01em; }
    .pmvc-toast-wrap .toast-header small  { font-size:.75rem; color:#94a3b8; font-weight:400; }
    .pmvc-toast-wrap .toast-header .btn-close { width:22px; height:22px; background-size:9px; opacity:.4; border-radius:6px; margin:0; padding:0; flex-shrink:0; transition:opacity .15s,background-color .15s; }
    .pmvc-toast-wrap .toast-header .btn-close:hover { opacity:.7; background-color:#f1f5f9; }
    .pmvc-toast-wrap .pmvc-toast-body { padding:12px 14px 14px; font-size:.875rem; color:#334155; line-height:1.55; display:flex; align-items:flex-start; gap:10px; }
    .pmvc-toast-wrap .pmvc-toast-body .btn-close { width:20px; height:20px; background-size:9px; opacity:.35; border-radius:6px; flex-shrink:0; margin:1px -2px 0 4px; padding:0; transition:opacity .15s,background-color .15s; }
    .pmvc-toast-wrap .pmvc-toast-body .btn-close:hover { opacity:.65; background-color:#f1f5f9; }
    .pmvc-toast-progress {
        height:3px;
        background:linear-gradient(90deg,#6366f1 0%,#8b5cf6 50%,#ec4899 100%);
        transform-origin:left center;
        animation:pmvc-toast-progress var(--pmvc-delay,5s) linear forwards;
        animation-play-state:paused;
    }
    .pmvc-toast-progress.is-running { animation-play-state:running; }
</style>
<?php endif; ?>

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
