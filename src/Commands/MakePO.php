<?php

namespace Cqcqs\Mode\Commands;

use Illuminate\Console\GeneratorCommand;

class MakePO extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:po {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create PO Class File';

    /**
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/Stubs/PO.stub';
    }

    /**
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\PO';
    }
}