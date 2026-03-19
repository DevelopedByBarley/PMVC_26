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
<div
    <?= ($alert['id'] ?? null) ? 'id="' . htmlspecialchars((string) $alert['id'], ENT_QUOTES, 'UTF-8') . '"' : '' ?>
    class="d-flex align-items-start gap-3 tw-rounded-[14px] tw-border-0 tw-border-l-4 tw-border-solid tw-border-l-[<?= $vs['border'] ?>] tw-bg-[<?= $vs['bg'] ?>] tw-text-[<?= $vs['text'] ?>] tw-p-[14px_16px] tw-shadow-[0_2px_12px_rgba(0,0,0,0.06)] tw-m-0 <?= htmlspecialchars((string) ($alert['class_attr'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
    <?php foreach ((array) ($alert['attrs'] ?? []) as $key => $value): ?><?php if ($value === null || $value === false): ?><?php continue; ?><?php endif; ?><?= ' ' . htmlspecialchars((string) $key, ENT_QUOTES, 'UTF-8') ?><?php if ($value !== true): ?>="<?= htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8') ?>"<?php endif; ?><?php endforeach; ?>
>
    <?php if ($alert['icon'] ?? null): ?>
        <span class="d-flex align-items-center tw-text-[1.15rem] tw-leading-none tw-shrink-0 tw-mt-px tw-text-[<?= $vs['icon'] ?>]">
            <?php if ($alert['icon_is_html'] ?? false): ?>
                <?= $alert['icon'] ?>
            <?php else: ?>
                <i class="<?= htmlspecialchars((string) $alert['icon'], ENT_QUOTES, 'UTF-8') ?>" aria-hidden="true"></i>
            <?php endif; ?>
        </span>
    <?php endif; ?>

    <div class="tw-flex-1 tw-min-w-0">
        <?php if (($alert['heading'] ?? null) !== null): ?>
            <div class="tw-text-sm tw-font-semibold tw-text-[<?= $vs['text'] ?>] tw-mb-[3px] tw-leading-[1.4]">
                <?= htmlspecialchars((string) $alert['heading'], ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>
        <?php if (($alert['message'] ?? '') !== ''): ?>
            <div class="tw-text-sm tw-text-[<?= $vs['text'] ?>] tw-leading-[1.55] tw-opacity-90 <?= ($alert['heading'] ?? null) === null ? 'fw-medium' : '' ?>">
                <?= htmlspecialchars((string) $alert['message'], ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if ($alert['dismissible'] ?? false): ?>
        <button type="button"
                class="btn-close tw-shrink-0 tw-opacity-[0.45] tw-rounded-[6px] tw-m-0 tw-p-0 tw-w-[22px] tw-h-[22px] tw-[background-size:9px] tw-[position:static] hover:tw-opacity-75 hover:tw-bg-black/[0.07]"
                data-bs-dismiss="alert"
                aria-label="Bezár">
        </button>
    <?php endif; ?>
</div>
<?php endif; ?>
