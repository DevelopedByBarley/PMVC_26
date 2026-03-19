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

    <div class="small tw-text-slate-500">
        <?= $from ?>–<?= $to ?> / <?= number_format($total) ?> találat
    </div>

    <nav aria-label="Lapozó">
        <ul class="pagination pagination-sm mb-0 gap-1">

            <li class="page-item <?= $currentPage <= 1 ? 'disabled' : '' ?>">
                <a class="page-link tw-rounded-[8px]" href="<?= $paginator->previousPageUrl() ?? '#' ?>" aria-label="Előző">
                    <span aria-hidden="true">&lsaquo;</span>
                </a>
            </li>

            <?php if (!in_array(1, $pages, true)): ?>
                <li class="page-item">
                    <a class="page-link tw-rounded-[8px]" href="<?= $paginator->url(1) ?>">1</a>
                </li>
                <?php if ($pages[0] > 2): ?>
                    <li class="page-item disabled">
                        <span class="page-link tw-rounded-[8px]">&hellip;</span>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            <?php foreach ($pages as $page): ?>
                <li class="page-item <?= $page === $currentPage ? 'active' : '' ?>">
                    <?php if ($page === $currentPage): ?>
                        <a class="page-link tw-rounded-[8px] tw-bg-[linear-gradient(135deg,#ef4444,#dc2626)] tw-border-transparent tw-text-white"
                           href="<?= $paginator->url($page) ?>"><?= $page ?></a>
                    <?php else: ?>
                        <a class="page-link tw-rounded-[8px]" href="<?= $paginator->url($page) ?>"><?= $page ?></a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>

            <?php if (!in_array($lastPage, $pages, true)): ?>
                <?php if ($pages[array_key_last($pages)] < $lastPage - 1): ?>
                    <li class="page-item disabled">
                        <span class="page-link tw-rounded-[8px]">&hellip;</span>
                    </li>
                <?php endif; ?>
                <li class="page-item">
                    <a class="page-link tw-rounded-[8px]" href="<?= $paginator->url($lastPage) ?>"><?= $lastPage ?></a>
                </li>
            <?php endif; ?>

            <li class="page-item <?= $currentPage >= $lastPage ? 'disabled' : '' ?>">
                <a class="page-link tw-rounded-[8px]" href="<?= $paginator->nextPageUrl() ?? '#' ?>" aria-label="Következő">
                    <span aria-hidden="true">&rsaquo;</span>
                </a>
            </li>

        </ul>
    </nav>

</div>
