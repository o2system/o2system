<?php
/**
 * This file is part of the O2System PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Mohamad Rafi Randoni
 * @copyright      Copyright (c) Steeve Andrian Salim
 */
// ------------------------------------------------------------------------

namespace Testing\Controllers;

// ------------------------------------------------------------------------

use App\Http\Controller;
use O2System\Cache\Adapters;
use O2System\Cache\Item;
use O2System\Gear\UnitTesting;

/**
 * Class Cache
 *
 * @package Testing\Controllers
 */
class Cache extends Controller
{
    public function __construct()
    {
        parent::__construct();

        presenter()->page->setHeader( 'Cache' );
        presenter()->page->offsetSet('lead', 'Cache Debugging and Testing');
        presenter()->page->offsetSet('author', implode(', ', [
            'Rafi Randoni',
            'Steeven Andrian  Salim'
        ]));
    }

    public function index()
    {
        $adapters = [
            'Apc'       => new Adapters\Apc\ItemPool(),
            'Apcu'      => new Adapters\Apcu\ItemPool(),
            'File'      => new Adapters\File\ItemPool(),
            'Memcache'  => new Adapters\Memcache\ItemPool( new \O2System\Cache\Datastructures\Config( [
                'host'   => '127.0.0.1',
                'port'   => 11211,
                'weight' => 1,
            ] ) ),
            'Memcached' => new Adapters\Memcached\ItemPool( new \O2System\Cache\Datastructures\Config( [
                'host'   => '127.0.0.1',
                'port'   => 11211,
                'weight' => 1,
            ] ) ),
            'Opcache'   => new Adapters\Opcache\ItemPool(),
            'Redis'     => new Adapters\Redis\ItemPool( new \O2System\Cache\Datastructures\Config( [
                'host'     => '127.0.0.1',
                'port'     => 6379,
                'password' => null,
                'timeout'  => 0,
            ] ) ),
            'Wincache'  => new Adapters\Wincache\ItemPool(),
            'Xcache'    => new Adapters\Xcache\ItemPool(),
        ];

        $testing = new UnitTesting();

        foreach ( $adapters as $name => $itemPool ) {

            $cacheName = $name . '-' . mt_rand( 1000000, 9999999 );
            $cacheContent = 'Testing content of ' . $cacheName;

            if ( $itemPool->isConnected() ) {
                $itemPool->save( new Item( $cacheName, $cacheContent ) );
                $testing->test( $name, $itemPool->getItem( $cacheName )->get(), $cacheContent );
                $itemPool->clear();
            } else {
                $testing->test( $name, null, $cacheContent, 'Not connected' );
            }
        }

        view( 'report', [ 'reports' => $testing->getReports() ] );
    }
}
