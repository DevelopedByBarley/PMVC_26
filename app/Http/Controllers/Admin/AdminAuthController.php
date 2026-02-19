<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Core\Log;
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
        return $this->toast('danger', 'Invalid email or password.')->redirect('/admin/login');
      }

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
    return $this->toast('success', 'Sikeres kijelentkezés.')->redirect('/admin/login');
  }
}
