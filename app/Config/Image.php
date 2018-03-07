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

use O2System\Image\Datastructures\Config;

/**
 * Image Controller Configuration
 *
 * @see https://github.com/o2system/image/wiki
 *
 * @var \O2System\Image\Datastructures\Config
 */
$image = new Config([
    'driver'              => 'gd', // gd | imagick | gmagick
    'maintainAspectRatio' => true,
    'scaleDirective'      => 'FIT', // FIT | UP | DOWN
    'focus'               => 'NORTHWEST',
    'orientation'         => 'AUTO',
    'quality'             => 75,
    'cached'              => false,
]);