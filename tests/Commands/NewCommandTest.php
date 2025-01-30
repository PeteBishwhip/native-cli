<?php

namespace Petebishwhip\NativePhpCli\Tests\Commands;

use Petebishwhip\NativePhpCli\Application;
use Petebishwhip\NativePhpCli\Command\NewCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;

class NewCommandTest extends TestCase
{
    public function testNewCommandIsCallable()
    {
        $newCommandMock = $this->getMockBuilder(NewCommand::class)
            ->setConstructorArgs(['new'])
            ->onlyMethods(['execute'])
            ->getMock();
        $newCommandMock->method('execute')->willReturn(Command::SUCCESS);

        $app = new Application();
        $app->add($newCommandMock);

        $command = $app->find('new');

        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'name' => 'test',
        ]);

        $commandTester->assertCommandIsSuccessful();
    }
}