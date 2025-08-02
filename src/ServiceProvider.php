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

        // Publicações individuais - Comandos View (incluindo seus stubs)
        $this->publishes([
            $this->packagePath('public/View/CreateControllerPattern.php') => base_path('app/Console/Commands/View/CreateControllerPattern.php'),
            $this->packagePath('public/Stubs/View/controller_view.stub') => base_path('app/Console/Commands/Stubs/View/controller_view.stub'),
        ], 'commands-createcontrollerpattern');

        $this->publishes([
            $this->packagePath('public/View/CreateRepositoryPattern.php') => base_path('app/Console/Commands/View/CreateRepositoryPattern.php'),
            $this->packagePath('public/Stubs/View/repository_view.stub') => base_path('app/Console/Commands/Stubs/View/repository_view.stub'),
        ], 'commands-createrepositorypattern');

        $this->publishes([
            $this->packagePath('public/View/CreateRoutePattern.php') => base_path('app/Console/Commands/View/CreateRoutePattern.php'),
            $this->packagePath('public/Stubs/View/route_view.stub') => base_path('app/Console/Commands/Stubs/View/route_view.stub'),
        ], 'commands-createroutepattern');

        $this->publishes([
            $this->packagePath('public/View/CreateServicePattern.php') => base_path('app/Console/Commands/View/CreateServicePattern.php'),
            $this->packagePath('public/Stubs/View/service_view.stub') => base_path('app/Console/Commands/Stubs/View/service_view.stub'),
        ], 'commands-createservicepattern');

        // Publicações individuais - Comandos API (incluindo seus stubs)
        $this->publishes([
            $this->packagePath('public/Api/UpdateMasterController.php') => base_path('app/Console/Commands/Api/UpdateMasterController.php'),
            $this->packagePath('public/Stubs/Api/Controller.stub') => base_path('app/Console/Commands/Stubs/Api/Controller.stub'),
        ], 'commands-updatemastercontroller');

        $this->publishes([
            $this->packagePath('public/Api/CreateCrudCommand.php') => base_path('app/Console/Commands/Api/CreateCrudCommand.php'),
            $this->packagePath('public/Stubs/Api/controller_api.stub') => base_path('app/Console/Commands/Stubs/Api/controller_api.stub'),
            $this->packagePath('public/Stubs/Api/service_api.stub') => base_path('app/Console/Commands/Stubs/Api/service_api.stub'),
            $this->packagePath('public/Stubs/Api/repository_api.stub') => base_path('app/Console/Commands/Stubs/Api/repository_api.stub'),
            $this->packagePath('public/Stubs/Api/route_api.stub') => base_path('app/Console/Commands/Stubs/Api/route_api.stub'),
        ], 'commands-createcrudcommand');

        // Publicações individuais - Comandos Docker (incluindo seus stubs)
        $this->publishes([
            $this->packagePath('public/MakeDockerComposeCommand.php') => base_path('app/Console/Commands/MakeDockerComposeCommand.php'),
            $this->packagePath('public/Stubs/docker-compose.stub') => base_path('app/Console/Commands/Stubs/docker-compose.stub'),
        ], 'commands-makedockercomposecommand');

        $this->publishes([
            $this->packagePath('public/MakeDockerfileCommand.php') => base_path('app/Console/Commands/MakeDockerfileCommand.php'),
            $this->packagePath('public/Stubs/Dockerfile.stub') => base_path('app/Console/Commands/Stubs/Dockerfile.stub'),
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
