<?php
namespace BrenoDouglas\Provider;

use Illuminate\Support\ServiceProvider;
use BrenoDouglas\Command\ScaffoldCommand;

class ScaffoldWrapperServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bindShared('command.create.backend.files', function() {
            return new ScaffoldCommand();
        });

        $this->commands('command.create.backend.files');
    }

    public function provides()
    {
        return [
            'command.create.backend.files'
        ];
    }

}