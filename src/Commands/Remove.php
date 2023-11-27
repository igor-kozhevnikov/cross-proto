<?php

declare(strict_types=1);

namespace Cross\Proto\Commands;

use Cross\Commands\Attributes\Description;
use Cross\Commands\Attributes\Hidden;
use Cross\Commands\Attributes\Name;

#[Name('proto:remove')]
#[Description('Removes generated PHP classes deep hierarchy')]
#[Hidden]
class Remove extends BaseCommand
{
    /**
     * @inheritDoc
     */
    protected function command(): string|array
    {
        $index = strpos($this->getNamespace(), '/');
        $word = substr($this->getNamespace(), 0, $index);
        $path = $this->getGeneratedClassesPath($word);

        return "rm -rf $path";
    }
}
