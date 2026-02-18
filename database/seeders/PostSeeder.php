<?php

declare(strict_types=1);

namespace Database\Seeders;

class PostSeeder
{
    public function run(): void
    {
        $post = db()::table('posts')->select('id')->first();
        if ($post === null) {
            throw new \RuntimeException('No posts found. Create at least one post before seeding posts.');
        }

        db()::table('posts')->delete();

        db()::table('posts')->insert([
            ['user_id' => (int) $post->id, 'body' => 'First seeded post body'],
            ['user_id' => (int) $post->id, 'body' => 'Second seeded post body'],
            ['user_id' => (int) $post->id, 'body' => 'Third seeded post body'],
        ]);
    }
}
