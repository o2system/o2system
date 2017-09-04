<?php
/**
 * This file is part of the O2System PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Mohamad Rafi Randoni
 * @copyright      Copyright (c) Steeve Andrian Salim
 */
// ------------------------------------------------------------------------

namespace Testing\Controllers;

// ------------------------------------------------------------------------

use O2System\Framework\Http\Controller;
use O2System\Session\Datastructures\Config;

/**
 * Class Session
 *
 * @package Testing\Controllers
 */
class Session extends Controller
{

    public function run( $handler )
    {
        $configs[ 'file' ] = new Config(
            [
                'handler' => 'file',
                'cookie'  => [
                    'lifetime' => 7200,
                    'domain'   => '',
                    'path'     => DIR_CACHE,
                    'secure'   => false,
                    'httpOnly' => true,
                ],
            ]
        );

        $configs[ 'redis' ] = new Config(
            [
                'handler' => 'redis',
                'host'    => '127.0.0.1',
                'port'    => 6379,
                'timeout' => 60,
            ]
        );

        $configs[ 'memcached' ] = new Config(
            [
                'handler' => 'memcached',
            ]
        );

        $configs[ 'opcache' ] = new Config(
            [
                'handler' => 'opcache',
            ]
        );

        $configs[ 'xcache' ] = new Config(
            [
                'handler' => 'xcache',
            ]
        );

        if ( $handler == 'file' || $handler == 'memcached' ) {
            $this->runTestFile( $handler, $configs[ $handler ] );
        }
        if ( in_array( $handler, array_keys( $configs ) ) ) {
            $this->runTest( $handler, $configs[ $handler ] );
        }

        print_out( 'Handler Not Found' );
    }

    protected function runTestFile( $name, $config )
    {
        $session = session();

        $session[ 'keyByArray' ] = 'value by array';
        $session->keyByMagicMethod = 'value by magic method';
        $session->set( 'keyBySet', 'value by set' );

        $result = $_SESSION;

        print_out( $result );
    }

    protected function runTest( $name, $config )
    {
        $session = new \O2System\Session( $config );
        // $session->setLogger(new \O2System\Kernel\Services\Logger());
        $session->start();

        $session[ 'keyByArray' ] = 'value by array';
        $session->keyByMagicMethod = 'value by magic method';
        $session->set( 'keyBySet', 'value by set' );

        $result = $_SESSION;

        print_out( $result );
    }

}