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

$view = new Config();

// ------------------------------------------------------------------------

/**
 * View File Extensions
 *
 * @var array
 */
$view->extensions = [
    '.php',
    '.phtml',
];

// ------------------------------------------------------------------------

/**
 * View Output
 *
 * @var array
 */
$view->output = [
    /**
     * Compress view HTML output using zlib compression
     *
     * @var bool
     */
    'compress' => false,

    // --------------------------------------------------------------------

    /**
     * Minify view HTML output
     *
     * Removes extra characters (usually unnecessary spaces) from your output for faster page load speeds.
     * Makes your outputted HTML source code less readable.
     *
     * @var bool
     */
    'minify'   => false,

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

    // --------------------------------------------------------------------

    /**
     * Profiler Output
     *
     * Add profiler information commented at your HTML output.
     *
     * @var bool
     */
    'profiler' => true,
];