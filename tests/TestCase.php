<?php

namespace LaraZeus\Progress\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use LaraZeus\Progress\ProgressServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            ProgressServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }
}
