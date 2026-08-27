<?php

declare(strict_types=1);

use App\Http\Controllers\RegistrationController;

/** Publikus regisztráció (a landing oldal #register formja). */

$router->post('/registration', [RegistrationController::class, 'store'])
    ->name('registration.store');

$router->get('/registration/{token}', [RegistrationController::class, 'success'])
    ->where('token', '[a-f0-9]{48}')
    ->name('registration.success');
