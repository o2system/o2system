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

$uri = urldecode(
    parse_url($_SERVER[ 'REQUEST_URI' ], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__ . '/public' . $uri)) {
    return false;
} elseif ($uri !== '/' && file_exists($filePath = __DIR__ . str_replace('\\', '/', DIRECTORY_SEPARATOR))) {
    if (strpos(dirname($filePath), 'database') !== false) {
        return false;
    } elseif (strpos(dirname($filePath), 'cache') !== false) {
        return false;
    } elseif(is_file($filePath)) {
        header('Content-Disposition: filename=' . pathinfo($filePath, PATHINFO_BASENAME));
        header('Content-Transfer-Encoding: binary');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s', time()) . ' GMT');
        header('Content-Type: ' . filemtime($filePath));
        echo readfile($filePath);
        exit(0);
    }
}

require_once __DIR__ . '/public/index.php';
