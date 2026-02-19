<?php

declare(strict_types=1);

namespace Core;

use Psr\Log\LoggerInterface;
use RuntimeException;

class Log
{
    private static ?LoggerInterface $logger = null;

    public static function setLogger(LoggerInterface $logger): void
    {
        // Opcionális felülírás (pl. teszteknél) egyedi logger beszúrásához.
        self::$logger = $logger;
    }

    public static function logger(): LoggerInterface
    {
        // Ha már feloldottuk, a cache-elt példányt használjuk.
        if (self::$logger instanceof LoggerInterface) {
            return self::$logger;
        }

        // Lusta (lazy) feloldás az app containerből.
        $logger = app('logger');
        if (!$logger instanceof LoggerInterface) {
            throw new RuntimeException('Logger service is not available.');
        }

        // Cache-eljük a későbbi hívásokhoz.
        self::$logger = $logger;

        return $logger;
    }

    public static function __callStatic(string $method, array $arguments): mixed
    {
        // Tetszőleges statikus hívást (info, error, warning, stb.) a PSR loggerhez továbbít.
        $logger = self::logger();
        if (!method_exists($logger, $method)) {
            throw new RuntimeException("Logger method '{$method}' does not exist.");
        }

        return $logger->{$method}(...$arguments);
    }
}
