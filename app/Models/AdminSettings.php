<?php

declare(strict_types=1);

namespace App\Models;

class AdminSettings extends Model
{
    protected $table = 'admin_settings';

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
