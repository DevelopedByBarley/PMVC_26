<?php

declare(strict_types=1);

namespace Database\Seeders;

class AdminSettingsSeeder
{
    public function run(): void
    {
        db()::table('admin_settings')->delete();

        db()::table('admin_settings')->insert([
            [
                'admin_id'   => 1,
                'theme'      => 'light',
                'language'   => 'en',
                'timezone'   => 'Europe/Budapest',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
