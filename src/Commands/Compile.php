<?php

declare(strict_types=1);

namespace Cross\Proto\Commands;

use Cross\Commands\Attributes\Description;
use Cross\Commands\Attributes\Name;

#[Name('proto:compile')]
#[Description('Compiles proto files')]
class Compile extends BaseCommand
{
    /**
     * @inheritDoc
     */
    protected function command(): string|array
    {
        $plugin = "--plugin={$this->getPluginPath()}";
        $php = "--php_out={$this->getGeneratedClassesPath()}";
        $grpc = "--php-grpc_out={$this->getGeneratedClassesPath()}";
        $proto = "--proto_path {$this->getProtoRootDirectory()}";
        $files = implode(' ', $this->getProtoSubdirectories());
        $files = "$(find $files -iname \"*.proto\")";

        return "protoc $plugin $php $grpc $proto $files";
    }
}
