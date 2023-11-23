<?php

declare(strict_types=1);

namespace Cross\Proto\Commands;

use Cross\Commands\ShellCommand;

abstract class BaseCommand extends ShellCommand
{
    /**
     * Base path
     */
    private string $basePath;

    /**
     * Path to proto files.
     */
    private string $protoRootDirectory;

    /**
     * Subdirectories of proto files.
     *
     * @var string[]
     */
    private array $protoSubdirectories;

    /**
     * Path to generated classes.
     */
    private string $generatedClassesPath;

    /**
     * Path to a plugin.
     */
    private string $pluginPath;

    /**
     * @inheritDoc
     */
    protected function setup(): void
    {
        $this->basePath = $this->path('base_path');
        $this->protoRootDirectory = $this->path('proto_files.root_directory');
        $this->protoSubdirectories = $this->config('proto_files.subdirectories', scope: 'proto');
        $this->generatedClassesPath = $this->path('generated_classes_path');
        $this->pluginPath = $this->path('plugin_path');
    }

    /**
     * Returns the root proto files path.
     */
    public function getProtoRootDirectory(): string
    {
        return $this->protoRootDirectory;
    }

    /**
     * Returns the proto subdirectories.
     *
     * @return string[]
     */
    public function getProtoSubdirectories(): array
    {
        return array_map(
            fn (string $subdirectory): string => $this->join($this->protoRootDirectory, $subdirectory),
            $this->protoSubdirectories,
        );
    }

    /**
     * Returns a path to generated PHP classes.
     */
    public function getGeneratedClassesPath(?string $path = null): string
    {
        return $path ? "$this->generatedClassesPath/$path" : $this->generatedClassesPath;
    }

    /**
     * Returns a path to a plugin.
     */
    public function getPluginPath(): string
    {
        return $this->pluginPath;
    }

    /**
     * Makes a path.
     */
    private function path(string $key): string
    {
        $tail = $this->config($key, scope: 'proto');

        return isset($this->basePath) ? $this->join($this->basePath, $tail) : $tail;
    }

    /**
     * Joins two strings.
     */
    private function join(string $head, string $tail): string
    {
        $head = rtrim($head, '/');
        $tail = ltrim($tail, '/');

        return "$head/$tail";
    }
}
