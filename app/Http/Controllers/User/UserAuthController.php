<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Core\Session;
use Core\ValidationException;

class UserAuthController extends Controller
{
  public function loginForm()
  {
    if (Session::has('user_id')) {
      return $this->redirect('/');
    }

    return $this->view('pages.user.auth.login', [
      'title' => 'Bejelentkezés',
    ]);
  }

  public function login()
  {
    $this->verifyCsrf('user_login');

    $data = [
      'email'    => trim($_POST['email'] ?? ''),
      'password' => trim($_POST['password'] ?? ''),
    ];

    try {
      $validator = validator()->make($data, [
        'email'    => 'required|email|max:100',
        'password' => 'required|min:6|max:255',
      ]);



      if ($validator->fails()) {
        ValidationException::throw(
          $validator->errors()->toArray(),
          ['email' => $data['email']]
        );
      }

      $user = User::where('email', $data['email'])->first();

      
      if (!$user || !password_verify($data['password'], $user->password)) {
        return $this->toast('danger', 'Hibás email vagy jelszó.')->redirect('/user/login');
      }

      session_regenerate_id(true);
      Session::put('user_id', $user->id);

      return $this->toast('success', 'Sikeres bejelentkezés.')->redirect('/');
    } catch (ValidationException $e) {
      Session::flash('errors', $e->errors);
      Session::flash('old', $e->old);
      return $this->alert('error', 'Hiba történt a bejelentkezés során.')->response('', 302, ['Location' => '/user/login']);
    }
  }

  public function registerForm()
  {
    if (Session::has('user_id')) {
      return $this->redirect('/');
    }

    return $this->view('pages.user.auth.register', [
      'title' => 'Regisztráció',
    ]);
  }

  public function register()
  {
    $this->verifyCsrf('user_register');

    $data = [
      'name'             => trim($_POST['name'] ?? ''),
      'email'            => trim($_POST['email'] ?? ''),
      'password'         => trim($_POST['password'] ?? ''),
      'password_confirm' => trim($_POST['password_confirm'] ?? ''),
    ];

    try {
      $validator = validator()->make($data, [
        'name'             => 'required|min:3|max:100',
        'email'            => 'required|email|max:100',
        'password'         => 'required|min:8|max:255',
        'password_confirm' => 'required|min:8|max:255',
      ]);

      if ($validator->fails()) {
        ValidationException::throw(
          $validator->errors()->toArray(),
          ['name' => $data['name'], 'email' => $data['email']]
        );
      }

      if ($data['password'] !== $data['password_confirm']) {
        ValidationException::throw(
          ['password_confirm' => ['A két jelszó nem egyezik meg.']],
          ['name' => $data['name'], 'email' => $data['email']]
        );
      }

      if (User::where('email', $data['email'])->first()) {
        ValidationException::throw(
          ['email' => ['Ez az email cím már foglalt.']],
          ['name' => $data['name'], 'email' => $data['email']]
        );
      }

      User::create([
        'name'     => $data['name'],
        'email'    => $data['email'],
        'password' => password_hash($data['password'], PASSWORD_BCRYPT),
      ]);

      return $this->toast('success', 'Sikeres regisztráció! Kérlek jelentkezz be.')->redirect('/user/login');
    } catch (ValidationException $e) {
      Session::flash('errors', $e->errors);
      Session::flash('old', $e->old);
      return $this->alert('error', 'Hiba történt a regisztráció során.')->response('', 302, ['Location' => '/user/register']);
    }
  }

  public function logout()
  {
    Session::unset('user_id');
    return $this->alert('success', 'Sikeres kijelentkezés.', null, true)->redirect('/user/login');
  }
}
