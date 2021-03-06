<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite61ea3db428fc1993a2faa9d9e806bda
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Router\\' => 7,
        ),
        'M' => 
        array (
            'Momo\\SitePoo\\' => 13,
        ),
        'D' => 
        array (
            'Database\\' => 9,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Router\\' => 
        array (
            0 => __DIR__ . '/../..' . '/routes',
        ),
        'Momo\\SitePoo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Database\\' => 
        array (
            0 => __DIR__ . '/../..' . '/database',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite61ea3db428fc1993a2faa9d9e806bda::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite61ea3db428fc1993a2faa9d9e806bda::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite61ea3db428fc1993a2faa9d9e806bda::$classMap;

        }, null, ClassLoader::class);
    }
}
