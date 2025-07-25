<?php

namespace Lucasa\ComposerPhp;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Lucasa\ComposerPhp\Console\PublishCommand;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $this->publishAssets();
        $this->registerCommands();
    }

    public function register()
    {
        //
    }

    private function publishAssets()
    {
        $this->publishes([
            $this->packagePath('public/') => base_path('app/Console/Commands'),
        ], 'commands');
    }

    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                PublishCommand::class,
            ]);
        }
    }

    private function packagePath($path)
    {
        return __DIR__ . "/../$path";
    }
}
