<?php

  $router->get('/admin/login', [\App\Http\Controllers\Admin\AdminAuthController::class, 'loginForm'])->name('admin.login');
  $router->post('/admin/login', [\App\Http\Controllers\Admin\AdminAuthController::class, 'login'])->name('admin.login.submit');
  $router->post('/admin/logout', [\App\Http\Controllers\Admin\AdminAuthController::class, 'logout'])->name('admin.logout');
?>