<?php

namespace LaraZeus\Progress;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ProgressServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('lara-zeus-progress')
            ->hasViews();
    }
}
