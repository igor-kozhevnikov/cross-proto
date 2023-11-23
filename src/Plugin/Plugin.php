<?php

declare(strict_types=1);

namespace Quizment\Cross\Proto\Plugin;

use Cross\Plugin\BasePlugin;

class Plugin extends BasePlugin
{
    /**
     * @inheritdoc
     */
    public string $key = 'proto';

    /**
     * @inheritDoc
     */
    public function getCommands(): array
    {
        return require __DIR__ . '/../../config/commands.php';
    }
}
