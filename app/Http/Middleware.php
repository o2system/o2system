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

use App\Http\Middleware\SubVersionControl;
use O2System\Framework\Http;

/**
 * Class Middleware
 *
 * @package App\Http
 */
class Middleware extends Http\Middleware
{
    public function __construct()
    {
        parent::__construct();

        $this->register( new SubVersionControl(), 'svn' );
    }
}