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

namespace Testing\Controllers;

// ------------------------------------------------------------------------

use App\Models\Addresses;
use App\Models\Articles;
use App\Models\Users;
use O2System\Database\SQL;
use O2System\Database\NoSQL;
use O2System\Database\Datastructures\Config;
use O2System\Framework\Http\Controller;

/**
 * Class Database
 *
 * @package Testing\Controllers\Framework
 */
class Database extends Controller
{
    public function mysql()
    {

        $mysql = new SQL\Drivers\MySQL\Connection(
            new Config(
                [
                    'dsn'          => '',
                    'hostname'     => '127.0.0.1',
                    'port'         => 3306,
                    'username'     => 'root',
                    'password'     => 'Smartworks0721!',
                    'database'     => 'zero_app',
                    'charset'      => 'utf8',
                    'collate'      => 'utf8_general_ci',
                    'tablePrefix'  => '',
                    'strictOn'     => false,
                    'encrypt'      => false,
                    'compress'     => false,
                    'buffered'     => false,
                    'persistent'   => true,
                    'transEnabled' => false,
                    'cacheEnabled' => false,
                    'debugEnabled' => true,
                ]
            )
        );

        //print_out($mysql->getPlatformInfo());
        //print_out( $mysql->getDatabases());
        //print_out( $mysql->getTables() );
        //print_out( $mysql->getColumns( 'sys_modules' ) );

        $query = $mysql->getQueryBuilder();
        $result = $query->select( 'segment' )->from( 'sys_modules' )->get();
        print_out( $result );

        //$result = $query->table('sys_modules')->get();
        // print_out($result);
    }

    public function sqlite()
    {
        $sqlite = new SQL\Drivers\SQLite\Connection(
            new Config(
                [
                    'database'     => PATH_STORAGE . 'database/o2system.db',
                    'tablePrefix'  => '',
                    /**
                     * The milliseconds to sleep.
                     * Setting this value to a value less than or equal to zero,
                     * will turn off an already set timeout handler.
                     */
                    'busyTimeout'  => 0,
                    'readOnly'     => false,
                    'transEnabled' => false,
                    'cacheEnabled' => false,
                    'debugEnabled' => true,
                ]
            )
        );

        //print_out( $sqlite->getPlatformInfo());
        //print_out( $sqlite->getDatabases());
        //print_out( $sqlite->getTables() );
        //print_out( $sqlite->getColumns( 'testing' ) );

        $query = $sqlite->getQueryBuilder();
        $result = $query->select( 'segment' )->from( 'sys_modules' )->get();
        print_out( $result );

        //$result = $sqlite->table('testing')->get();
        //$result = $sqlite->table('testing')->countAll();
        //$result = $sqlite->table( 'testing' )->limit( 2 )->get();
        //print_out( $result );
    }

    public function mongodb()
    {
        $mongodb = new NoSQL\Drivers\MongoDB\Connection(
            new Config(
                [
                    'dsn'          => '',
                    'hostname'     => '127.0.0.1',
                    'port'         => 27017,
                    'database'     => 'neo_app',
                    'charset'      => 'utf8',
                    'collate'      => 'utf8_general_ci',
                    'tablePrefix'  => '',
                    'strictOn'     => false,
                    'encrypt'      => false,
                    'compress'     => false,
                    'buffered'     => false,
                    'persistent'   => true,
                    'transEnabled' => false,
                    'cacheEnabled' => false,
                    'debugEnabled' => true,
                ]
            )
        );

        //print_out( $mongodb->getPlatformInfo());
        //print_out( $mongodb->getDatabases());
        //print_out($mongodb->getCollections());
        //print_out( $mongodb->getKeys( 'sys_modules' ) );
        //print_out( $mongodb->getIndexes( 'sys_modules' ) );

        $query = $mongodb->getQueryBuilder();
        $result = $query->from( 'posts' )
            //->where([ 'record.status' => 'PUBLISH' ])
            //->orWhere([ 'title' => 'What is MsSQL' ])
            //whereIn( 'id', [ 1, 2 ] )
            //->orWhereIn( 'alias', [ 'what-is-mongodb' ] )
            //->whereBetween( 'id', 1, 3 )
            //->orWhereBetween( 'score', 200, 600 )
            ->whereNotBetween( 'id', 2, 5 )
            ->orWhereNotBetween( 'score', 200, 600 )
            //->orderBy( 'id', 'DESC' )
            ->get();

        print_out( $result );

        /*$result = $query->collection( 'testing' )->insert( [
            'id'    => 2,
            'name'  => 'zHa',
            'score' => 2000,
        ] );*/

        /* $result = $query->collection( 'testing' )->update( [
             'name' => 'zHa',
         ], [ 'id' => 2 ] );*/

        //$result = $query->collection( 'testing' )->delete( [ 'id' => 2 ] );

        $result = $query->collection( 'testing' )->insertBatch( [
            [
                'id'    => 2,
                'name'  => 'zHa',
                'score' => 2000,
            ],
            [
                'id'    => 3,
                'name'  => 'Thea',
                'score' => 3000,
            ],
            [
                'id'    => 4,
                'name'  => 'Neal',
                'score' => 4000,
            ],
        ] );

        print_out( $result );
    }

    public function models()
    {
        $model = new \App\Models\Testing();
        print_out( $model->all() );
    }

    public function orm()
    {
        $model = new Articles();
        $users = new Users();
        $address = new Addresses();

        // Case 1: Many articles belongs to user
        print_out( $model->all()->first()->user );

        // Case 2: One user Has Many articles (DONE)
        //print_out( $users->find( 1 )->articles );

        // Case 3: One user has one address (DONE)
        //print_out( $model->all()->first()->user->address );

        // Case 4: One user belongs to many rules
        //print_out( $model->all()->first()->user->rules );

        // Case 5: One user has many through
        print_out( $address->find( 1 )->articles );

        // Case 6:
    }
}