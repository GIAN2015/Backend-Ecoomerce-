<?php

namespace App\Services\Deltron;

use App\Models\Product;
use App\Models\ProductStock;
use App\Models\ProductPrice;

class DeltronSyncService
{
    public function sync(): void
    {
        $client = DeltronClientFactory::make();

        $items = $client->getItems();
        $stocks = collect($client->getStock())->keyBy('ItemCode');

        foreach ($items as $item) {

            $product = Product::updateOrCreate(
                ['external_code' => $item['ItemCode']],
                [
                    'name' => $item['Description'],
                    'brand' => $item['Brand'],
                    'source' => 'deltron',
                ]
            );

            ProductPrice::updateOrCreate(
                ['product_id' => $product->id],
                [
                    'price' => $item['Price'],
                    'currency' => $item['Currency'],
                ]
            );

            ProductStock::updateOrCreate(
                ['product_id' => $product->id],
                [
                    'stock' => $stocks[$item['ItemCode']]['Stock'] ?? 0,
                ]
            );
        }
    }
}
