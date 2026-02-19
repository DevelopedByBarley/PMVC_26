<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return $this->view('pages.admin.dashboard', [
            'title' => 'Admin Dashboard',
        ], 'layouts.admin-layout');
    }
}
