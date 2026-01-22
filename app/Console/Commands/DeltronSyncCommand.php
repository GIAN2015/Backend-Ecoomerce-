<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Deltron\DeltronSyncService;

class DeltronSyncCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'deltron:sync';

    /**
     * The console command description.
     */
    protected $description = 'Sincroniza productos desde la API de Deltron';

    /**
     * Execute the console command.
     */
    public function handle(DeltronSyncService $service)
    {
        $service->sync();

        $this->info('✔ Sincronización Deltron ejecutada correctamente');
    }
}
