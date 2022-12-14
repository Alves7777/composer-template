<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitffc2dc0e9b89599cba63bfc8e6e01d6f
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Lucasa\\ComposerPhp\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Lucasa\\ComposerPhp\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitffc2dc0e9b89599cba63bfc8e6e01d6f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitffc2dc0e9b89599cba63bfc8e6e01d6f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitffc2dc0e9b89599cba63bfc8e6e01d6f::$classMap;

        }, null, ClassLoader::class);
    }
}
