<?php

namespace Cqcqs\Mode;

use Cqcqs\Mode\Commands\IdeHelperService;
use Cqcqs\Mode\Commands\MakeDTO;
use Cqcqs\Mode\Commands\MakePO;
use Cqcqs\Mode\Commands\MakeRepository;
use Cqcqs\Mode\Commands\MakeService;
use Illuminate\Support\ServiceProvider;

class ModeServiceProvider extends ServiceProvider
{
    protected $commands = [
        IdeHelperService::class,
        MakeDTO::class,
        MakePO::class,
        MakeService::class,
        MakeRepository::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }
}