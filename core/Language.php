<?php

declare(strict_types=1);

namespace Core;

class Language
{
    public const ALLOWED = ['hu', 'en', 'es'];
    public const DEFAULT  = 'en';
    public const COOKIE   = 'lang';
    public const TTL      = 3600 * 24 * 30;

    public static function get(): string
    {
        return $_COOKIE[self::COOKIE] ?? self::DEFAULT;
    }

    public static function set(): void
    {
        if (!empty($_COOKIE[self::COOKIE])) {
            return;
        }

        $header = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '';
        $first  = explode(',', $header)[0] ?? '';
        $lang   = strtolower(explode('-', explode(';', $first)[0])[0]);

        if (!in_array($lang, self::ALLOWED, true)) {
            $lang = self::DEFAULT;
        }

        self::apply($lang);
    }

    public static function switch(string $lang): void
    {
        $lang = strtolower($lang);

        if (!in_array($lang, self::ALLOWED, true)) {
            $lang = self::DEFAULT;
        }

        self::apply($lang);
    }

    private static function apply(string $lang): void
    {
        setcookie(self::COOKIE, $lang, [
            'expires'  => time() + self::TTL,
            'path'     => '/',
            'httponly' => false,
            'samesite' => 'Lax',
        ]);
        $_COOKIE[self::COOKIE] = $lang;
    }
}
