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

const APP_NAME = '{{ $appName }}';
const CACHE_NAME = APP_NAME + '_cache';
const THEME_NAME = '{{ $themeName }}';

self.addEventListener('install', function(event) {
    console.info('[' + APP_NAME + '] Installing Service Worker ...', event);
    event.waitUntil(
        caches.open(CACHE_NAME).then(function(cache) {
            if(THEME_NAME === '') {
                cache.addAll([
                    '/assets/app.css',
                    '/assets/app.js'
                ]);
            } else {
                cache.addAll([
                    '/themes/' + THEME_NAME + '/theme.css',
                    '/assets/app.css',
                    '/themes/' + THEME_NAME + '/theme.js',
                    '/assets/app.js'
                ]);
            }
        })
    );
});

self.addEventListener('activate', function(event) {
    console.info('[' + APP_NAME + '] Activating Service Worker ....', event);
});

// Install stage sets up the offline page in the cache and opens a new cache
self.addEventListener("install", function (event) {
  console.log('[' + APP_NAME + '] Install Event processing');

  event.waitUntil(
    caches.open(CACHE_NAME).then(function (cache) {
      console.log('[' + APP_NAME + '] Cached offline page during install');

      return cache.add('/offline');
    })
  );
});

// If any fetch fails, it will show the offline page.
self.addEventListener("fetch", function (event) {
  if (event.request.method !== "GET") return;

  event.respondWith(
    fetch(event.request).catch(function (error) {
      // The following validates that the request was for a navigation to a new document
      if (
        event.request.destination !== "document" ||
        event.request.mode !== "navigate"
      ) {
        return;
      }

      console.error('[' + APP_NAME + '] Network request Failed. Serving offline page ' + error);
      return caches.open(CACHE_NAME).then(function (cache) {
        return cache.match(offlineFallbackPage);
      });
    })
  );
});

// This is an event that can be fired from your page to tell the SW to update the offline page
self.addEventListener("refreshOffline", function () {
  const offlinePageRequest = new Request(offlineFallbackPage);

  return fetch(offlineFallbackPage).then(function (response) {
    return caches.open(CACHE_NAME).then(function (cache) {
      console.log('[' + APP_NAME + '] Offline page updated from refreshOffline event: ' + response.url);
      return cache.put(offlinePageRequest, response);
    });
  });
});