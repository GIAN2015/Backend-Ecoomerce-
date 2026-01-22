<?php

namespace App\Services\Deltron\Mock;

use App\Services\Deltron\DeltronClientInterface;

class DeltronMockClient implements DeltronClientInterface
{
    public function authenticate(): string
    {
        return 'mock-token-123456';
    }

    public function getItems(array $params = []): array
    {
        return [
            [
                'ItemCode' => 'DLT-001',
                'Description' => 'Laptop Gamer Mock',
                'Brand' => 'ASUS',
                'Price' => 4500,
                'Currency' => 'PEN',
                'UpdatedAt' => now()->toDateTimeString(),
            ],
            [
                'ItemCode' => 'DLT-002',
                'Description' => 'Mouse Logitech Mock',
                'Brand' => 'Logitech',
                'Price' => 120,
                'Currency' => 'PEN',
                'UpdatedAt' => now()->toDateTimeString(),
            ],
        ];
    }

    public function getStock(array $params = []): array
    {
        return [
            [
                'ItemCode' => 'DLT-001',
                'Stock' => 15,
            ],
            [
                'ItemCode' => 'DLT-002',
                'Stock' => 40,
            ],
        ];
    }
}
