<?php
declare(strict_types=1);

$alert = \Core\Alert::resolve($config ?? null);
?>

<?php if (($alert['message'] ?? '') !== '' || ($alert['heading'] ?? null) !== null): ?>
    <div<?= ($alert['id'] ?? null) ? ' id="' . htmlspecialchars((string) $alert['id'], ENT_QUOTES, 'UTF-8') . '"' : '' ?> class="<?= htmlspecialchars((string) ($alert['class_attr'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"<?php foreach ((array) ($alert['attrs'] ?? []) as $key => $value): ?><?php if ($value === null || $value === false): ?><?php continue; ?><?php endif; ?><?= ' ' . htmlspecialchars((string) $key, ENT_QUOTES, 'UTF-8') ?><?php if ($value !== true): ?>="<?= htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8') ?>"<?php endif; ?><?php endforeach; ?>>
        <?php if ($alert['icon'] ?? null): ?>
            <span class="me-2">
                <?php if ($alert['icon_is_html'] ?? false): ?>
                    <?= $alert['icon'] ?>
                <?php else: ?>
                    <i class="<?= htmlspecialchars((string) $alert['icon'], ENT_QUOTES, 'UTF-8') ?>" aria-hidden="true"></i>
                <?php endif; ?>
            </span>
        <?php endif; ?>
        <div>
            <?php if (($alert['heading'] ?? null) !== null): ?>
                <div class="fw-semibold mb-1"><?= htmlspecialchars((string) $alert['heading'], ENT_QUOTES, 'UTF-8') ?></div>
            <?php endif; ?>
            <?php if (($alert['message'] ?? '') !== ''): ?>
                <div><?= htmlspecialchars((string) $alert['message'], ENT_QUOTES, 'UTF-8') ?></div>
            <?php endif; ?>
        </div>
        <?php if ($alert['dismissible'] ?? false): ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <?php endif; ?>
    </div>
<?php endif; ?>
