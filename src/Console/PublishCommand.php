<?php

namespace Lucasa\ComposerPhp\Console;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    protected $signature = 'la:publish {--force : Overwrite any existing files}';

    protected $description = 'Publish all Command CRUD files';

    public function handle()
    {
        $this->call('vendor:publish', [
            '--tag' => 'commands',
            '--force' => $this->option('force'),
        ]);
    }
}
