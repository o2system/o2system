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
 * Manifest
 *
 * Progressive Web Application Manifest Configurations.
 *
 * @var \O2System\Kernel\DataStructures\Config
 */
$manifest = new \O2System\Kernel\DataStructures\Config([
    /**
     * short_name is a human-readable name for the application.
     * In Chrome for Android, this is also the name accompanying the icon on the home screen.
     */
    'short_name' => 'O2System',

    /**
     * name is also a human-readable name for the application
     * and defines how the application will be listed.
     */
    'name' => 'O2System PWA Framework',

    /**
     * description provides a general description of the web application.
     */
    'description' => 'O2System Progressive Web Application Development Framework',

    /**
     * icons defines an array of images of varying sizes that will serve as the application’s icon set.
     * In Chrome for Android, the icon will be used on the splash screen,
     * on the home screen and in the task switcher.
     */
    'icons' => [
        48 => [
            'src' => 'assets/icons/launcher-icon-48.png',
            'sizes' => '48x48',
            'type' => 'image/png'
        ],
        96 => [
            'src' => 'assets/icons/launcher-icon-96.png',
            'sizes' => '96x96',
            'type' => 'image/png'
        ],
        144 => [
            'src' => 'assets/icons/launcher-icon-144.png',
            'sizes' => '144x144',
            'type' => 'image/png'
        ],
        192 => [
            'src' => 'assets/icons/launcher-icon-192.png',
            'sizes' => '192x192',
            'type' => 'image/png'
        ],
        256 => [
            'src' => 'assets/icons/launcher-icon-256.png',
            'sizes' => '256x256',
            'type' => 'image/png'
        ],
    ],

    /**
     * start_url is the starting URL of the application.
     */
    'start_url' => '',

    /**
     * display defines the default display mode for the web application:
     * fullscreen, standalone, minimal-ui or browser.
     */
    'display' => 'standalone',

    /**
     * orientation defines the default orientation for the web application: portrait or landscape.
     */
    'orientation' => 'portrait',

    /**
     * theme_color is the default theme color for the application.
     * On Android, this is also used to color the status bar.
     */
    'theme_color' => '#cccccc',

    /**
     * background_color defines the background color of the web application.
     * In Chrome, it also defines the background color of the splash screen.
     */
    'background_color' => '#cccccc',

    /**
     * related_applications is used to specify native application alternatives in the various app stores.
     */
    'related_applications' => '',
]);