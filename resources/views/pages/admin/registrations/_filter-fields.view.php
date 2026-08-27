<?php

/**
 * Az aktuális szűrés rejtett mezőkként – így a lista művelet (elfogad/elutasít)
 * után ugyanoda, ugyanazzal a szűréssel tér vissza a felhasználó.
 *
 * @var array $filters
 * @var \Illuminate\Pagination\LengthAwarePaginator $registrations
 */

$hidden = [
    'f_status' => $filters['status'] ?? null,
    'f_type'   => $filters['type'] ?? null,
    'f_mode'   => $filters['mode'] ?? null,
    'f_q'      => $filters['q'] ?? null,
    'f_page'   => $registrations->currentPage() > 1 ? (string) $registrations->currentPage() : null,
];

foreach ($hidden as $name => $value) {
    if ($value === null || $value === '') {
        continue;
    }

    echo '<input type="hidden" name="' . e($name) . '" value="' . e((string) $value) . '">';
}
