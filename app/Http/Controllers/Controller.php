<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Core\Session;
use Core\Storage;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller
{
    protected  $storage;

    public function __construct()
    {
        // You can put common logic for all controllers here, like middleware handling, etc.
        $this->storage = new Storage();
    }

    protected function json(array $data, int $status = 200, array $headers = []): JsonResponse
    {
        return new JsonResponse($data, $status, $headers);
    }

    protected function response(string $content = '', int $status = 200, array $headers = []): Response
    {
        return new Response($content, $status, $headers);
    }

    protected function redirect(string $url, int $status = 302, array $headers = []): Response
    {
        return new Response('', $status, array_merge($headers, ['Location' => $url]));
    }

    protected function toast(string $type = 'info', ?string $message = null, ?string $title = null, int $delay = 4000): self
    {
        $tone = match ($type) {
            'success' => 'text-bg-success',
            'warning' => 'text-bg-warning',
            'danger', 'error' => 'text-bg-danger',
            'primary' => 'text-bg-primary',
            'secondary' => 'text-bg-secondary',
            default => 'text-bg-info',
        };

        Session::flash('toast', [
            'title' => $title ?? ucfirst($type),
            'message' => $message ?? 'Művelet végrehajtva.',
            'autohide' => true,
            'delay' => $delay,
            'show' => true,
            'class' => trim($tone . ' border-0'),
            'header_class' => 'border-0',
        ]);

        return $this;
    }

    protected function alert(string $type = 'info', ?string $message = null, ?string $heading = null, bool $dismissible = false): self
    {
        $tone = match ($type) {
            'success' => 'alert-success',
            'warning' => 'alert-warning',
            'danger', 'error' => 'alert-danger',
            'primary' => 'alert-primary',
            'secondary' => 'alert-secondary',
            default => 'alert-info',
        };

        Session::flash('alert', [
            'heading' => $heading ?? ucfirst($type),
            'message' => $message ?? 'Művelet végrehajtva.',
            'dismissible' => $dismissible,
            'class' => trim($tone . ($dismissible ? ' alert-dismissible fade show' : '')),
        ]);

        return $this;
    }

    protected function view(string $view, array $data = [], ?string $layout = 'layouts.layout-view'): Response
    {
        $viewPath = $this->resolveViewPath($view);
        $content = $this->renderPhp($viewPath, $data);

        if ($layout !== null) {
            $layoutPath = $this->resolveViewPath($layout);
            $content = $this->renderPhp($layoutPath, array_merge($data, ['content' => $content]));
        }

        return new Response($content);
    }

    private function resolveViewPath(string $view): string
    {
        $relativePath = str_replace('.', '/', $view);
        $path = base_path('resources/views/' . $relativePath . '.view.php');

        if (!is_file($path)) {
            $path = base_path('resources/views/' . $relativePath . '.php');
        }

        if (!is_file($path)) {
            throw new \RuntimeException("View not found: {$view}");
        }

        return $path;
    }

    private function renderPhp(string $path, array $data): string
    {
        extract($data, EXTR_SKIP);
        ob_start();
        require $path;

        return (string) ob_get_clean();
    }
}
