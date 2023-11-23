<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Base path.
    | -------------------------------------------------------------------------
    | Current working directory where are located app files. Is used as a basis
    | for other paths.
    |--------------------------------------------------------------------------
    */

    'base_path' => __DIR__ . '/..',

    /*
    |--------------------------------------------------------------------------
    | Path to generated PHP classes.
    |--------------------------------------------------------------------------
    */

    'generated_classes_path' => 'generated/grpc',

    /*
    |--------------------------------------------------------------------------
    | Path to proto files.
    | -------------------------------------------------------------------------
    | Root directory contains proto files and subdirectories. Subdirectories are
    | located in the root directory and contain only proto files.
    |--------------------------------------------------------------------------
    */

    'proto_files' => [
        'root_directory' => 'proto',
        'subdirectories' => ['service', 'entity'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Path to plugin.
    | -------------------------------------------------------------------------
    */

    'plugin_path' => 'bin/protoc-gen-php-grpc',

];
