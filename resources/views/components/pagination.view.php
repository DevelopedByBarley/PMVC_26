<?php
declare(strict_types=1);

/** @var \Illuminate\Pagination\LengthAwarePaginator $paginator */
$paginator = $paginator ?? null;

if (!$paginator || $paginator->lastPage() <= 1) {
    return;
}

$currentPage = $paginator->currentPage();
$lastPage    = $paginator->lastPage();
$total       = $paginator->total();
$from        = $paginator->firstItem();
$to          = $paginator->lastItem();

// Generate page window: current ±2
$window = 2;
$pages  = [];
for ($i = max(1, $currentPage - $window); $i <= min($lastPage, $currentPage + $window); $i++) {
    $pages[] = $i;
}
?>

<div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-3">

    <div class="small" style="color: #64748b;">
        <?= $from ?>–<?= $to ?> / <?= number_format($total) ?> találat
    </div>

    <nav aria-label="Lapozó">
        <ul class="pagination pagination-sm mb-0" style="gap: 3px;">


            <li class="page-item <?= $currentPage <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="<?= $paginator->previousPageUrl() ?? '#' ?>" aria-label="Előző"
                   style="border-radius: 8px; border-color: #e2e8f0; color: #475569;">
                    <span aria-hidden="true">&lsaquo;</span>
                </a>
            </li>


            <?php if (!in_array(1, $pages, true)): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $paginator->url(1) ?>"
                       style="border-radius: 8px; border-color: #e2e8f0; color: #475569;">1</a>
                </li>
                <?php if ($pages[0] > 2): ?>
                    <li class="page-item disabled">
                        <span class="page-link" style="border-radius: 8px; border-color: #e2e8f0; color: #94a3b8;">&hellip;</span>
                    </li>
                <?php endif; ?>
            <?php endif; ?>


            <?php foreach ($pages as $page): ?>
                <li class="page-item <?= $page === $currentPage ? 'active' : '' ?>">
                    <a class="page-link" href="<?= $paginator->url($page) ?>"
                       style="border-radius: 8px; <?= $page === $currentPage
                           ? 'background: linear-gradient(135deg, #ef4444, #dc2626); border-color: transparent; color: #fff;'
                           : 'border-color: #e2e8f0; color: #475569;' ?>">
                        <?= $page ?>
                    </a>
                </li>
            <?php endforeach; ?>


            <?php if (!in_array($lastPage, $pages, true)): ?>
                <?php if ($pages[array_key_last($pages)] < $lastPage - 1): ?>
                    <li class="page-item disabled">
                        <span class="page-link" style="border-radius: 8px; border-color: #e2e8f0; color: #94a3b8;">&hellip;</span>
                    </li>
                <?php endif; ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $paginator->url($lastPage) ?>"
                       style="border-radius: 8px; border-color: #e2e8f0; color: #475569;"><?= $lastPage ?></a>
                </li>
            <?php endif; ?>


            <li class="page-item <?= $currentPage >= $lastPage ? 'disabled' : '' ?>">
                <a class="page-link" href="<?= $paginator->nextPageUrl() ?? '#' ?>" aria-label="Következő"
                   style="border-radius: 8px; border-color: #e2e8f0; color: #475569;">
                    <span aria-hidden="true">&rsaquo;</span>
                </a>
            </li>

        </ul>
    </nav>

</div>
