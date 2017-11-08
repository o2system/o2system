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

$parser = new \O2System\Parser\Datastructures\Config();

/**
 * Parser Driver
 *
 * You can choose the parser driver according to your favorite template engine. The available options are:
 *
 * noodle - Default parser engine by Steeven Andrian Salim
 * @see http://o2system.io/documentation/parser/noodle.html
 *
 * mustache - Parser engine by Chris Wanstrath
 * @see http://o2system.io/documentation/parser/mustache.html
 * @see http://smarty.net
 *
 * smarty - Parser engine by New Digital Group, Inc
 * @see http://o2system.io/documentation/parser/smarty.html
 * @see http://smarty.net
 *
 * dwoo - Parser engine by David Sanchez
 * @see http://o2system.io/documentation/parser/dwoo.html
 * @see http://dwoo.org
 *
 * twig - Parser engine by SensioLabs
 * @see http://o2system.io/documentation/parser/twig.html
 * @see http://twig.sensiolabs.org/doc/internals.html
 *
 * @var string
 */
$parser->driver = 'noodle';

// ------------------------------------------------------------------------

/**
 * PHP Scripts
 *
 * Allow php scripts to be parsed
 *
 * @var bool
 */
$parser->allowPhpScripts = true;

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
$parser->allowPhpGlobals = true;

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
$parser->allowPhpFunctions = true;

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
$parser->allowPhpConstants = true;

// ------------------------------------------------------------------------
