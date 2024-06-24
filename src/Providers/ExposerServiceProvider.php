<?php

declare(strict_types=1);

namespace Danidoble\Exposer\Providers;

use Illuminate\Support\ServiceProvider;

final class ExposerServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void {
        BladeDirectives::register();
    }
}
