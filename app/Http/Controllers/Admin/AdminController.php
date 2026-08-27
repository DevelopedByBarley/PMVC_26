<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Registration;
use App\Services\RegistrationService;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function index(): Response
    {
        $adminId = $_SESSION['admin_id'] ?? null;
        $admin   = $adminId ? Admin::find($adminId) : null;
        $stats   = (new RegistrationService())->stats();

        return $this->view('pages.admin.dashboard', [
            'title'     => 'Admin Dashboard',
            'adminName' => $admin?->name ?? 'Admin',
            'stats'     => $stats,
            'statCards' => $this->statCards($stats),
            'recent'    => Registration::query()->orderByDesc('id')->limit(8)->get(),
        ], 'layouts.admin-layout');
    }

    /**
     * @param array<string,int> $stats
     * @return list<array{label:string,value:int,tone:string,url:string}>
     */
    private function statCards(array $stats): array
    {
        return [
            [
                'label' => 'Összes jelentkezés',
                'value' => (int) $stats['total'],
                'tone'  => '',
                'url'   => '/admin/registrations',
            ],
            [
                'label' => 'Elbírálásra vár',
                'value' => (int) $stats['pending'],
                'tone'  => 'is-pending',
                'url'   => '/admin/registrations?status=' . Registration::STATUS_PENDING,
            ],
            [
                'label' => 'Elfogadva',
                'value' => (int) $stats['approved'],
                'tone'  => 'is-approved',
                'url'   => '/admin/registrations?status=' . Registration::STATUS_APPROVED,
            ],
            [
                'label' => 'Elutasítva',
                'value' => (int) $stats['rejected'],
                'tone'  => 'is-rejected',
                'url'   => '/admin/registrations?status=' . Registration::STATUS_REJECTED,
            ],
        ];
    }
}
