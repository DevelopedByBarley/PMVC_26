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

    /**
     * A tényleges, támogatott nyelv (hu vagy en) – ezt használják a view-k.
     */
    public static function current(): string
    {
        return self::get() === 'hu' ? 'hu' : 'en';
    }

    /**
     * Nyelvi fájl betöltése: resources/lang/{nyelv}/{fájl}.php
     * Ha az adott nyelven nincs meg, a DEFAULT nyelvre esik vissza.
     *
     * @return array<string,mixed>
     */
    public static function load(string $file, ?string $lang = null): array
    {
        $lang = $lang ?? self::current();

        foreach ([$lang, self::DEFAULT] as $candidate) {
            $path = base_path("resources/lang/{$candidate}/{$file}.php");

            if (is_file($path)) {
                return (array) require $path;
            }
        }

        throw new \RuntimeException("Nyelvi fájl nem található: {$file}");
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
