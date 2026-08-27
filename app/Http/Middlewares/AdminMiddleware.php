<?php

declare(strict_types=1);

namespace App\Http\Middlewares;

use Closure;
use Core\Session;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle($request, Closure $next): Response
    {
        if (!checkAuth('admin')) {
            Session::flash('toast', [
                'title' => 'Belépés szükséges',
                'message' => 'Az admin felülethez be kell jelentkezni.',
                'class' => 'text-bg-warning border-0',
                'header_class' => 'border-0',
                'autohide' => true,
                'delay' => 4000,
                'show' => true,
            ]);

            return new Response('', 302, ['Location' => '/admin/login']);
        }

        return $next($request);
    }
}
