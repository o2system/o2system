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

use O2System\Kernel\Datastructures\Config;

$presenter = new Config( [], Config::STD_OFFSET );

/**
 * Presenter Debug Toolbar
 *
 * @var bool
 */
$presenter->debugToolBar = true;

/**
 * Presenter Theme
 *
 * @var string
 */
$presenter->theme = 'default';

/**
 * Presenter SocialGraph
 *
 * @var string
 */
$presenter->socialGraph = false;

/**
 * Presenter Assets
 *
 * @var array
 */
$presenter->assets = [

    /**
     * Combine view assets
     *
     * @var bool
     */
    'combine'  => false,

    // --------------------------------------------------------------------

    /**
     * Autoload view assets
     *
     * @var array
     */
    'autoload' => [
        'head' => [
            'css'   => [  ],
            'fonts' => [ 'font-awesome' ],
        ],
        'body' => [
            'js' => [
                'jquery.js',
                'jquery-migrate.js',
                'system.js',
                'holder.js',
            ],
        ],
        'packages' => [
            'bootstrap' => [
                'libraries' => [
                    'popper',
                    'tether'
                ]
            ],
            'o2system-ui'
        ]
    ],

    // --------------------------------------------------------------------
];