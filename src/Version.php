<?php

namespace Petebishwhip\NativePhpCli;

use z4kn4fein\SemVer\Version as SemanticVersion;

class Version
{
    public const VERSION = '1.0.0-beta.1';
    private const CACHE_FILE = __DIR__ . '/../cache/version_cache.json';
    private const CACHE_TTL = 3600; // 1 Hour

    public static function get(): ?SemanticVersion
    {
        return SemanticVersion::parseOrNull(self::VERSION);
    }

    /**
     * @throws Exception
     */
    public static function getLatestVersion(): ?SemanticVersion
    {
        $cachedVersion = self::getCachedVersion();
        if ($cachedVersion !== null) {
            return SemanticVersion::parseOrNull($cachedVersion);
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/repos/petebishwhip/nativephp-cli/releases/latest');
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
        self::cacheVersion($latestVersion);

        return SemanticVersion::parseOrNull($latestVersion);
    }

    private static function getCachedVersion(): ?string
    {
        if (!file_exists(self::CACHE_FILE)) {
            return null;
        }

        $cacheData = json_decode(file_get_contents(self::CACHE_FILE), true);

        if (json_last_error() !== JSON_ERROR_NONE || time() - $cacheData['timestamp'] > self::CACHE_TTL) {
            return null;
        }

        return $cacheData['version'];
    }

    private static function cacheVersion(string $version): void
    {
        $cacheData = [
            'version' => $version,
            'timestamp' => time(),
        ];

        if (!file_exists(dirname(self::CACHE_FILE))) {
            mkdir(dirname(self::CACHE_FILE), 0777, true);
        }

        file_put_contents(self::CACHE_FILE, json_encode($cacheData));
    }
}