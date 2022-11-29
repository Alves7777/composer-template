<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class CreateRepositoryPattern extends GeneratorCommand
{
    protected $name = 'make:repository {nameClass}';

    protected $description = 'Create a new repository class';

    protected $type = 'Repository';

    protected function replaceClass($stub, $name)
    {
        $stub = parent::replaceClass($stub, $name);
        return str_replace('GenericRepository', $this->argument('nameClass'), $stub);
    }
    protected function getStub()
    {
        return  app_path() . '/Console/Commands/Stubs/repository.stub';
    }
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Repositories';
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the repository.'],
            ['nameClass', InputArgument::REQUIRED, 'The nameClass of the repository.'],
        ];
    }
}
