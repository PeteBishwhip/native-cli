<?php

namespace Petebishwhip\NativePhpCli;

class NativePHP
{
    public const NATIVECLI_RECOMMENDED_VERSION_URL = 'https://nativecli.com/resources/latestRecommendedVersion.json';

    public static function getPackagesForComposer()
    {
        $response = file_get_contents(self::NATIVECLI_RECOMMENDED_VERSION_URL);

        if ($response === false) {
            throw new Exception('Failed to fetch recommended version');
        }

        $data = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Failed to decode recommended version');
        }

        return array_map(function ($package) {
            return sprintf('%s:%s', $package['packageName'], $package['version']);
        }, $data);
    }
}