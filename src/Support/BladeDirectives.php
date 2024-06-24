<?php

namespace Danidoble\Exposer\Support;

class BladeDirectives implements IBladeDirectives
{
    public function getManifestVersion(string $file, string $extension, ?string &$route = null): ?string
    {
        $manifestPath = dirname(__DIR__, 3) . '/dist/build/manifest.json';

        if (!file_exists($manifestPath)) {
            return null;
        }

        $manifest = json_decode(file_get_contents($manifestPath), $assoc = true);

        $path = 'resources/css/';
        $assets = 'assets/';

        $_file = $manifest[$path . $file . '.' . $extension]['file'];

        $version = str_replace($assets . $file, '', $_file);
        $version = str_replace('.' . $extension, '', $version);

        $route = $route ? "{$route}?id={$version}" : $route;

        return $version;
    }
}