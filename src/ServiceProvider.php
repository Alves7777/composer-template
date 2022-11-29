<?php

namespace Lucasa\ComposerPhp;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $this->publishAssets();
    }

    private function publishAssets()
    {
        $this->publishes([
            $this->packagePath('public/') => base_path('app/Console/Commands'),
        ], 'commands');
    }

    private function packagePath($path)
    {
        return __DIR__ . "/../$path";
    }

}
