<?php

namespace Petebishwhip\NativePhpCli;

class Application extends \Symfony\Component\Console\Application
{
    public function __construct()
    {
        parent::__construct('NativePHP CLI Tool', Version::get());

        $this->registerCommands();
    }

    public static function create(): Application
    {
        return new static();
    }

    private function registerCommands(): void
    {
        $this->addCommands([
            new Command\NewCommand(),
        ]);
    }
}