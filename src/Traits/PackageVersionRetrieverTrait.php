<?php

namespace Petebishwhip\NativePhpCli\Traits;

use Petebishwhip\NativePhpCli\Exception;
use z4kn4fein\SemVer\Version as SemanticVersion;

trait PackageVersionRetrieverTrait
{
    public static function getVersionForPackage(string $package, string $tag = 'latest'): ?SemanticVersion
    {
        $ch = curl_init();

        curl_setopt($ch,
            CURLOPT_URL,
            sprintf(
                'https://api.github.com/repos/%s/releases/latest',
                $package
            )
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'User-Agent: NativeCLI/Updater'
        ]);

        $response = curl_exec($ch);

        if ($response === false) {
            throw new Exception('Failed to fetch latest version: ' . curl_error($ch));
        }

        curl_close($ch);

        $data = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Failed to decode latest version');
        }

        $latestVersion = $data['tag_name'];

        return SemanticVersion::parseOrNull($latestVersion);
    }
}