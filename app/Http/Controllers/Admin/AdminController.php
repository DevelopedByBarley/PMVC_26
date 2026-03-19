<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        $adminId = $_SESSION['admin_id'] ?? null;
        $admin   = $adminId ? Admin::find($adminId) : null;

        return $this->view('pages.admin.dashboard', [
            'title'        => 'Admin Dashboard',
            'adminName'    => $admin?->name ?? 'Admin',
            'usersCount'   => User::count(),
            'adminsCount'  => Admin::count(),
            'recentUsers'  => User::latest()->paginate(1),
        ], 'layouts.admin-layout');
    }
}
