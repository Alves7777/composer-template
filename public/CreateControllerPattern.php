<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class CreateControllerPattern extends GeneratorCommand
{
    protected $name = 'make:controller_pattern {nameClass}';

    protected $description = 'Create a new controller pattern class';

    protected $type = 'Controller Pattern';

    protected function replaceClass($stub, $name)
    {
        $stub = parent::replaceClass($stub, $name);
        return str_replace('GenericController', $this->argument('nameClass'), $stub);
    }
    protected function getStub()
    {
        return  app_path() . '/Console/Commands/Stubs/controller_pattern.stub';
    }
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Controllers';
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the controller pattern.'],
            ['nameClass', InputArgument::REQUIRED, 'The nameClass of the controller pattern.'],
        ];
    }
}
