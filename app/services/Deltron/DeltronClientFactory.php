<?php

namespace App\Services\Deltron;

use App\Services\Deltron\Mock\DeltronMockClient;
use App\Services\Deltron\Real\DeltronApiClient;

class DeltronClientFactory
{
    public static function make(): DeltronClientInterface
    {
        if (config('services.deltron.mode') === 'mock') {
            return new DeltronMockClient();
        }

        return new DeltronApiClient();
    }
}
