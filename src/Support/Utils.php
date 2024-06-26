<?php

namespace Danidoble\Exposer\Support;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * This class is a copy of Livewire's Utils class.
 * The purpose of this class is to serve static assets without requiring livewire installation.
 *
 * @see https://github.com/livewire/livewire/blob/7e7d638183b34fb61621455891869f5abfd55a82/src/Drawer/Utils.php
 */
class Utils
{
    static public function pretendResponseIsFile($file, $contentType = 'application/javascript; charset=utf-8'): BinaryFileResponse
    {
        $lastModified = filemtime($file);

        return static::cachedFileResponse($file, $contentType, $lastModified,
            fn ($headers) => response()->file($file, $headers));
    }

    static private function cachedFileResponse($filename, $contentType, $lastModified, $downloadCallback)
    {
        $expires = strtotime('+1 year');
        $cacheControl = 'public, max-age=31536000';

        if (static::matchesCache($lastModified)) {
            return response('', 304, [
                'Expires' => static::httpDate($expires),
                'Cache-Control' => $cacheControl,
            ]);
        }

        $headers = [
            'Content-Type' => $contentType,
            'Expires' => static::httpDate($expires),
            'Cache-Control' => $cacheControl,
            'Last-Modified' => static::httpDate($lastModified),
        ];

        if (str($filename)->endsWith('.br')) {
            $headers['Content-Encoding'] = 'br';
        }

        return $downloadCallback($headers);
    }

    private static function matchesCache($lastModified): bool
    {
        $ifModifiedSince = app(Request::class)->header('if-modified-since');

        return $ifModifiedSince !== null && @strtotime($ifModifiedSince) === $lastModified;
    }

    private static function httpDate($timestamp): string
    {
        return sprintf('%s GMT', gmdate('D, d M Y H:i:s', $timestamp));
    }
}