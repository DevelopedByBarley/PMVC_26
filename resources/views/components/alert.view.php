<?php
declare(strict_types=1);

$alert = \Core\Alert::resolve($config ?? null);

$variantMap = [
    'success'   => ['bg' => '#f0fdf4', 'border' => '#22c55e', 'text' => '#15803d', 'icon' => '#16a34a'],
    'danger'    => ['bg' => '#fef2f2', 'border' => '#ef4444', 'text' => '#b91c1c', 'icon' => '#dc2626'],
    'warning'   => ['bg' => '#fffbeb', 'border' => '#f59e0b', 'text' => '#92400e', 'icon' => '#d97706'],
    'info'      => ['bg' => '#eff6ff', 'border' => '#3b82f6', 'text' => '#1d4ed8', 'icon' => '#2563eb'],
    'primary'   => ['bg' => '#eef2ff', 'border' => '#6366f1', 'text' => '#4338ca', 'icon' => '#4f46e5'],
    'secondary' => ['bg' => '#f8fafc', 'border' => '#64748b', 'text' => '#374151', 'icon' => '#4b5563'],
    'dark'      => ['bg' => '#f1f5f9', 'border' => '#1e293b', 'text' => '#0f172a', 'icon' => '#1e293b'],
    'light'     => ['bg' => '#f8fafc', 'border' => '#94a3b8', 'text' => '#475569', 'icon' => '#64748b'],
];

$vs = $variantMap[$alert['variant'] ?? 'primary'] ?? $variantMap['primary'];
?>

<?php if (($alert['message'] ?? '') !== '' || ($alert['heading'] ?? null) !== null): ?>
<?php if (!defined('PMVC_ALERT_STYLES')): define('PMVC_ALERT_STYLES', true); ?>
<style>
    .pmvc-alert {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        border-radius: 14px;
        border: none;
        border-left: 4px solid var(--pmvc-alert-border);
        background: var(--pmvc-alert-bg);
        color: var(--pmvc-alert-text);
        padding: 14px 16px;
        box-shadow: 0 2px 12px rgba(0,0,0,.06);
        margin: 0;
    }
    .pmvc-alert.alert-dismissible { padding-right: 16px; }
    .pmvc-alert .pmvc-alert-icon {
        display: flex;
        align-items: center;
        font-size: 1.15rem;
        line-height: 1;
        color: var(--pmvc-alert-icon);
        flex-shrink: 0;
        margin-top: 1px;
    }
    .pmvc-alert .pmvc-alert-content { flex: 1; min-width: 0; }
    .pmvc-alert .pmvc-alert-heading {
        font-size: .875rem;
        font-weight: 600;
        color: var(--pmvc-alert-text);
        margin-bottom: 3px;
        line-height: 1.4;
    }
    .pmvc-alert .pmvc-alert-message {
        font-size: .875rem;
        color: var(--pmvc-alert-text);
        line-height: 1.55;
        opacity: .9;
    }
    .pmvc-alert .btn-close {
        width: 22px;
        height: 22px;
        background-size: 9px;
        opacity: .45;
        border-radius: 6px;
        flex-shrink: 0;
        margin: 0;
        padding: 0;
        position: static;
        transition: opacity .15s, background-color .15s;
    }
    .pmvc-alert .btn-close:hover { opacity: .75; background-color: rgba(0,0,0,.07); }
</style>
<?php endif; ?>

<div
    <?= ($alert['id'] ?? null) ? 'id="' . htmlspecialchars((string) $alert['id'], ENT_QUOTES, 'UTF-8') . '"' : '' ?>
    class="pmvc-alert <?= htmlspecialchars((string) ($alert['class_attr'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
    style="--pmvc-alert-bg:<?= $vs['bg'] ?>;--pmvc-alert-border:<?= $vs['border'] ?>;--pmvc-alert-text:<?= $vs['text'] ?>;--pmvc-alert-icon:<?= $vs['icon'] ?>;"
    <?php foreach ((array) ($alert['attrs'] ?? []) as $key => $value): ?><?php if ($value === null || $value === false): ?><?php continue; ?><?php endif; ?><?= ' ' . htmlspecialchars((string) $key, ENT_QUOTES, 'UTF-8') ?><?php if ($value !== true): ?>="<?= htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8') ?>"<?php endif; ?><?php endforeach; ?>
>
    <?php if ($alert['icon'] ?? null): ?>
        <span class="pmvc-alert-icon">
            <?php if ($alert['icon_is_html'] ?? false): ?>
                <?= $alert['icon'] ?>
            <?php else: ?>
                <i class="<?= htmlspecialchars((string) $alert['icon'], ENT_QUOTES, 'UTF-8') ?>" aria-hidden="true"></i>
            <?php endif; ?>
        </span>
    <?php endif; ?>

    <div class="pmvc-alert-content">
        <?php if (($alert['heading'] ?? null) !== null): ?>
            <div class="pmvc-alert-heading"><?= htmlspecialchars((string) $alert['heading'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
        <?php if (($alert['message'] ?? '') !== ''): ?>
            <div class="pmvc-alert-message <?= ($alert['heading'] ?? null) === null ? 'fw-medium' : '' ?>"><?= htmlspecialchars((string) $alert['message'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <?php if ($alert['dismissible'] ?? false): ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Bezár"></button>
    <?php endif; ?>
</div>
<?php endif; ?>
