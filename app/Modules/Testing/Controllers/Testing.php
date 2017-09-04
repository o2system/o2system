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

use App\Http\Controller;
use O2System\Framework\Libraries\Ui\Components;

/**
 * Class Testing
 *
 * @package Testing\Controllers
 */
class Testing extends Controller
{
    public function __construct()
    {
        parent::__construct();

        presenter()->page->setHeader( 'Testing' );
        presenter()->page->offsetSet('lead', 'Framework Debugging and Testing');
        presenter()->page->offsetSet('author', implode(', ', [
            'Rafi Randoni',
            'Steeven Andrian  Salim'
        ]));
    }

    public function index()
    {
        $listGroup = new Components\Lists\Group();
        $listGroup->createList( new Components\Link( 'Cache', base_url( 'testing/cache' ) ) );
        $listGroup->createList( new Components\Link( 'Curl', base_url( 'testing/curl' ) ) );
        $listGroup->createList( new Components\Link( 'Database', base_url( 'testing/database' ) ) );

        presenter()->page->offsetSet( 'lists', $listGroup );

        view( 'index' );
    }


    public function method( $args = [] )
    {
        $args = func_get_args();

        if ( count( $args ) > 0 ) {

            if ( in_array( 'echo', $args ) ) {
                echo __METHOD__ . '(' . implode( ', ', $args ) . ')';
            } else {
                if ( in_array( 'return', $args ) ) {
                    return __METHOD__ . '(' . implode( ', ', $args ) . ')';
                }
            }

            print_out( __METHOD__ . '(' . implode( ', ', $args ) . ')' );
        }

        print_out( __METHOD__ );
    }

    public function methodCamelCase( $args = [] )
    {
        $args = func_get_args();

        if ( count( $args ) > 0 ) {

            if ( in_array( 'echo', $args ) ) {
                echo __METHOD__ . '(' . implode( ', ', $args ) . ')';
            } else {
                if ( in_array( 'return', $args ) ) {
                    return __METHOD__ . '(' . implode( ', ', $args ) . ')';
                }
            }

            print_out( __METHOD__ . '(' . implode( ', ', $args ) . ')' );
        }

        print_out( __METHOD__ );
    }
}