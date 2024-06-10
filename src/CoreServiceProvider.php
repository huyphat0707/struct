<?php

namespace P7\StructCore;

use P7\StructCore\Command\MakeRepository;
use Illuminate\Support\ServiceProvider;
use P7\StructCore\Command\MakeService;
use P7\StructCore\Command\MakeHelper;
use P7\StructCore\Command\MakeCrud;
class CoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        foreach (glob(app_path() . '/Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
			$this->commands([
				MakeRepository::class,
				MakeHelper::class,
				MakeService::class,
				MakeCrud::class,
			]);
		}
    }
}
