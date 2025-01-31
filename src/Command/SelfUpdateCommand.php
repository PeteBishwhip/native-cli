<?php

namespace Petebishwhip\NativePhpCli\Command;

use Petebishwhip\NativePhpCli\Version;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'self-update',
    description: 'Update the NativePHP CLI tool'
)]
class SelfUpdateCommand extends Command
{
    protected function configure(): void
    {
        $this->addArgument(
            'version',
            InputArgument::OPTIONAL,
            'The version to update to',
            'latest',
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        return Command::SUCCESS;
    }
}