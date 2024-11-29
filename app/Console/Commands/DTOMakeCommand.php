<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class DTOMakeCommand extends GeneratorCommand
{
    protected $signature = 'make:dto {name}';

    protected $description = 'Create a new DTO class';

    protected function getStub()
    {
        return __DIR__ . '/stubs/dto.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\\DTOs';
    }
}
