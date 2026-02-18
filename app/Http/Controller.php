<?php

declare(strict_types=1);

namespace App\Http;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller
{
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
