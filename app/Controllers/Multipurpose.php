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

namespace App\Controllers;

// ------------------------------------------------------------------------

use App\Http\Controller;

/**
 * Class Hello
 *
 * @package App\Controllers
 */
class Multipurpose extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        presenter()->page->setHeader( 'O2System Multipurpose Themes' );
        presenter()->theme->setLayout( 'multipurpose' );

        view( 'multipurpose' );
    }

    public function navigations()
    {
        presenter()->page->setHeader( 'O2System Multipurpose Themes' );
        presenter()->theme->setLayout( 'multipurpose' );

        view( 'multipurpose/sections/navigations' );
    }

    public function bannersForm()
    {
        presenter()->page->setHeader( 'O2System Multipurpose Themes' );
        presenter()->theme->setLayout( 'multipurpose' );

        view( 'multipurpose/sections/banners-form' );
    }

    public function features()
    {
        presenter()->page->setHeader( 'O2System Multipurpose Themes' );
        presenter()->theme->setLayout( 'multipurpose' );

        view( 'multipurpose/sections/features' );
    }

    public function contacts()
    {
        presenter()->page->setHeader( 'O2System Multipurpose Themes' );
        presenter()->theme->setLayout( 'multipurpose' );

        view( 'multipurpose/sections/contacts' );
    }

    public function footers()
    {
        presenter()->page->setHeader( 'O2System Multipurpose Themes' );
        presenter()->theme->setLayout( 'multipurpose' );

        view( 'multipurpose/sections/footers' );
    }

    public function form()
    {
        presenter()->page->setHeader( 'O2System Multipurpose Themes' );
        presenter()->theme->setLayout( 'multipurpose' );

        view( 'multipurpose/sections/form' );
    }

    public function searchTicket()
    {
        presenter()->page->setHeader( 'O2System Multipurpose Themes' );
        presenter()->theme->setLayout( 'ticketing' );


        view( 'multipurpose/bookticket/search-ticket' );
    }

    public function checkoutTicket()
    {
        presenter()->page->setHeader( 'O2System Multipurpose Themes' );
        presenter()->theme->setLayout( 'ticketing' );

        view( 'multipurpose/bookticket/checkout-ticket' );
    }

    public function finishTicket()
    {
        presenter()->page->setHeader( 'O2System Multipurpose Themes' );
        presenter()->theme->setLayout( 'ticketing' );

        view( 'multipurpose/bookticket/finish-ticket' );
    }
}