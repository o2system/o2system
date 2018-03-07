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
 * Default App
 *
 * This determine which application set is used by default.
 *
 * @var string|null
 */
$config[ 'app' ] = null;

/**
 * Default Character Set
 *
 * This determines which character set is used by default in various methods
 * that require a character set to be provided.
 *
 * @var string
 */
$config[ 'charset' ] = 'UTF-8';

/**
 * Default Language
 *
 * This determine which set of language packages should be used.
 *
 * @var array
 */
$config[ 'language' ] = 'en-US';

/**
 * DateTime Timezone
 *
 * @see http://php.net/manual/en/timezones.php
 *
 * @var string
 */
$config[ 'datetime' ][ 'timezone' ] = 'Asia/Jakarta';

/**
 * DateTime Reference
 *
 * Options are 'local' or 'gmt'.  This pref tells the system whether to use
 * your server's local time as the master 'now' reference, or convert it to
 * GMT.  See the 'date helper' page of the user guide for information
 * regarding date handling.
 *
 * @var string
 */
$config[ 'datetime' ][ 'reference' ] = 'local';

/**
 * DateTime Format
 *
 * @see http://php.net/manual/en/function.date.php
 *
 * @var string
 */
$config[ 'datetime' ][ 'format' ] = 'd-m-Y H:m:s';

/**
 * Reverse Proxy IP Addresses
 *
 * If your server is behind a reverse proxy, you must whitelist the proxy IP
 * addresses from which O2System should trust the HTTP_X_FORWARDED_FOR
 * header in order to properly identify the visitor's IP address.
 *
 * @var array
 */
$config[ 'ipAddresses' ][ 'proxy' ] = [ '127.0.0.1' ];

/**
 * Debug IP Addresses
 *
 * If your public IP is listed on the debug IP addresses, your environment will automatically
 * set into DEVELOPMENT environment even the environment stage is set into PRODUCTION.
 * This features is very useful when your application is going online in PRODUCTION stage, but
 * sometime you're need to debug it.
 *
 * @var array
 */
$config[ 'ipAddresses' ][ 'debug' ] = [ '127.0.0.1' ];

/**
 * Logger Threshold
 *
 * If you have enabled error logging, you can set an error threshold to
 * determine what gets logged. Threshold options are:
 *
 * LOGGER_DISABLED  = 0
 * LOGGER_DEBUG     = 1
 * LOGGER_INFO      = 2
 * LOGGER_NOTICE    = 3
 * LOGGER_WARNING   = 4
 * LOGGER_ALERT     = 5
 * LOGGER_ERROR     = 6
 * LOGGER_EMERGENCY = 7
 * LOGGER_CRITICAL  = 8
 * LOGGER_ALL       = 9
 *
 * For a live site you'll usually only enable Errors (1) to be logged otherwise
 * your log files will fill up very fast.
 *
 * @example Specific logging thresholds
 *          $config['logger']['threshold'] = [ LOGGER_DEBUG, LOGGER_INFO ];
 *
 * @var int|array
 */
$config[ 'logger' ][ 'threshold' ] = LOGGER_ALL;

/**
 * URI Protocol
 *
 * This item determines which server global should be used to retrieve the
 * URI string.  The default setting of 'AUTO' works for most servers.
 * If your links do not seem to work, try one of the other delicious flavors:
 *
 * 'AUTO'            Default - auto detects
 * 'PATH_INFO'        Uses the PATH_INFO
 * 'QUERY_STRING'    Uses the QUERY_STRING
 * 'REQUEST_URI'    Uses the REQUEST_URI
 * 'ORIG_PATH_INFO'    Uses the ORIG_PATH_INFO
 *
 * @var string
 */
$config[ 'uri' ][ 'protocol' ] = 'AUTO';

/**
 * Allowed URI Characters
 *
 * This lets you specify with a regular expression which characters are permitted
 * within your URLs.  When someone tries to submit a URL with disallowed
 * characters they will get a warning message.
 *
 * As a security measure you are STRONGLY encouraged to restrict URLs to
 * as few characters as possible.  By default only these are allowed: a-z 0-9~%.:_-@
 *
 * Leave blank to allow all characters -- but only if you are insane.
 *
 * DO NOT CHANGE THIS UNLESS YOU FULLY UNDERSTAND THE REPERCUSSIONS!!
 *
 * @var string String of Regular Expression (REGEX)
 */
$config[ 'uri' ][ 'permittedChars' ] = 'a-z 0-9~%.:_\-@#';

/**
 * URI Suffix
 *
 * This option allows you to add a suffix to all generated Http\Message\Uri string.
 *
 * @var string Usually fill with .html or .htm
 */
$config[ 'uri' ][ 'suffix' ] = '';

/**
 * Security Encryption Key
 *
 * @var string
 */
$config[ 'security' ][ 'encryptionKey' ] = '02Syst3m!';

/**
 * Security XSS Protection
 *
 * Enables protection against Cross Site Scripting (XSS) attack.
 * When set to TRUE, all Kernel\Input values will be automatically
 * cleaned from malicious script that try to be injected.
 *
 * @var bool
 */
$config[ 'security' ][ 'protection' ][ 'xss' ] = false;

/**
 * Security CSRF Protection
 *
 * Enables protection against Cross Site Request Forgery (CSRF) attack.
 * When set to TRUE, all Http POST request will require X-CSRF-Token header to be exists
 * and for Http AJAX POST will require X-JWT-Token header to be exists.
 *
 * @var bool
 */
$config[ 'security' ][ 'protection' ][ 'csrf' ] = false;

/**
 * Units Currency
 *
 * This configuration is used by currency_format at number helper.
 * See the 'number helper' page of the user guide for information
 * regarding currency number formatting.
 */
$config[ 'units' ][ 'currency' ] = 'IDR';

/**
 * Units Weight
 *
 * This configuration is used by weight_format at number helper.
 * See the 'number helper' page of the user guide for information
 * regarding weight number formatting.
 */
$config[ 'units' ][ 'weight' ] = 'gr';

/**
 * Cookie Configuration
 *
 * This configuration will be used to as the configuration of every cookie that will be set
 * by the system except session cookie.
 */
$config[ 'cookie' ] = [

    /**
     * Cookie Prefix
     *
     * The cookie name prefix to avoid collisions
     *
     * @var int
     */
    'prefix'   => 'o2',

    /**
     * Cookie Lifetime
     *
     * The number of SECONDS the cookie to last.
     *
     * @var int
     */
    'lifetime' => 7200,

    /**
     * Cookie Domain
     *
     * When set to blank or null, will automatically set base on your server hostname.
     *
     * @var string
     */
    'domain'   => null,

    /**
     * Cookie Path
     *
     * Typically will be a forward slash.
     *
     * @var string
     */
    'path'     => '/',

    /**
     * Cookie Secure
     *
     * Cookie will only be set if a secure HTTPS connection exists.
     *
     * @var bool
     */
    'secure'   => false,

    /**
     * Cookie Http Only
     *
     * Cookie will only be accessible via HTTP(S) (no javascript).
     *
     * @var bool
     */
    'httpOnly' => false,
];