<?php

namespace Aesis\Scopes\LaravelScopes;

use Composer\InstalledVersions;
use Illuminate\Foundation\Console\AboutCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelScopesServiceProvider extends PackageServiceProvider
{

    protected function registerAbout(): void
    {
        if (! class_exists(InstalledVersions::class) || ! class_exists(AboutCommand::class)) {
            return;
        }

        AboutCommand::add('Laravel Scopes', static fn () => [
            'Author' => 'Danila Mikhalev <danila@dan-mi.ru>',
            'Version' => InstalledVersions::getPrettyVersion('curly-deni/laravel-scopes'),
        ]);
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-scopes');
    }
}
