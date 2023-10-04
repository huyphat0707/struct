<?php
namespace P7\StructCore\Command;

use Illuminate\Console\GeneratorCommand;
use Str;
class MakeHelper extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'core:helper {name} {--function=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a new helper';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/helper.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Helpers';
    }
    
    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $functionName = $this->option('function') ?: 'defaultFunction';

        $stub = parent::buildClass($name);
        $stub = str_replace('{{functionName}}', Str::camel($functionName), $stub);

        return $stub;
    }
}
