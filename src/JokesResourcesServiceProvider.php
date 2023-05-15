<?php

namespace Codeat3\JokesResources;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Codeat3\JokesResources\Commands\JokesResourcesCommand;
use Illuminate\Support\ServiceProvider;

class JokesResourcesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
