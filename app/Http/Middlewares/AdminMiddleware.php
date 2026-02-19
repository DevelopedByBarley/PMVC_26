<?php

declare(strict_types=1);

namespace App\Http\Middlewares;

use Closure;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle($request, Closure $next): Response
    {
        // Példa: sessionből nézzük, admin-e
        $isAdmin = isset($_SESSION['admin_id']) && $_SESSION['admin_id'] === 1;

        if (!$isAdmin) {
            return new Response('Forbidden', 403);
        }

        return $next($request);
    }
}
