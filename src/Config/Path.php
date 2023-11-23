<?php

declare(strict_types=1);

namespace Quizment\Cross\Proto\Config;

class Path
{
    /**
     * Path for generated PHP classes.
     */
    private string $out = './generated/grpc';

    /**
     * Path with proto files.
     */
    private string $proto = './proto';

    /**
     * Path to a plugin.
     */
    private string $plugin = './bin/protoc-gen-php-grpc';

    /**
     * Return a path to a plugin.
     */
    public function getPlugin(): string
    {
        return $this->plugin;
    }

    /**
     * Return a path for generated PHP classes.
     */
    public function getOut(?string $path = null): string
    {
        return $path ? "$this->out/$path" : $this->out;
    }

    /**
     * Return a path with proto files.
     */
    public function getProto(): string
    {
        return $this->proto;
    }
}
