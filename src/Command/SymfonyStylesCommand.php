<?php

/*
 * This file is part of the Serendipity HQ Console Styles Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Bundle\ConsoleStyles\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Displays the custom console style implemented by Symfony.
 */
final class SymfonyStylesCommand extends Command
{
    /** @var string $defaultName */
    protected static $defaultName = 'console:styles:symfony';

    /**
     * {@inheritdoc}
     */
    protected function configure(): void
    {
        $this
            ->setDescription("A command to display all available Symfony's console style.")
            ->addOption('show-ansi', null, InputOption::VALUE_NONE, 'Shows the ANSI colors.');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $ioWriter = new SymfonyStyle($input, $output);

        if ($input->getOption('show-ansi')) {
            // Print out the available ANSI colors
            $ioWriter->section('Those are the available ANSI colors');
            $ioWriter->block('black', null, 'fg=black');
            $ioWriter->block('red', null, 'fg=red');
            $ioWriter->block('green', null, 'fg=green');
            $ioWriter->block('yellow', null, 'fg=yellow');
            $ioWriter->block('blue', null, 'fg=blue');
            $ioWriter->block('magenta', null, 'fg=magenta');
            $ioWriter->block('cyan', null, 'fg=cyan');
            $ioWriter->block('white', null, 'fg=white');
            $ioWriter->block('default', null, 'fg=default');
        }

        // Print out the <styles> defined in OutputFormatter
        $ioWriter->section('The \<styles> defined in OutputFormatter');
        $ioWriter->writeln('<error>This is an < error ></error>');
        $ioWriter->writeln('<info>This is an < info ></info>');
        $ioWriter->writeln('<comment>This is a < comment ></comment>');
        $ioWriter->writeln('<question>This is a < question ></question>');

        // Print out the shortcut methods of SymfonyStyle
        $ioWriter->section('The shortcuts methods of SymfonyStyle (They draw a block)');
        $ioWriter->caution('This is a caution block');
        $ioWriter->comment('This is a comment block');
        $ioWriter->error('This is an error block');
        $ioWriter->note('This is a note block');
        $ioWriter->success('This is a success block');
        $ioWriter->warning('This is a warning block');

        return 0;
    }
}
