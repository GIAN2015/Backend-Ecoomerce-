<?php

namespace App\Services\Deltron\Real;

use App\Services\Deltron\DeltronClientInterface;

class DeltronApiClient implements DeltronClientInterface
{
    public function authenticate(): string
    {
        // aquí luego va CURL auth
        return '';
    }

    public function getItems(array $params = []): array
    {
        return [];
    }

    public function getStock(array $params = []): array
    {
        return [];
    }
}
