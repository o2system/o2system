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

namespace Testing\Controllers;

// ------------------------------------------------------------------------

use O2System\Curl\MultiRequest;
use O2System\Curl\Request;
use App\Http\Controller;
use O2System\Kernel\Http\Message\Uri;
use O2System\Framework\Libraries\Ui\Components;

/**
 * Class Curl
 *
 * @package Testing\Framework
 */
class Curl extends Controller
{
    public function __construct()
    {
        parent::__construct();

        presenter()->page->setHeader( 'Curl' );
        presenter()->page->offsetSet('lead', 'Curl Library Debugging and Testing');
        presenter()->page->offsetSet('author', implode(', ', [
            'Steeven Andrian  Salim'
        ]));
    }

    public function index()
    {
        $listGroup = new Components\Lists\Group();
        $listGroup->createList( new Components\Link( 'Single Request', base_url( 'testing/curl/single' ) ) );
        $listGroup->createList( new Components\Link( 'Multiple Request', base_url( 'testing/curl/multiple' ) ) );

        presenter()->page->offsetSet( 'lists', $listGroup );

        view( 'index' );
    }

    /**
     * Curl::index
     */
    public function single()
    {
        $request = new Request();
        $request->setUri( ( new Uri() )->withPath( '/testing/curl/response' ) );
        print_out( $request->get() );
    }

    // ------------------------------------------------------------------------

    public function multiple()
    {
        $request = new Request();
        $request->setUri( ( new Uri() )->withPath( '/testing/curl/response' ) );

        $multiple = new MultiRequest();
        $multiple->register( $request );

        print_out($multiple->get());
    }

    /**
     * Curl::response
     */
    public function response()
    {
        $headers = [];

        if ( function_exists( 'apache_request_headers' ) ) {
            $headers = [
                'request'  => apache_request_headers(),
                'response' => apache_response_headers(),
            ];
        } else {
            foreach ( $_SERVER as $name => $value ) {
                if ( substr( $name, 0, 5 ) == 'HTTP_' ) {
                    $headers[ 'request' ][ str_replace( ' ', '-',
                        ucwords( strtolower( str_replace( '_', ' ', substr( $name, 5 ) ) ) ) ) ] = $value;
                }
            }

            $headers[ 'response' ] = headers_list();
        }

        $result = [
            'request' => [
                'method' => $_SERVER[ 'REQUEST_METHOD' ],
                'time'   => $_SERVER[ 'REQUEST_TIME' ],
                'uri'    => $_SERVER[ 'REQUEST_URI' ],
                'agent'  => $_SERVER[ 'HTTP_USER_AGENT' ],
            ],
            'headers' => $headers,
            'data'    => [
                'get'     => $_GET,
                'post'    => $_POST,
                'cookies' => $_COOKIE,
                'files'   => $_FILES,
                'env'     => $_ENV,
                'server'  => $_SERVER,
            ],
        ];

        output()->setContentType( 'application/json' )->send( $result );
    }
}