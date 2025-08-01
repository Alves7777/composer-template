<?php

namespace Lucasa\ComposerPhp\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CreateCrudCommand extends Command
{
    protected $signature = 'la:crud {--Name=}';
    protected $description = 'Cria Controller, Service, Repository, Model e Requests para um CRUD completo';

    public function handle()
    {
        $name = $this->option('Name');
        if (!$name) {
            $this->error('O parâmetro --Name é obrigatório.');
            return;
        }

        $studly = Str::studly($name);
        $snake = Str::snake($name);
        $plural = Str::pluralStudly($studly);

        $controllerPath = app_path("Http/Controllers/V1/{$studly}/{$studly}Controller.php");
        $servicePath = app_path("Services/{$studly}/{$studly}Service.php");
        $repositoryPath = app_path("Repositories/{$studly}/{$studly}Repository.php");
        $modelPath = app_path("Routes/{$studly}/{$studly}.php");
        $modelPath = app_path("Requests/{$studly}/{$studly}.php");
    }
}