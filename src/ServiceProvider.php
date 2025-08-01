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

        // Publica a pasta Stubs
        $this->publishes([
            $this->packagePath('public/Stubs/') => base_path('app/Console/Commands/Stubs'),
        ], 'commands');

        $files = [
            'View/CreateControllerPattern.php',
            'View/CreateRepositoryPattern.php',
            'View/CreateRoutePattern.php',
            'View/CreateServicePattern.php',
            'Api/UpdateMainController.php',
            'Api/CreateCrudCommand.php',
            'MakeDockerComposeCommand.php',
            'MakeDockerfileCommand.php',
        ];
        foreach ($files as $file) {
            $this->publishes([
                $this->packagePath('public/' . $file) => base_path('app/Console/Commands/' . $file),
            ], 'commands-' . strtolower(str_replace('.php', '', $file)));
        }
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
