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

use O2System\Kernel\Http\Router\Addresses;

$addresses = new Addresses();

// ------------------------------------------------------------------------

// Example Route To Default Controller
$addresses->get(
    '/',
    function () {
        return new \App\Controllers\Hello();
    }
);

// ------------------------------------------------------------------------