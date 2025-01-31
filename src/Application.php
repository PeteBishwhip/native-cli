<?php

namespace Petebishwhip\NativePhpCli;

use Petebishwhip\NativePhpCli\Command\CheckNativePHPUpdatesCommand;
use Petebishwhip\NativePhpCli\Command\ClearCacheCommand;
use Petebishwhip\NativePhpCli\Command\UpdateNativePHPCommand;

class Application extends \Symfony\Component\Console\Application
{
    public function __construct()
    {
        parent::__construct('NativePHP CLI Tool', Version::get());

        $this->addCommands($this->getCommands());
    }

    public static function create(): Application
    {
        return new static();
    }

    public function getCommands(): array
    {
       return [
           new Command\NewCommand(),
           new UpdateNativePHPCommand(),
           new CheckNativePHPUpdatesCommand(),
           new ClearCacheCommand(),
       ];
    }
}