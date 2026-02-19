<?php

declare(strict_types=1);

namespace App\Http;

use App\Models\User;
use Core\Session;
use Core\ValidationException;

class HomeController extends Controller
{

    public function index()
    {
        return $this->view('pages.home', [
            'title' => 'PMVC Home',
            'heading' => 'Welcome Home',
            'message' => 'This page is rendered from HomeController using view.php files and layouts folder.',
            'errors' => Session::get('errors'),
            'old' => Session::get('old'),
        ]);
    }

    public function store()
    {
        $data = [
            'name' => trim($_POST['name'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'password' => trim($_POST['password'] ?? ''),
        ];
        try {
            $validator = validator()->make($data, [
                'name' => 'required|min:3|max:100',
                'email' => 'required|email|max:100|unique:users,email',
                'password' => 'required|min:6|max:255',
            ]);

            if ($validator->fails()) {
                ValidationException::throw(
                    $validator->errors()->toArray(),
                    ['name' => $data['name'], 'email' => $data['email']]
                );
            }

            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            ]);

            Session::flash('success', 'Sikeres beküldés.');

            return $this->toast('success', 'Sikeres beküldés.')->redirect('/');
        } catch (ValidationException $e) {
            Session::flash('errors', $e->errors);
            Session::flash('old', $e->old);
            return $this->alert('error', 'Hiba történt a beküldés során.')->response('', 302, ['Location' => '/']);
        }




        return $this->view('pages.home', [
            'title' => 'PMVC Home',
            'heading' => 'Welcome Home',
            'message' => 'This page is rendered from HomeController using view.php files and layouts folder.',
            'success' => 'Sikeres beküldés.',
            'old' => $data,
        ]);
    }
}
