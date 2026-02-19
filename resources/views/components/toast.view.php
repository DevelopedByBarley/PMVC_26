<?php
declare(strict_types=1);

$toast = \Core\Toast::resolve($config ?? null);
?>

<?php if (($toast['message'] ?? '') !== '' || ($toast['title'] ?? null) !== null): ?>
    <div<?= ($toast['id'] ?? null) ? ' id="' . htmlspecialchars((string) $toast['id'], ENT_QUOTES, 'UTF-8') . '"' : '' ?> class="<?= htmlspecialchars((string) ($toast['class_attr'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"<?php foreach ((array) ($toast['attrs'] ?? []) as $key => $value): ?><?php if ($value === null || $value === false): ?><?php continue; ?><?php endif; ?><?= ' ' . htmlspecialchars((string) $key, ENT_QUOTES, 'UTF-8') ?><?php if ($value !== true): ?>="<?= htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8') ?>"<?php endif; ?><?php endforeach; ?>>
        <?php if (($toast['title'] ?? null) !== null || ($toast['timestamp'] ?? null) !== null): ?>
            <div class="toast-header <?= htmlspecialchars((string) ($toast['header_class'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
                <?php if ($toast['icon'] ?? null): ?>
                    <span class="me-2">
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
                    <small class="text-muted"><?= htmlspecialchars((string) $toast['timestamp'], ENT_QUOTES, 'UTF-8') ?></small>
                <?php endif; ?>
                <button type="button" class="btn-close ms-2 mb-1" data-bs-dismiss="toast" aria-label="Bezár"></button>
            </div>
        <?php endif; ?>
        <div class="toast-body <?= htmlspecialchars((string) ($toast['body_class'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
            <?= htmlspecialchars((string) $toast['message'], ENT_QUOTES, 'UTF-8') ?>
        </div>
    </div>
<?php endif; ?>
