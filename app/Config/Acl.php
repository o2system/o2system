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

$acl = new \O2System\Kernel\Datastructures\Config([
    'algorithm'   => PASSWORD_DEFAULT,
    'options'     => [],
    'msisdnRegex' => '/^\+[1-9]{1}[0-9]{3,14}$/',
    'attempts' => 5,
    'sso' => [
        'enable' => false,
        'server' => '',
    ],
]);