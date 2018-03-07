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

namespace App\Http\Middleware;

// ------------------------------------------------------------------------

use O2System\Psr\Http\Message\RequestInterface;
use O2System\Psr\Http\Middleware\MiddlewareServiceInterface;

/**
 * Class Services
 *
 * @package O2System\Kernel\Http\Middleware
 */
class SubVersionControl implements MiddlewareServiceInterface
{
    /**
     * SubVersionControl::validate
     *
     * Checks if the request fulfill the middleware service rule.
     *
     * @param \O2System\Psr\Http\Message\RequestInterface $request
     *
     * @return bool
     */
    public function validate( RequestInterface $request )
    {
        $clientIpAddress = $request->getClientIpAddress();
        $debugIpAddresses = config( 'ipAddresses' )->offsetGet( 'debug' );

        if ( in_array( $clientIpAddress, $debugIpAddresses ) ) {
            return true;
        }

        return false;
    }

    // ------------------------------------------------------------------------

    /**
     * SubVersionControl::handle
     *
     * @param \O2System\Psr\Http\Message\RequestInterface $request
     *
     * @return void
     */
    public function handle( RequestInterface $request )
    {
        if ( $method = input()->request( 'SVN' ) ) {
            pre_open();

            switch ( strtoupper( $method ) ) {
                case 'UPDATE':

                    $stdout[] = 'SVN Update';
                    exec( 'svn up .. --username www-data --password readonly --force', $stdout );
                    pre_line( $stdout );

                    unset( $stdout );

                    break;

                case 'CLEANUP':

                    $stdout[] = 'SVN CleanUp';
                    exec( 'svn cleanup .. --username www-data --password readonly', $stdout );
                    pre_line( $stdout );
                    unset( $stdout );

                    break;

                case 'INFO':

                    $stdout[] = 'SVN Info';
                    exec( 'svn info .. --username www-data --password readonly', $stdout );
                    pre_line( $stdout );
                    unset( $stdout );

                    break;

                case 'STATUS':

                    $stdout[] = 'SVN Status';
                    exec( 'svn status .. --username www-data --password readonly', $stdout );
                    pre_line( $stdout );
                    unset( $stdout );

                    break;
            }

            pre_close( true );
        }
    }

    // ------------------------------------------------------------------------

    /**
     * SubVersionControl::terminate
     *
     * @param \O2System\Psr\Http\Message\RequestInterface $request
     *
     * @return void
     */
    public function terminate( RequestInterface $request )
    {
        // TODO: Implement terminate() method.
    }
}