<?php

namespace App\Http\Controllers;

use App\Services\DeltronSyncService;

class DeltronSyncController extends Controller
{
    public function syncProductos(DeltronSyncService $service)
    {
        return $service->syncItems();
    }

    public function syncPrecios(DeltronSyncService $service)
    {
        return $service->syncPrices();
    }

    public function syncStock(DeltronSyncService $service)
    {
        return $service->syncStock();
    }
}
