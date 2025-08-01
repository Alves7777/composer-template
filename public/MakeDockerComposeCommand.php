<?php

namespace Lucasa\ComposerPhp\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeDockerComposeCommand extends Command
{
    protected $signature = 'la:docker-compose {--container=app} {--app-port=8090} {--mysql-port=3310}';
    protected $description = 'Cria ou atualiza o docker-compose.yml do projeto';

    public function handle()
    {
        $container = $this->option('container') ?? 'app';
        $appPort = $this->option('app-port') ?? '8090';
        $mysqlPort = $this->option('mysql-port') ?? '3310';
        $composePath = base_path('docker-compose.yml');
        $stubPath = __DIR__ . '/Stubs/docker-compose.stub';

        if (!File::exists($stubPath)) {
            $this->error('Stub do docker-compose não encontrado.');
            return;
        }

        $stub = File::get($stubPath);
        $content = str_replace(
            ['{{container}}', '{{app_port}}', '{{mysql_port}}'],
            [$container, $appPort, $mysqlPort],
            $stub
        );

        File::put($composePath, $content);
        $this->info('docker-compose.yml criado/atualizado com sucesso!');
    }
}