<?php

namespace SisAdmin\Core\Console\Commands;

use Illuminate\Foundation\Console\ProviderMakeCommand as BaseCommand;

class ProviderMakeCommand extends BaseCommand
{
    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Core\Providers';
    }
}
