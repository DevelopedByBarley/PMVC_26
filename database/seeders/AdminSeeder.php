<?php

declare(strict_types=1);

namespace Database\Seeders;

class AdminSeeder
{
    public function run(): void
    {

        db()::table('admins')->delete();

        db()::table('admins')->insert([
            [
                'id' => "1",
                'name' => 'Szaniszló Árpád',
                'email' => 'arpadsz@max.hu',
                'password' => password_hash('Csak1enter@', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
