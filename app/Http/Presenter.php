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
 * @package App\Http
 */
class Presenter extends \O2System\Framework\Http\Presenter
{
    public function __construct()
    {
        parent::__construct();

        $this->meta->title->prepend('O2System');
        $this->meta->offsetSet('generator', 'O2System Framework - The Next Generation of PHP Framework');
    }
}