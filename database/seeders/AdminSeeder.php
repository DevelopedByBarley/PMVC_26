<?php

declare(strict_types=1);

namespace Database\Seeders;

class AdminSeeder
{
    public function run(): void
    {
        $user = db()::table('users')->select('id')->first();
        if ($user === null) {
            throw new \RuntimeException('No users found. Create at least one user before seeding admins.');
        }

        db()::table('admins')->delete();

        db()::table('admins')->insert([
            [
                'id' => "asd123ras",
                'level' => 1,
                'name' => 'Szaniszló Árpád',
                'email' => 'arpadsz@max.hu',
                'password' => password_hash('Csak1enter@', PASSWORD_DEFAULT),
                'avatar' => 'shark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
