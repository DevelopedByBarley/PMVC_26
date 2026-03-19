<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminSettings;

class AdminSettingsController extends Controller
{
    public function index()
    {
        $adminId = $_SESSION['admin_id'] ?? null;
        $settings = AdminSettings::firstOrCreate(
            ['admin_id' => $adminId],
            ['theme' => 'light', 'language' => 'en', 'timezone' => 'Europe/Budapest']
        );

        return $this->view('pages.admin.settings.index', [
            'title'    => 'Beállítások',
            'settings' => $settings,
        ], 'layouts.admin-layout');
    }

    public function update()
    {
        $adminId = $_SESSION['admin_id'] ?? null;

        AdminSettings::where('admin_id', $adminId)->update([
            'theme'    => $_POST['theme'] ?? 'light',
            'language' => $_POST['language'] ?? 'en',
            'timezone' => $_POST['timezone'] ?? 'Europe/Budapest',
        ]);

        return $this->toast('success', 'Beállítások frissítve!')->redirect('/admin/settings');
    }
}
