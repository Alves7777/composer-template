<?php

namespace App\Console\Commands\Api;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CreateCrudCommand extends Command
{
    protected $signature = 'la:crud {name}';
    protected $description = 'Cria Controller, Service, Repository e Routes para um CRUD completo de API';

    public function handle()
    {
        $name = $this->argument('name');
        if (!$name) {
            $this->error('O parâmetro name é obrigatório.');
            return;
        }

        $studly = Str::studly($name);
        $snake = Str::snake($name);
        $plural = Str::plural($snake);

        $this->createController($studly);
        $this->createService($studly);
        $this->createRepository($studly);
        $this->createRoutes($studly, $snake);

        $this->info("CRUD para {$studly} criado com sucesso!");
    }

    private function createController($name)
    {
        $stubPath = app_path('Console/Commands/Stubs/Api/controller_api.stub');
        $controllerPath = app_path("Http/Controllers/V1/{$name}Controller.php");

        if (!File::exists($stubPath)) {
            $this->error('Stub do controller não encontrado.');
            return;
        }

        $this->ensureDirectoryExists(dirname($controllerPath));
        
        $content = str_replace('{{className}}', $name, File::get($stubPath));
        File::put($controllerPath, $content);
        
        $this->info("Controller {$name}Controller criado.");
    }

    private function createService($name)
    {
        $stubPath = app_path('Console/Commands/Stubs/Api/service_api.stub');
        $servicePath = app_path("Services/{$name}Service.php");

        if (!File::exists($stubPath)) {
            $this->error('Stub do service não encontrado.');
            return;
        }

        $this->ensureDirectoryExists(dirname($servicePath));
        
        $content = str_replace('{{className}}', $name, File::get($stubPath));
        File::put($servicePath, $content);
        
        $this->info("Service {$name}Service criado.");
    }

    private function createRepository($name)
    {
        $stubPath = app_path('Console/Commands/Stubs/Api/repository_api.stub');
        $repositoryPath = app_path("Repositories/{$name}Repository.php");

        if (!File::exists($stubPath)) {
            $this->error('Stub do repository não encontrado.');
            return;
        }

        $this->ensureDirectoryExists(dirname($repositoryPath));
        
        $content = str_replace('{{className}}', $name, File::get($stubPath));
        File::put($repositoryPath, $content);
        
        $this->info("Repository {$name}Repository criado.");
    }

    private function createRoutes($name, $snake)
    {
        $stubPath = app_path('Console/Commands/Stubs/Api/route_api.stub');
        $routePath = base_path("routes/api/{$snake}.php");

        if (!File::exists($stubPath)) {
            $this->error('Stub da route não encontrado.');
            return;
        }

        $this->ensureDirectoryExists(dirname($routePath));
        
        $content = str_replace(
            ['{{className}}', '{{routeName}}'],
            [$name, $snake],
            File::get($stubPath)
        );
        File::put($routePath, $content);
        
        $this->info("Route {$snake}.php criada.");
    }

    private function ensureDirectoryExists($path)
    {
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }
    }
}