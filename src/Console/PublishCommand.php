<?php

namespace Lucasa\ComposerPhp\Console;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    protected $signature = 'command:publish {--force : Overwrite any existing files}';

    protected $description = 'Publish all of the Command CRUD';

    public function handle()
    {
        $this->call('vendor:publish', [
            '--tag' => 'commands',
            '--force' => $this->option('force'),
        ]);
    }
}
