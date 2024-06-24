<?php

namespace Danidoble\Exposer\Http\Controllers;

use Danidoble\Exposer\Support\BladeDirectives;
use Danidoble\Exposer\Support\Utils;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AssetsController extends Controller
{
    public function styles(): BinaryFileResponse
    {
        return new BinaryFileResponse('');
        // $route = route('assets.styles');
        // $version = (new BladeDirectives())->getManifestVersion('exposer', 'css', $route);
        // $path = realpath(__DIR__ . "/../../../dist/build/assets/exposer$version.css");
        // return Utils::pretendResponseIsFile($path, 'text/css');
    }

    public function scripts(): BinaryFileResponse
    {
        return new BinaryFileResponse('');
        // $route = route('assets.scripts');
        // $version = (new BladeDirectives())->getManifestVersion('exposer', 'js', $route);
        // $path = realpath(__DIR__ . "/../../../dist/build/assets/exposer$version.js");
        // return Utils::pretendResponseIsFile($path, 'text/javascript');
    }
}