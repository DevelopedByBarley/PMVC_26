<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\RegistrationController;

/** Regisztrációk kezelése – minden route admin belépést igényel. */

$router->group([
    'prefix'     => 'admin/registrations',
    'as'         => 'admin.registrations.',
    'middleware' => 'admin',
], function () use ($router): void {
    $router->get('/', [RegistrationController::class, 'index'])->name('index');
    $router->get('/export', [RegistrationController::class, 'export'])->name('export');
    $router->get('/{id}', [RegistrationController::class, 'show'])->whereNumber('id')->name('show');

    $router->post('/{id}/approve', [RegistrationController::class, 'approve'])->whereNumber('id')->name('approve');
    $router->post('/{id}/reject', [RegistrationController::class, 'reject'])->whereNumber('id')->name('reject');
    $router->post('/{id}/revert', [RegistrationController::class, 'revert'])->whereNumber('id')->name('revert');
    $router->post('/{id}/note', [RegistrationController::class, 'note'])->whereNumber('id')->name('note');
    $router->post('/{id}/delete', [RegistrationController::class, 'destroy'])->whereNumber('id')->name('delete');
});
