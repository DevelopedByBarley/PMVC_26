<?php

declare(strict_types=1);

namespace App\Http;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return $this->json([
            'data' => Post::query()->get()->toArray(),
        ]);
    }

    public function show(string $id)
    {
        $post = Post::query()->findOrFail($id);

        return $this->json([
            'data' => $post->toArray(),
        ]);
    }
}
