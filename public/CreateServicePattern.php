<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class CreateServicePattern extends GeneratorCommand
{
    protected $name = 'make:service {nameClass}';

    protected $description = 'Create a new service class';

    protected $type = 'Service';

    protected function replaceClass($stub, $name)
    {
        $stub = parent::replaceClass($stub, $name);
        return str_replace('GenericService', $this->argument('nameClass'), $stub);
    }
    protected function getStub()
    {
        return  app_path() . '/Console/Commands/Stubs/service.stub';
    }
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Services';
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the service.'],
            ['nameClass', InputArgument::REQUIRED, 'The nameClass of the service.'],
        ];
    }
}
