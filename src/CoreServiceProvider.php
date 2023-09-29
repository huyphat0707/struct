<?php

namespace Cris\StructCore;

use Cris\StructCore\Command\MakeRepository;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
			$this->commands([
				MakeRepository::class
			]);
		}
    }
}
