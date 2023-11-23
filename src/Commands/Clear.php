<?php

declare(strict_types=1);

namespace Cross\Proto\Commands;

use Cross\Commands\Attributes\Description;
use Cross\Commands\Attributes\Name;

#[Name('proto:clear')]
#[Description('Removes all generated PHP files')]
class Clear extends BaseCommand
{
    /**
     * @inheritDoc
     */
    protected function command(): string|array
    {
        $path = $this->getGeneratedClassesPath('*');

        return "rm -rf $path";
    }
}
