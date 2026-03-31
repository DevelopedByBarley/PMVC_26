<?php

declare(strict_types=1);

namespace Core;

class RateLimiter
{
    private string $storageDir;
    private int $maxAttempts;
    private int $decaySeconds;

    public function __construct(int $maxAttempts = 5, int $decaySeconds = 900)
    {
        $this->storageDir   = base_path('storage/rate_limits');
        $this->maxAttempts  = $maxAttempts;
        $this->decaySeconds = $decaySeconds;

        if (!is_dir($this->storageDir)) {
            mkdir($this->storageDir, 0755, true);
        }
    }

    private function key(string $action): string
    {
        $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
        return md5($ip . '|' . $action);
    }

    private function filePath(string $key): string
    {
        return $this->storageDir . '/' . $key . '.json';
    }

    private function load(string $key): array
    {
        $file = $this->filePath($key);

        if (!is_file($file)) {
            return ['attempts' => 0, 'reset_at' => time() + $this->decaySeconds];
        }

        $data = json_decode((string) file_get_contents($file), true);

        if (!is_array($data) || $data['reset_at'] <= time()) {
            return ['attempts' => 0, 'reset_at' => time() + $this->decaySeconds];
        }

        return $data;
    }

    private function save(string $key, array $data): void
    {
        file_put_contents($this->filePath($key), json_encode($data));
    }

    /**
     * Register an attempt. Returns true if still within limits, false if blocked.
     */
    public function attempt(string $action): bool
    {
        $key  = $this->key($action);
        $data = $this->load($key);

        $data['attempts']++;
        $this->save($key, $data);

        return $data['attempts'] <= $this->maxAttempts;
    }

    public function isBlocked(string $action): bool
    {
        $key  = $this->key($action);
        $data = $this->load($key);

        return $data['attempts'] >= $this->maxAttempts;
    }

    public function remainingAttempts(string $action): int
    {
        $key  = $this->key($action);
        $data = $this->load($key);

        return max(0, $this->maxAttempts - $data['attempts']);
    }

    /** Seconds until the lockout expires. */
    public function availableIn(string $action): int
    {
        $key  = $this->key($action);
        $data = $this->load($key);

        return max(0, $data['reset_at'] - time());
    }

    public function clear(string $action): void
    {
        $file = $this->filePath($this->key($action));
        if (is_file($file)) {
            unlink($file);
        }
    }
}
