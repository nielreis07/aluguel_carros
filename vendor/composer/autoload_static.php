<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9070c48dfc8cdba61c5180db8f26ad61
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit9070c48dfc8cdba61c5180db8f26ad61::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9070c48dfc8cdba61c5180db8f26ad61::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9070c48dfc8cdba61c5180db8f26ad61::$classMap;

        }, null, ClassLoader::class);
    }
}
