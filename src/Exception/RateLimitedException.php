<?php

namespace Petebishwhip\NativePhpCli\Exception;

use Petebishwhip\NativePhpCli\Exception;

class RateLimitedException extends Exception
{
    public static function for(string $url): RateLimitedException
    {
        $url = parse_url($url, PHP_URL_HOST);

        return new self("Rate limited by {$url}. Wait a while before trying again.");
    }
}