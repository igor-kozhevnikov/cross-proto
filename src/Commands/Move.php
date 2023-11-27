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
        $namespace = $this->getNamespace();
        $generated = $this->getGeneratedClassesPath("$namespace/*");

        return "mv $generated $root";
    }
}
