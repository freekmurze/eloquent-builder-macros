<?php

namespace Exyplis\EloquentBuilderMacros;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class EloquentBuilderMacrosServiceProvider extends ServiceProvider
{
    public function register()
    {
        Collection::make(glob(__DIR__.'/Macros/*.php'))->mapWithKeys(function ($path) {
            return [$path => pathinfo($path, PATHINFO_FILENAME)];
        })->each(function ($macro, $path) {
            require_once $path;
        });
    }
}
