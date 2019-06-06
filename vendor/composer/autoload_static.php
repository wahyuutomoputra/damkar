<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite94c0f59b84fcea4a64677e989483790
{
    public static $files = array (
        '5255c38a0faeba867671b61dfda6d864' => __DIR__ . '/..' . '/paragonie/random_compat/lib/random.php',
        '3109cb1a231dcd04bee1f9f620d46975' => __DIR__ . '/..' . '/paragonie/sodium_compat/autoload.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Pusher\\' => 7,
            'Psr\\Log\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Pusher\\' => 
        array (
            0 => __DIR__ . '/..' . '/pusher/pusher-php-server/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
    );

    public static $prefixesPsr0 = array (
        'o' => 
        array (
            'org\\bovigo\\vfs' => 
            array (
                0 => __DIR__ . '/..' . '/mikey179/vfsStream/src/main/php',
            ),
        ),
    );

    public static $classMap = array (
        'Format' => __DIR__ . '/..' . '/chriskacerguis/codeigniter-restserver/application/libraries/Format.php',
        'Restserver\\Libraries\\REST_Controller' => __DIR__ . '/..' . '/chriskacerguis/codeigniter-restserver/application/libraries/REST_Controller.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite94c0f59b84fcea4a64677e989483790::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite94c0f59b84fcea4a64677e989483790::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInite94c0f59b84fcea4a64677e989483790::$prefixesPsr0;
            $loader->classMap = ComposerStaticInite94c0f59b84fcea4a64677e989483790::$classMap;

        }, null, ClassLoader::class);
    }
}
