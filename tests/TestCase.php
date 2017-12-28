<?php

namespace Exyplis\EloquentBuilderMacros\Tests;

use Exyplis\EloquentBuilderMacros\EloquentBuilderMacrosServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [EloquentBuilderMacrosServiceProvider::class];
    }
}

