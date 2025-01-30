<?php

namespace Petebishwhip\NativePhpCli\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'update',
    description: 'Update the NativePHP version'
)]
class UpdateNativePHPCommand extends Command
{
    protected function configure(): void
    {
        $this->addOption(
            'no-interaction',
            'n',
            InputOption::VALUE_OPTIONAL,
            'Perform the update immediately with no prompts',
            false
        )->addOption(
            'version',
            'v',
            InputOption::VALUE_OPTIONAL,
            'The version of NativePHP to update to',
            'latest'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {


        return Command::SUCCESS;
    }
}