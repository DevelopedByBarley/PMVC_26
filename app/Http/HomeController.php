<?php

declare(strict_types=1);

namespace App\Http;

class HomeController extends Controller
{

    public function index()
    {
        return $this->response('Welcome to the Home Page!');
    }
}
