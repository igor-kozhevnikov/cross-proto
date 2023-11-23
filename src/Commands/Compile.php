<?php

declare(strict_types=1);

namespace Cross\Proto\Commands;

use Cross\Commands\Attributes\Description;
use Cross\Commands\Attributes\Name;
use Cross\Commands\ShellCommand;
use Cross\Proto\Config\Path;

#[Name('proto:compile')]
#[Description('Compiles proto files')]
class Compile extends ShellCommand
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
        $pluginPath = $this->path->getPlugin();
        $outPath = $this->path->getOut();
        $protoPath = $this->path->getProto();

        $plugin = "--plugin=$pluginPath";
        $php = "--php_out=$outPath";
        $grpc = "--php-grpc_out=$outPath";
        $proto = "--proto_path $protoPath";
        $files = "$(find $protoPath/service $protoPath/shared -iname \"*.proto\")";

        return "protoc $plugin $php $grpc $proto $files";
    }
}
