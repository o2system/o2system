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
 * Parser Configuration
 *
 * @var \O2System\Parser\DataStructures\Config
 */
$parser = new \O2System\Parser\DataStructures\Config([
    /**
     * Template Engine
     *
     * You can choose the parser driver according to your favorite template engine. The available options are:
     *
     * Noodle - Default parser engine by Steeven Andrian Salim
     * Mustache - Parser engine by Chris Wanstrath
     * Smarty - Parser engine by New Digital Group, Inc
     * Dwoo - Parser engine by David Sanchez
     * Twig - Parser engine by SensioLabs
     *
     * @var string
     */
    'template' => [
        'Noodle'
    ],

    // ------------------------------------------------------------------------

    /**
     * String Engine
     *
     * You can choose the parser driver according to your favorite template engine. The available options are:
     *
     * Shortcodes
     * BBCode
     * Markdown
     *
     * @var string
     */
    'template' => [
        'Noodle'
    ],

    // ------------------------------------------------------------------------

    /**
     * PHP Scripts
     *
     * Allow php scripts to be parsed
     *
     * @var bool
     */
    'allowPhpScripts' => true,

    // ------------------------------------------------------------------------

    /**
     * PHP Globals Variable
     *
     * Allow php global variable to be parsed
     *
     * When set to TRUE all php globals variables will automatically parse into string.
     *
     * @var bool
     */
    'allowPhpGlobals' => true,

    // ------------------------------------------------------------------------

    /**
     * PHP Functions
     *
     * Allow php functions to be parsed
     *
     * When set to TRUE all php functions will automatically parse into string.
     * Or you can listed all allowed php function into this configuration.
     *
     * @example
     * $parser->allowPhpFunctions = ['base_url', 'current_url']
     *
     * @var bool|array
     */
    'allowPhpFunctions' => true,

    // ------------------------------------------------------------------------

    /**
     * PHP Constants
     *
     * Allow php constants to be parsed
     *
     * When set to TRUE all defined php constants will automatically parse into string.
     * Or you can listed all allowed defined php constants into this configuration.
     *
     * @example
     * $parser->allowPhpConstants = ['SYSTEM_NAME', 'SYSTEM_VERSION']
     *
     * @var bool|array
     */
    'allowPhpConstants' => true,
]);