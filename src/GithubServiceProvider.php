<?php

namespace AlexisConception\Github;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use AlexisConception\Github\Commands\GithubCommand;

class GithubServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('github')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_github_table')
            ->hasCommand(GithubCommand::class);
    }
}
