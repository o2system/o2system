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
use O2System\Framework\Libraries\Cart;

/**
 * Class Libraries
 *
 * @package Testing\Controllers
 */
class Libraries extends Controller
{
    public function __construct()
    {
        parent::__construct();

        presenter()->page->setHeader( 'Framework Libraries' );
        presenter()->page->offsetSet('lead', 'Framework Libraries Debugging and Testing');
        presenter()->page->offsetSet('author', implode(', ', [
            'Steeven Andrian  Salim'
        ]));
    }

    public function index()
    {
        $listGroup = new Components\Lists\Group();
        $listGroup->createList( new Components\Link( 'Cart', base_url( 'testing/libraries/cart' ) ) );

        presenter()->page->offsetSet( 'lists', $listGroup );

        view( 'index' );
    }

    public function cart()
    {
        $cart = new Cart();

        $cart->add( [
            'id'      => '1234',
            'sku'     => 'sku-abc-1234',
            'qty'     => 1,
            'price'   => 39.95,
            'weight'  => 100,
            'name'    => 'T-Shirt',
            'options' => [ 'Size' => 'L', 'Color' => 'Red' ],
        ] );

        $cart->update( 'sku-abc-1234', [ 'qty' => 2 ] );

        print_out( $cart );
    }
}