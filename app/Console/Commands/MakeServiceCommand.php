<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name : The name of the service}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    protected Filesystem $files;


    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Services/{$name}.php");

        if ($this->files->exists($path)) {
            $this->error("Service {$name} already exists!");
            return false;
        }

        $stub = $this->getStub();
        $this->files->ensureDirectoryExists(dirname($path));
        $this->files->put($path, str_replace('{{ class }}', $name, $stub));

        $this->info("Service {$name} created successfully.");
    }

    protected function getStub()
    {
        return "<?php

namespace App\Services;
class {{ class }} { 

    // Your service methods 

}";
    }
}
