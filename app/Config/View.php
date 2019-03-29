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

/**
 * Http View Configuration
 *
 * @var \O2System\Kernel\DataStructures\Config
 */
$view = new \O2System\Kernel\DataStructures\Config([
    'presenter' => [
        /**
         * Presenter Debug Toolbar
         *
         * @var bool
         */
        'debugToolBar' => true,

        // ------------------------------------------------------------------------

        /**
         * Presenter Theme
         *
         * @var string
         */
        'theme' => 'default',

        // ------------------------------------------------------------------------

        /**
         * Presenter SocialGraph
         *
         * @var string
         */
        'socialGraph' => true,

        // ------------------------------------------------------------------------
    ],

    /**
     * View Output
     *
     * @var array
     */
    'output' => [
        /**
         * Uglify view HTML output
         *
         * Removes extra characters (usually unnecessary spaces) from your output for faster page load speeds.
         * Makes your outputted HTML source code less readable.
         *
         * @var bool
         */
        'uglify' => false,

        // --------------------------------------------------------------------

        /**
         * Beautify view HTML output
         *
         * When set to TRUE the HTML source code output will automatically beautify using Indenter.
         * Only worked when minify or compress set to FALSE. On PRODUCTION stage it's recommended to be set as FALSE
         *
         * NOTE: If your memory limit is exhausted, when O2System is try to beautify your HTML output,
         * you can change your memory limit or set this configuration into FALSE, this can be happened because
         * on your HTML output some errors occurs.
         *
         * @var bool
         */
        'beautify' => false,
    ]
]);