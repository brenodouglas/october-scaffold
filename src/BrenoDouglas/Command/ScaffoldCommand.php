<?php
namespace BrenoDouglas\Command;

use Illuminate\Console\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ScaffoldCommand extends Command
{
    protected $name = 'generate:scaffold';

    protected $description = 'create files for scaffold resource in plugin';

    /**
     * Calling commands for create resource
     */
    public function handle()
    {
        $this->call('create:model', [
            'pluginCode' => $this->argument('pluginCode'),
            'modelName' => $this->argument('name'),
            '--force' => $this->option('force')
        ]);

        $this->call('create:controller', [
            'pluginCode' => $this->argument('pluginCode'),
            'controllerName' => $this->argument('name'),
            '--force' => $this->option('force')
        ]);

        $this->call('create:component', [
            'pluginCode' => $this->argument('pluginCode'),
            'componentName' => $this->argument('name'),
            '--force' => $this->option('force')
        ]);

        $widget = $this->option('with-widget');

        if($widget) {
            $this->call('create:formwidget', [
                'pluginCode' => $this->argument('pluginCode'),
                'widgetName' => $this->argument('name'),
                '--force' => $this->option('force')
            ]);
        }

    }

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get the console command arguments.
     */
    protected function getArguments()
    {
        return [
            ['pluginCode', InputArgument::REQUIRED, 'The name of the plugin to create. Eg: RainLab.Blog'],
            ['name', InputArgument::REQUIRED, 'The name of the resource. Eg: Posts'],
        ];
    }

    /**
     * Get the console command options.
     */
    protected function getOptions()
    {
        return [
            ['force', null, InputOption::VALUE_NONE, 'Overwrite existing files with generated ones.'],
            ['with-widget', null, InputOption::VALUE_NONE, 'Create widget for resource']
        ];
    }
}