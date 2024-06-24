<?php

namespace Danidoble\Exposer\Facades;

use Danidoble\Exposer\Support\BladeDirectives;
use Illuminate\Support\Facades\Facade;

class ExposerDirectives extends Facade
{
    /**
     * @method static string|null getManifestVersion(string $file, ?string &$route = null)
     */
    protected static function getFacadeAccessor(): string
    {
        return BladeDirectives::class;
    }
}