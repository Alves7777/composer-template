<?php

namespace Lucasa\ComposerPhp\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeDockerfileCommand extends Command
{
    protected $signature = 'la:dockerfile';
    protected $description = 'Cria ou atualiza o Dockerfile do projeto';

    public function handle()
    {
        $dockerfilePath = base_path('Dockerfile');
        $stubPath = __DIR__ . '/Stubs/Dockerfile.stub';

        if (!File::exists($stubPath)) {
            $this->error('Stub do Dockerfile não encontrado.');
            return;
        }
        
        File::put($dockerfilePath, File::get($stubPath));
        $this->info('Dockerfile criado/atualizado com sucesso!');
    }
}