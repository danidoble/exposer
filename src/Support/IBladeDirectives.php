<?php

namespace Danidoble\Exposer\Support;

interface IBladeDirectives
{
    public function getManifestVersion(string $file, string $extension, ?string &$route = null): ?string;
}