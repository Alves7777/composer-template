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
        // Publica todos os comandos de uma vez
        $this->publishes([
            $this->packagePath('public/') => base_path('app/Console/Commands'),
        ], 'commands');

        // Publica a pasta Stubs
        $this->publishes([
            $this->packagePath('public/Stubs/') => base_path('app/Console/Commands/Stubs'),
        ], 'stubs');

        // Publicações individuais - Comandos View
        $this->publishes([
            $this->packagePath('public/View/CreateControllerPattern.php') => base_path('app/Console/Commands/View/CreateControllerPattern.php'),
        ], 'commands-createcontrollerpattern');

        $this->publishes([
            $this->packagePath('public/View/CreateRepositoryPattern.php') => base_path('app/Console/Commands/View/CreateRepositoryPattern.php'),
        ], 'commands-createrepositorypattern');

        $this->publishes([
            $this->packagePath('public/View/CreateRoutePattern.php') => base_path('app/Console/Commands/View/CreateRoutePattern.php'),
        ], 'commands-createroutepattern');

        $this->publishes([
            $this->packagePath('public/View/CreateServicePattern.php') => base_path('app/Console/Commands/View/CreateServicePattern.php'),
        ], 'commands-createservicepattern');

        // Publicações individuais - Comandos API
        $this->publishes([
            $this->packagePath('public/Api/UpdateMainController.php') => base_path('app/Console/Commands/Api/UpdateMainController.php'),
        ], 'commands-updatemaincontroller');

        $this->publishes([
            $this->packagePath('public/Api/CreateCrudCommand.php') => base_path('app/Console/Commands/Api/CreateCrudCommand.php'),
        ], 'commands-createcrudcommand');

        // Publicações individuais - Comandos Docker
        $this->publishes([
            $this->packagePath('public/MakeDockerComposeCommand.php') => base_path('app/Console/Commands/MakeDockerComposeCommand.php'),
        ], 'commands-makedockercomposecommand');

        $this->publishes([
            $this->packagePath('public/MakeDockerfileCommand.php') => base_path('app/Console/Commands/MakeDockerfileCommand.php'),
        ], 'commands-makedockerfilecommand');
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
