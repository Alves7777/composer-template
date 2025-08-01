<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class UpdateMainController extends Command
{
    protected $signature = 'make:update-main-controller';
    protected $description = 'Atualiza o Controller principal com métodos de response padrão';

    public function handle()
    {
        $controllerPath = base_path('app/Http/Controllers/Controller.php');
        $stubPath = app_path('Console/Commands/Stubs/Controller.stub');

        if (!File::exists($controllerPath)) {
            $this->error('Controller principal não encontrado.');
            return;
        }
        if (!File::exists($stubPath)) {
            $this->error('Stub do Controller não encontrado.');
            return;
        }
        File::put($controllerPath, File::get($stubPath));
        $this->info('Controller principal atualizado com sucesso!');
    }
}