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
 * Access Control Library Configuration
 *
 * @var \O2System\Kernel\DataStructures\Config
 */
$accessControl = new \O2System\Kernel\DataStructures\Config([
    /**
     * Password Hash Algorithm
     *
     * A password algorithm constant denoting the algorithm to use when hashing the password.
     *
     * The following algorithms are currently supported:
     *
     * PASSWORD_DEFAULT
     * Use the bcrypt algorithm (default as of PHP 5.5.0).
     * Note that this constant is designed to change over time as new and stronger algorithms are added to PHP.
     * For that reason, the length of the result from using this identifier can change over time.
     * Therefore, it is recommended to store the result in a database column that can expand
     * beyond 60 characters (255 characters would be a good choice).
     *
     * PASSWORD_BCRYPT
     * Use the CRYPT_BLOWFISH algorithm to create the hash.
     * This will produce a standard crypt() compatible hash using the "$2y$" identifier.
     * The result will always be a 60 character string, or FALSE on failure.
     */
    'algorithm'   => PASSWORD_DEFAULT,

    // ------------------------------------------------------------------------

    /**
     * Password Hash Options
     *
     * An associative array containing options.
     * See the password algorithm constants for documentation on the supported options for each algorithm.
     *
     * If omitted, a random salt will be created and the default cost will be used.
     */
    'options'     => [
        /**
         * In this case, we want to increase the default cost for PASSWORD_BCRYPT to 12.
         * Note that we also switched to PASSWORD_BCRYPT, which will always be 60 characters.
         */
        'cost' => 12
    ],

    // ------------------------------------------------------------------------

    /**
     * MSISDN Regex
     *
     * If you want to be more exact with the country codes see this question on List of phone number country codes.
     *
     * @see https://code.google.com/p/libphonenumber/
     */
    'msisdnRegex' => '/^\+[1-9]{1}[0-9]{3,14}$/',

    // ------------------------------------------------------------------------

    /**
     * Maximum login attempts.
     */
    'attempts' => 5,

    // ------------------------------------------------------------------------

    /**
     * Single Sign-On
     */
    'sso' => [
        'enable' => false,
        'server' => null,
    ],
]);