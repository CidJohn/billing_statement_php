<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit60ce571f81e779b7fdd3bb5546e0417f
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit60ce571f81e779b7fdd3bb5546e0417f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit60ce571f81e779b7fdd3bb5546e0417f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit60ce571f81e779b7fdd3bb5546e0417f::$classMap;

        }, null, ClassLoader::class);
    }
}
