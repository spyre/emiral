<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit828e536cc61a36a61aa3761f12d8ad3b
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Automattic\\WooCommerce\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Automattic\\WooCommerce\\' => 
        array (
            0 => __DIR__ . '/..' . '/automattic/woocommerce/src/WooCommerce',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit828e536cc61a36a61aa3761f12d8ad3b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit828e536cc61a36a61aa3761f12d8ad3b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}