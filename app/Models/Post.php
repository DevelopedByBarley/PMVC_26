<?php

declare(strict_types=1);

namespace App\Models;

class Post extends Model
{
    protected $table = 'posts';

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
