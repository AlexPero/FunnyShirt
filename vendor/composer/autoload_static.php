<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfd6918a8bbd2a9016fccb9e9961821f0
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfd6918a8bbd2a9016fccb9e9961821f0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfd6918a8bbd2a9016fccb9e9961821f0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfd6918a8bbd2a9016fccb9e9961821f0::$classMap;

        }, null, ClassLoader::class);
    }
}