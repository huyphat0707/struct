<?php

namespace P7\StructCore\Command;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakeCrud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'core:crud {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create CRUD files for a given model';

    /**
     * Handle creating files for CRUD operations of a model.
     *
     * @return void
     */
    public function handle()
    {
        $modelName = ucfirst($this->argument('name'));
        $this->createModel($modelName);
        $this->createController($modelName);
        $this->createMigration($modelName);
        $this->createService($modelName);
        $this->createRepository($modelName);
        $this->info('CRUD files generated successfully!');
    }

    /**
     * Create a new model.
     *
     * @param string $name The name of the model.
     * @return void
     */
    private function createModel($name)
    {
        Artisan::call('make:model', ['name' => "Models/{$name}"]);
    }

    /**
     * Create a new controller.
     *
     * @param string $name The name of the controller.
     * @return void
     */
    private function createController($name)
    {
        Artisan::call('make:controller', ['name' => "{$name}Controller",  '--resource' => true]);
    }

    /**
     * Create a new migration.
     *
     * @param string $name The name of the migration.
     * @return void
     */
    private function createMigration($name)
    {
        $migrationName = str_plural(strtolower($name));

        Artisan::call('make:migration', ['name' => $migrationName]);
    }

    /**
     * Create a new service.
     *
     * @param string $name The name of the service.
     * @return void
     */
    private function createService($name)
    {
        Artisan::call('core:service', ['name' => "{$name}Service"]);
    }


    /**
     * Create a new repository.
     *
     * @param string $name The name of the repository.
     * @return void
     */
    private function createRepository($name)
    {
        Artisan::call('core:repository', ['name' => "{$name}Repository"]);
    }
}
