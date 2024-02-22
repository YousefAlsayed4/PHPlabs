<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit756d55cd8af538dfa3ca3a5b7d69b788
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dell\\Lab2php\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dell\\Lab2php\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit756d55cd8af538dfa3ca3a5b7d69b788::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit756d55cd8af538dfa3ca3a5b7d69b788::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit756d55cd8af538dfa3ca3a5b7d69b788::$classMap;

        }, null, ClassLoader::class);
    }
}