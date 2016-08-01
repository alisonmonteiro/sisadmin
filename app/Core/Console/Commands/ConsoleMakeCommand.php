<?php

namespace SisAdmin\Core\Console\Commands;

use Illuminate\Foundation\Console\ConsoleMakeCommand as BaseCommand;

class ConsoleMakeCommand extends BaseCommand
{
    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Core\Console\Commands';
    }
}
