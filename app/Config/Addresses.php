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
 * Router Addresses Configuration
 *
 * @var \O2System\Kernel\Http\Router\Addresses
 */
$addresses = new \O2System\Kernel\Http\Router\Addresses();

// ------------------------------------------------------------------------

// Example Route To Default Controller
$addresses->any(
    '/',
    function () {
        return new \App\Controllers\Hello();
    }
);

// Example route with regex
$addresses->get('regex/(:any)/(:any?)', function ($foo, $bar = null) { // OK
    print_out(func_get_args());
});
$addresses->get('regex/(:any)/(:num)', function ($foo, $bar = null) { // OK
    print_out(func_get_args());
});

// Example route with regex


// Example Route to String Controller
$addresses->any('/control', '\App\Controllers\Hello'); // DONE
$addresses->any('/control/{$foo}/', '\App\Controllers\Hello@testing'); // DONE

$addresses->any('/user/{$user}/', function (\App\DataStructures\User $user) {
    print_out($user);
}); // DONE

// Example route to controller
$addresses->get(
    '/user-interface',
    function () {
        return new \App\Controllers\Ui();
    }
);

// Example route to pages or view directly
$addresses->get('/home', function () {
    //view()->page('example');
    view()->load('home'); // OK
});

// Example route with parsed variable
$addresses->get('blogging/{$bar}', function ($foo = null, $bar = null) { // OK
    print_out(func_get_args()); // OK
});


// ------------------------------------------------------------------------

// example pool routing
$addresses->pool(
    ['prefix' => 'group'],
    function () use ($addresses) {
        $addresses->any('/', function () {
            return 'Group Default';
        });
        $addresses->any('/custom', function () {
            return new \Testing\Controllers\Testing();
        });

        return $addresses;
    }
);

// Example Route Subdomains
$addresses->domains([
    //'module' => ['cms'],
    //'cms' => function(){
        //redirect_url('http://module.o2system5.local');
    //},
    // example route to module testing
    //'module.o2system5.local'      => 'testing',
    // example route to about page
    'page.o2system5.local'        => ['example'],
    // example route to custom controller
    'controller.o2system5.local'  => ['ui'],
    // example route using validation process
    '{$business}.o2system5.local' => function ($subdomain) {
        $validBusinessSubdomains = ['eclouds', 'something'];

        // return 2 type array / false
        if (in_array($subdomain, $validBusinessSubdomains)) {
            return ['hello', 'domain', $subdomain];
        }

        return false;
    },
    // example route using wildcard domain validation process
    '*'                           => function ($domain) {
        $validBusinessDomains = ['wildcard.local'];

        // found
        if (in_array($domain, $validBusinessDomains)) {
            //return ['business'];
            // check toko status active ato tidak
            // module/controller/method/param
            return ['hello', 'domain', $domain];
        }

        return false;
    },
]);