<?php

declare(strict_types=1);

namespace Cross\Proto\Commands;

use Cross\Commands\Attributes\Description;
use Cross\Commands\Attributes\Hidden;
use Cross\Commands\Attributes\Name;

#[Name('proto:move')]
#[Description('Moves generated PHP classes from deep hierarchy to cursory one')]
#[Hidden]
class Move extends BaseCommand
{
    /**
     * @inheritDoc
     */
    protected function command(): string|array
    {
        $root = $this->getGeneratedClassesPath();
        $generated = $this->getGeneratedClassesPath('App/Grpc/Generated/*');
        $app = $this->getGeneratedClassesPath('App');

        $move = "mv $generated $root";
        $remove = "rm -rf $app";

        return "$move && $remove";
    }
}
