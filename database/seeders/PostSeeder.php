<?php

declare(strict_types=1);

namespace Database\Seeders;

class PostSeeder
{
    public function run(): void
    {
        $user = db()::table('users')->select('id')->first();
        if ($user === null) {
            throw new \RuntimeException('No users found. Create at least one user before seeding posts.');
        }

        db()::table('posts')->delete();

        db()::table('posts')->insert([
            ['user_id' => (int) $user->id, 'body' => 'First seeded post body'],
            ['user_id' => (int) $user->id, 'body' => 'Second seeded post body'],
            ['user_id' => (int) $user->id, 'body' => 'Third seeded post body'],
        ]);
    }
}
