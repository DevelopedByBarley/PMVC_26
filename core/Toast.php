<?php

declare(strict_types=1);

namespace Core;

final class Toast
{
    public static function resolve(mixed $config = null): array
    {
        $resolved = [];

        if (is_array($config) && $config !== []) {
            $resolved = $config;
        } else {
            $sessionValue = null;
            if (class_exists(Session::class)) {
                $sessionValue = Session::get('toast');
            }
            if ($sessionValue === null && isset($_SESSION['toast'])) {
                $sessionValue = $_SESSION['toast'];
            }
            if (is_string($sessionValue)) {
                $resolved = ['message' => $sessionValue];
            } elseif (is_array($sessionValue)) {
                $resolved = $sessionValue;
            }
        }

        $resolved += [
            'id' => null,
            'title' => null,
            'message' => '',
            'timestamp' => null,
            'icon' => null,
            'icon_is_html' => false,
            'autohide' => true,
            'delay' => 5000,
            'show' => false,
            'class' => '',
            'header_class' => '',
            'body_class' => '',
            'attrs' => [],
        ];

        if (!is_array($resolved['attrs'] ?? null)) {
            $resolved['attrs'] = [];
        }

        $baseClass = 'toast fade' . ($resolved['show'] ? ' show' : '');
        $resolved['class_attr'] = trim($baseClass . ' ' . ($resolved['class'] ?? ''));
        $resolved['attrs'] = array_merge(
            [
                'role' => 'alert',
                'aria-live' => 'assertive',
                'aria-atomic' => 'true',
                'data-bs-autohide' => $resolved['autohide'] ? 'true' : 'false',
                'data-bs-delay' => (string) $resolved['delay'],
            ],
            $resolved['attrs']
        );

        return $resolved;
    }
}
