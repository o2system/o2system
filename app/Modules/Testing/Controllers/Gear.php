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

use App\Http\Controller;
use O2System\Framework\Libraries\Ui\Components;
use O2System\Gear\UnitTesting;

/**
 * Class Gear
 *
 * @package Testing\Controllers
 */
class Gear extends Controller
{
    public function __construct()
    {
        parent::__construct();

        presenter()->page->setHeader( 'Gear' );
        presenter()->page->offsetSet('lead', 'Gear Library Debugging, Testing and Examples');
        presenter()->page->offsetSet('author', implode(', ', [
            'Steeven Andrian  Salim'
        ]));
    }

    public function index()
    {
        $listGroup = new Components\Lists\Group();
        $listGroup->createList( new Components\Link( 'Print Out Example', base_url( 'testing/gear/print-out' ) ) );
        $listGroup->createList( new Components\Link( 'Print Code Example', base_url( 'testing/gear/print-code' ) ) );
        $listGroup->createList( new Components\Link( 'Print Dump Example', base_url( 'testing/gear/print-dump' ) ) );
        $listGroup->createList( new Components\Link( 'Print Line Example', base_url( 'testing/gear/print-line' ) ) );
        $listGroup->createList( new Components\Link( 'Print JSON Example', base_url( 'testing/gear/print-json' ) ) );
        $listGroup->createList( new Components\Link( 'Print Serialize Example', base_url( 'testing/gear/print-serialize' ) ) );
        $listGroup->createList( new Components\Link( 'Unit Testing', base_url( 'testing/gear/unit-testing' ) ) );

        presenter()->page->offsetSet( 'lists', $listGroup );

        view( 'index' );
    }

    public function printOut()
    {
        print_out( 'testing' );
    }

    public function printCode()
    {
        print_code( [ 'test' => true ], true );
    }

    public function printDump()
    {
        print_dump( [ 'test' => true ], true );
    }

    public function printLine()
    {
        debug_start();

        debug_line( 'testing' );
        debug_marker();
        debug_line( 'testost' );

        debug_stop();
    }

    public function printJson()
    {
        print_json( [ 'test' => true ], true );
    }

    public function printSerialize()
    {
        print_serialize( [ 'test' => true ], true );
    }

    public function unitTesting()
    {
        $testing = new UnitTesting();
        $testing->test( 'Testing math', ( 1 + 1 ), 2 );
        $testing->render();

        die;
    }
}
