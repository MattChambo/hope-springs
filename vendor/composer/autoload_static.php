<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc48d5048ec7da61f2c4edbede6922449
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'League\\Plates\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc48d5048ec7da61f2c4edbede6922449::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc48d5048ec7da61f2c4edbede6922449::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
