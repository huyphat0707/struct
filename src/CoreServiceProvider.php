<?php

namespace P7\StructCore;

use P7\StructCore\Command\MakeRepository;
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
