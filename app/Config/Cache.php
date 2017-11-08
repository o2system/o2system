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

use O2System\Cache\Datastructures\Config;

/**
 * Cache ItemPools Configuration
 *
 * Each offset representing the ItemPool configuration.
 *
 * @see https://github.com/o2system/cache/wiki
 *
 * @var \O2System\Cache\Datastructures\Config
 */
$cache = new Config(
    [
        'default'  => [
            'adapter' => 'file',
        ],
        'registry' => [
            'adapter' => 'file',
            'path'    => PATH_CACHE . 'registry',
        ],
        'output'   => [
            'adapter' => 'file',
            'path'    => PATH_CACHE . 'output',
        ],
        'images'   => [
            'adapter' => 'file',
            'path'    => PATH_CACHE . 'images',
        ],
    ]
);