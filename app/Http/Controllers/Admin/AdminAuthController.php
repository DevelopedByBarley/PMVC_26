<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Core\Log;
use Core\RateLimiter;
use Core\Session;
use Core\ValidationException;

class AdminAuthController extends Controller
{
  public function loginForm()
  {

    if(Session::has('admin_id')) {
      return $this->redirect('/admin/dashboard');
    }

    return $this->view('pages.admin.auth.login', [
      'title' => 'Admin Login',
      'heading' => 'Admin Panel Login',
      'message' => 'Please enter your admin credentials to access the dashboard.',
    ], 'layouts.admin-layout');
  }


  public function login()
  {
    $limiter = new RateLimiter(maxAttempts: 5, decaySeconds: 900);
    $action  = 'admin-login';

    if ($limiter->isBlocked($action)) {
      $wait = ceil($limiter->availableIn($action) / 60);
      return $this->toast('danger', "Túl sok sikertelen kísérlet. Próbáld újra {$wait} perc múlva.")->redirect('/admin/login');
    }

    $data = [
      'email' => trim($_POST['email'] ?? ''),
      'password' => trim($_POST['password'] ?? ''),
    ];
    try {
      $validator = validator()->make($data, [
        'email' => 'required|email|max:100',
        'password' => 'required|min:6|max:255',
      ]);

      if ($validator->fails()) {
        ValidationException::throw(
          $validator->errors()->toArray(),
          ['email' => $data['email']]
        );
      }

      $admin = Admin::where('email', $data['email'])->first();

      if (!$admin || !password_verify($data['password'], $admin->password)) {
        $limiter->attempt($action);
        $remaining = $limiter->remainingAttempts($action);
        $msg = $remaining > 0
          ? "Hibás email vagy jelszó. Még {$remaining} kísérlet maradt."
          : 'Hibás email vagy jelszó. A fiók 15 percre zárolva.';
        return $this->toast('danger', $msg)->redirect('/admin/login');
      }

      $limiter->clear($action);

      // Regenerate session ID to prevent session fixation
      session_regenerate_id(true);
      Session::put('admin_id', $admin->id);

      return $this->toast('success', 'Sikeres beküldés.')->redirect('/admin/dashboard');
    } catch (ValidationException $e) {
      Session::flash('errors', $e->errors);
      Session::flash('old', $e->old);
      return $this->alert('error', 'Hiba történt a beküldés során.')->response('', 302, ['Location' => '/admin/login']);
    }
  }


  public function logout()
  {
    Session::unset('admin_id');
    return $this->alert('success', 'Sikeres kijelentkezés.', null, true)->redirect('/admin/login');
  }
}
