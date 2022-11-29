<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class CreateRoutePattern extends GeneratorCommand
{
    protected $name = 'make:route {nameClass}';

    protected $description = 'Create a new route class';

    protected $type = 'Route';

    protected function replaceClass($stub, $name)
    {
        $stub = parent::replaceClass($stub, $name);
        return str_replace('GenericRoute', $this->argument('nameClass'), $stub);
    }
    protected function getStub()
    {
        return  app_path() . '/Console/Commands/Stubs/route.stub';
    }
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Routes';
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the route.'],
            ['nameClass', InputArgument::REQUIRED, 'The nameClass of the route.'],
        ];
    }
}
