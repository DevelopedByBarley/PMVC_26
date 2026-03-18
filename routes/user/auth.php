<?php

  $router->get('/user/login',      [\App\Http\Controllers\User\UserAuthController::class, 'loginForm'])->name('user.login');
  $router->post('/user/login',     [\App\Http\Controllers\User\UserAuthController::class, 'login'])->name('user.login.submit');
  $router->get('/user/register',   [\App\Http\Controllers\User\UserAuthController::class, 'registerForm'])->name('user.register');
  $router->post('/user/register',  [\App\Http\Controllers\User\UserAuthController::class, 'register'])->name('user.register.submit');
  $router->post('/user/logout',    [\App\Http\Controllers\User\UserAuthController::class, 'logout'])->name('user.logout');
?>
