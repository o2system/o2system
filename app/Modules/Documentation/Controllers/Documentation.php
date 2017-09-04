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

namespace Documentation\Controllers;

use App\Http\Controller;

class Documentation extends Controller
{
    public function __construct()
    {
        parent::__construct();

        config()->getItem( 'presenter' )->debugToolBar = false;

        presenter()->page->setHeader( 'Documentation' );
        presenter()->page->offsetSet('lead', 'API Documentation');
        presenter()->page->offsetSet('author', implode(', ', [
            'Steeven Andrian  Salim'
        ]));
    }

    public function index()
    {
        view('index');
    }
}