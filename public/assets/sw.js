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

const THEME_NAME = '{{$theme}}';
const CACHE_NAME = 'o2system';

self.addEventListener('install', function(event) {
    console.log('[Service Worker] Installing Service Worker ...', event);
    event.waitUntil(
        caches.open(CACHE_NAME + '-static-cache').then(function(cache){
            cache.addAll([
                '/themes/' + THEME_NAME + '/theme.css',
                '/assets/app.css',
                '/themes/' + THEME_NAME + '/theme.js',
                '/assets/app.js'
            ]);
        })
    );
});

self.addEventListener('activate', function(event) {
    console.log('[Service Worker] Activating Service Worker ....', event);
});

self.addEventListener('fetch', function(event) {
    event.respondWith(
        caches.match(event.request).then(function(response) {
            if (response) {
                return response;
            } else {
                return fetch(event.request).then(function(res) {
                    return caches.open(CACHE_NAME + '-dynamic-cache').then(function(cache) {
                        cache.put(event.request.url, res.clone());
                        return res;
                    });
                });
            }
        })
    );
});