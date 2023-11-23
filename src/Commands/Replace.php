<?php

declare(strict_types=1);

namespace Quizment\Cross\Proto\Commands;

use Cross\Commands\Attributes\Description;
use Cross\Commands\Attributes\Hidden;
use Cross\Commands\Attributes\Name;
use Cross\Commands\ShellCommand;
use Quizment\Cross\Proto\Config\Path;

#[Name('proto:replace')]
#[Description('Replace generated PHP classes')]
#[Hidden]
class Replace extends ShellCommand
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
        $root = $this->path->getOut();
        $generated = $this->path->getOut('App/Grpc/Generated/*');
        $app = $this->path->getOut('App');

        $move = "mv $generated $root";
        $remove = "rm -rf $app";

        return "$move && $remove";
    }
}
