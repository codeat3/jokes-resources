<?php

namespace Codeat3\JokesResources;

use Generator;
use Illuminate\Support\ServiceProvider;

class JokesResourcesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('jokes-resources.php'),
            ], 'jokes-resources-config');

        }

        if ($this->app->runningInConsole()) {
            $directory = __DIR__.'/../database/migrations';
            $generator = function (string $directory): Generator {
                foreach ($this->app->make('files')->allFiles($directory) as $file) {
                    yield $file->getPathname() => $this->app->databasePath(
                        'migrations/'.$file->getFilename()
                    );
                }
            };

            $this->publishes(iterator_to_array($generator($directory)), 'jokes-resources-migrations');
        }
    }
}
