<?php

declare(strict_types=1);

namespace Core;

final class Alert
{
    public static function resolve(mixed $config = null): array
    {
        $resolved = [];

        if (is_array($config) && $config !== []) {
            $resolved = $config;
        } else {
            $sessionValue = null;
            if (class_exists(Session::class)) {
                $sessionValue = Session::get('alert');
            }
            if ($sessionValue === null && isset($_SESSION['alert'])) {
                $sessionValue = $_SESSION['alert'];
            }
            if (is_string($sessionValue)) {
                $resolved = ['message' => $sessionValue];
            } elseif (is_array($sessionValue)) {
                $resolved = $sessionValue;
            }
        }

        $resolved += [
            'variant' => 'primary',
            'heading' => null,
            'message' => '',
            'icon' => null,
            'icon_is_html' => false,
            'dismissible' => false,
            'id' => null,
            'class' => '',
            'attrs' => [],
        ];

        if (!is_array($resolved['attrs'] ?? null)) {
            $resolved['attrs'] = [];
        }

        $resolved['attrs'] = array_merge(['role' => 'alert'], $resolved['attrs']);

        $baseClass = 'alert alert-' . $resolved['variant'];
        if ($resolved['dismissible']) {
            $baseClass .= ' alert-dismissible fade show';
        }
        $resolved['class_attr'] = trim($baseClass . ' ' . ($resolved['class'] ?? ''));

        return $resolved;
    }
}
