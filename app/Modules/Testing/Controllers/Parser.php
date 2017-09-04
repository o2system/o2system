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
use O2System\Parser\Datastructures\Config;

/**
 * Class Parser
 *
 * @package Testing\Controllers
 */
class Parser extends Controller
{

    public function blade()
    {
        $config = new Config(
            [
                'driver'       => 'blade',
                'phpScripts'   => true,
                'phpFunctions' => true,
                'phpConstants' => true,
                'phpGlobals'   => true,
            ]
        );
        $parser = new \O2System\Parser( $config );

        $parser->loadFile( __DIR__ . '/../../Views/samples/blade/sample-parser.blade.php' );

        $parser->loadVars(
            [
                'username' => 'Rafi',
                'navPath'  => __DIR__ . '/../../Views/samples/blade/nav.blade.php',
                'data'     => [
                    [
                        'no'   => 1,
                        'nama' => 'A',
                    ],
                    [
                        'no'   => 1,
                        'nama' => 'B',
                    ],
                ],
            ]
        );

        print_out( $parser->parse() );
    }

    public function shortcode()
    {
        $config = new Config(
            [
                'driver'       => 'shortcodes',
                'phpScripts'   => true,
                'phpFunctions' => true,
                'phpConstants' => true,
                'phpGlobals'   => true,
            ]
        );
        $parser = new \O2System\Parser( $config );
        $shEngine = new \O2System\Parser\Drivers\ShortcodesDriver;

        $parser->addDriver( $shEngine, 'shortcodes' );

        $parser->loadFile( __DIR__ . '/../../Views/samples/wordpress-shortcode.html' );

        $parser->loadVars(
            [
                'user' => function ( $params ) {
                    return $params[ 'name' ];
                },
            ]
        );

        $parser->loadVars(
            [
                'notifications' => function () {
                    $template = '<ul>';
                    for ( $i = 0; $i < 4; $i++ ) {
                        $template .= '<li><img src="https://placeimg.com/200/200/any" alt=""></li>';
                    }
                    $template .= '</ul>';

                    return $template;
                },
            ]
        );

        $shEngine->register(
            'test',
            function () {
                return 'Value';
            }
        );

        print_out( $parser->parse() );
    }

    public function moustache()
    {
        $config = new Config(
            [
                'driver'       => 'shortcodes',
                'phpScripts'   => true,
                'phpFunctions' => true,
                'phpConstants' => true,
                'phpGlobals'   => true,
            ]
        );
        $parser = new \O2System\Parser( $config );
        $msEngine = new \O2System\Parser\Drivers\MoustacheDriver;

        $parser->addDriver( $msEngine, 'moustache' );

        $parser->loadFile( __DIR__ . '/../../Views/samples/template.moustache.php' );

        $parser->loadVars(
            [
                'username'   => 'Rafi',
                'level'      => 1,
                'navigation' => [ 'Home', 'Profile', 'Gallery' ],
            ]
        );

        print_out( $parser->parse() );
    }

}