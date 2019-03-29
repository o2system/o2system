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
 * Email Configuration
 *
 * @var \O2System\Email\DataStructures\Config
 */
$email = new \O2System\Email\DataStructures\Config([
    /**
     * Sender Protocol
     * Supported sender protocol mail, smtp or sendmail.
     *
     * @var string
     */
    'protocol' => 'mail',

    /**
     * Sender User Agent
     *
     * @var string
     */
    'userAgent' => 'O2System\Email',

    /**
     * Wordwrap email body.
     *
     * @var bool
     */
    'wordwrap' => false,

    // ------------------------------------------------------------------------

    /**
     * SendMail Protocol Configuration
     * Set sendmail binary path.
     *
     * @var string
     */
    'mailPath' => '/usr/sbin/sendmail',

    /**
     * SMTP Protocol Configuration
     * Fill all configuration below if you set protocol to smtp.
     */

    // ------------------------------------------------------------------------

    /**
     * SMTP Host
     * Can be an IP Address or domain name.
     *
     * @var string
     */
    'host' => '',

    /**
     * SMTP Port
     * By default it's set to 25.
     *
     * @var numeric
     */
    'port' => 25,

    /**
     * SMTP Username
     *
     * @var string
     */
    'user' => '',

    /**
     * SMTP Password
     *
     * @var string
     */
    'pass' => '',

    /**
     * SMTP Encryption Type
     * Supported encryption type tls or ssl.
     *
     * @var string
     */
    'encryption' => ''
]);
