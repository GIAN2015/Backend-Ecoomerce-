<?php

namespace App\Services\Deltron;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class DeltronAuthService
{
    const CACHE_KEY = 'deltron_api_token';

    public function getToken(): string
    {
        return Cache::remember(self::CACHE_KEY, now()->addMinutes(50), function () {
            return $this->login();
        });
    }

    protected function login(): string
    {
        $url = config('services.deltron.base_url') . '/auth';

        $response = Http::timeout(20)->post($url, [
            'usuario'  => config('services.deltron.user'),
            'password' => config('services.deltron.password'),
        ]);

        if (! $response->successful()) {
            Log::error('Deltron Auth Failed', [
                'status' => $response->status(),
                'body'   => $response->body(),
            ]);

            throw new Exception('No se pudo autenticar con la API de Deltron');
        }

        $token = $response->json('token');

        if (! $token) {
            throw new Exception('Token no recibido desde Deltron');
        }

        return $token;
    }

    public function clearToken(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}
