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

use O2System\Framework\Http\Router\Routes;

$routes = new Routes();

// ------------------------------------------------------------------------

// Route to default controller
$routes->get(
    '/',
    function () {
        return new \App\Controllers\Hello();
    }
);