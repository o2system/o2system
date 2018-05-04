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

namespace App\Http;

// ------------------------------------------------------------------------

use App\Http\Presenter\Page;

/**
 * Class Controller
 *
 * @package Cms\Http
 */
class Controller extends \O2System\Framework\Http\Controller
{
    /**
     * Controller::__construct
     */
    public function __construct()
    {
        presenter()->meta->title->prepend( 'O2System Framework' );
        language()->loadFile( 'app' );
        presenter()->store( 'page', new Page() );
    }
}