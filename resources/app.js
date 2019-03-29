/**
 * This file is part of the O2System Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian Salim
 * @copyright      Copyright (c) Steeve Andrian Salim
 */
// ------------------------------------------------------------------------

import "./app.scss";

if ('serviceWorker' in navigator) {
    navigator.serviceWorker
        .register('/service-worker.js')
        .then(function(registration) {
            console.log(
                'Service Worker registration successful with scope: ',
                registration.scope
            );
        })
        .catch(function(err) {
            console.log('Service Worker registration failed: ', err);
        });
}