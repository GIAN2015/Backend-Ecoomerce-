<?php

namespace App\Services\Deltron;

interface DeltronClientInterface
{
    public function authenticate(): string;

    public function getItems(array $params = []): array;

    public function getStock(array $params = []): array;
}
