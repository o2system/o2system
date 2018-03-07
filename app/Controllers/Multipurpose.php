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

    public function navigation1()
    {
        presenter()->page->setHeader( 'O2System Multipurpose Themes' );
        presenter()->theme->setLayout( 'multipurpose' );

        view( 'multipurpose-sections/navigation1' );
    }

    public function formBanner()
    {
        presenter()->page->setHeader( 'O2System Multipurpose Themes' );
        presenter()->theme->setLayout( 'multipurpose' );

        view( 'multipurpose-sections/form-banner' );
    }

    public function features1()
    {
        presenter()->page->setHeader( 'O2System Multipurpose Themes' );
        presenter()->theme->setLayout( 'multipurpose' );

        view( 'multipurpose-sections/features1' );
    }

    public function footer()
    {
        presenter()->page->setHeader( 'O2System Multipurpose Themes' );
        presenter()->theme->setLayout( 'multipurpose' );

        view( 'multipurpose-sections/footer' );
    }
}