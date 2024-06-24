<?php

namespace Danidoble\Exposer\Support;

interface IBladeDirectives
{
    public function getManifestVersion(string $__dir, string $file, string $extension, ?string &$route = null): ?string;
}