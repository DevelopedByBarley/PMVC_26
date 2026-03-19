<?php

declare(strict_types=1);

namespace Core;

use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManager;
use Symfony\Component\Security\Csrf\TokenGenerator\UriSafeTokenGenerator;
use Symfony\Component\Security\Csrf\TokenStorage\NativeSessionTokenStorage;

class CSRF
{
    private CsrfTokenManager $manager;

    public function __construct()
    {
        $this->manager = new CsrfTokenManager(
            new UriSafeTokenGenerator(),
            new NativeSessionTokenStorage()
        );
    }

    public function generateToken(string $tokenId): string
    {
        return $this->manager->getToken($tokenId)->getValue();
    }

    public function validateToken(string $tokenId, string $tokenValue): bool
    {
        return $this->manager->isTokenValid(new CsrfToken($tokenId, $tokenValue));
    }
}
