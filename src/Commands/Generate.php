<?php

declare(strict_types=1);

namespace Cross\Proto\Commands;

use Cross\Commands\Attributes\Description;
use Cross\Commands\Attributes\Name;
use Cross\Commands\SequenceCommand;
use Cross\Sequence\Sequence;
use Cross\Sequence\SequenceInterface;
use Cross\Sequence\SequenceKeeper;

#[Name('proto:generate')]
#[Description('Generates PHP files from proto files')]
class Generate extends SequenceCommand
{
    /**
     * @inheritDoc
     */
    protected function sequence(): SequenceInterface|SequenceKeeper
    {
        return Sequence::make()
            ->item(Clear::class)
            ->item(Compile::class)
            ->item(Move::class);
    }
}
