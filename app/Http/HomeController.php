<?php

declare(strict_types=1);

namespace App\Http;

class HomeController extends Controller
{

    public function index()
    {
        return $this->view('pages.home', [
            'title' => 'PMVC Home',
            'heading' => 'Welcome Home',
            'message' => 'This page is rendered from HomeController using view.php files and layouts folder.',
        ]);
    }
}
