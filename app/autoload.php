<?php
/**
 * This file is part of the O2System PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian Salim
 * @copyright      Copyright (c) Steeve Andrian Salim
 */
// ------------------------------------------------------------------------

/**
 * O2System App Autoload
 *
 * @param $className
 */
spl_autoload_register(
    function ( $className ) {
        if ( strpos( $className, 'App\\' ) === false ) {
            return;
        }

        $className = ltrim( $className, '\\' );
        $filePath = '';

        if ( $lastNsPos = strripos( $className, '\\' ) ) {
            $namespace = substr( $className, 0, $lastNsPos );
            $className = substr( $className, $lastNsPos + 1 );
            $filePath = $namespace . '\\';
        }

        $filePath .= str_replace( '_', DIRECTORY_SEPARATOR, $className ) . '.php';

        // Fixed Path
        $filePath = str_replace( 'App\\', __DIR__ . DIRECTORY_SEPARATOR, $filePath );
        $filePath = str_replace( [ '\\', '/' ], DIRECTORY_SEPARATOR, $filePath );

        if ( file_exists( $filePath ) ) {
            require $filePath;
        }

    },
    true,
    true
);
