<?php

declare(strict_types=1);

namespace Cross\Proto\Commands;

use Cross\Commands\Attributes\Description;
use Cross\Commands\Attributes\Name;
use Cross\Commands\ShellCommand;
use Cross\Proto\Config\Path;

#[Name('proto:clear')]
#[Description('Removes all generated PHP files')]
class Clear extends ShellCommand
{
    /**
     * Path config.
     */
    private Path $path;

    /**
     * @inheritDoc
     */
    protected function setup(): void
    {
        $this->path = new Path();
    }

    /**
     * @inheritDoc
     */
    protected function command(): string|array
    {
        return 'rm -rf ' . $this->path->getOut('*');
    }
}
