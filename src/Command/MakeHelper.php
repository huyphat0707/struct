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
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/helper.stub';
    }

    public function handle()
    {
        $functionName = $this->option('function');

        if (!$functionName) {
            $functionName = $this->argument('name');
        }

        $functionName = Str::camel($functionName);
        $stub = $this->getStubContent();
        $stub = str_replace('{{functionName}}', $functionName, $stub);
        $this->files->put($this->getPath($this->getNameInput()), $stub);
    }

     /**
     * Get the content of the stub file.
     *
     * @return string
     */
    protected function getStubContent()
    {
        return $this->files->get(__DIR__ . '/stubs/helper.stub');
    }
}
