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
use O2System\Filesystem\Files;
use O2System\Filesystem\Handlers\Downloader;
use O2System\Filesystem\Handlers\Ftp;
use O2System\Filesystem\Handlers\Uploader;
use O2System\Framework\Libraries\Ui\Components;
use O2System\Gear\UnitTesting;

/**
 * Class Filesystem
 *
 * @package Testing\Controllers
 */
class Filesystem extends Controller
{
    public function __construct()
    {
        parent::__construct();

        presenter()->page->setHeader( 'Filesystem' );
        presenter()->page->offsetSet('lead', 'Filesystem Library Debugging and Testing');
        presenter()->page->offsetSet('author', implode(', ', [
            'Rafi Randoni',
            'Steeven Andrian  Salim'
        ]));
    }

    public function index()
    {
        $listGroup = new Components\Lists\Group();
        $listGroup->createList( new Components\Link( 'Filesystem\\Files', base_url( 'testing/filesystem/write' ) ) );
        $listGroup->createList( new Components\Link( 'Filesystem\\Handler\\Uploader', base_url( 'testing/filesystem/upload' ) ) );
        $listGroup->createList( new Components\Link( 'Filesystem\\Handler\\Downloader', base_url( 'testing/filesystem/download' ) ) );

        presenter()->page->offsetSet( 'lists', $listGroup );

        view( 'index' );
    }

    public function write()
    {
        $files = [
            'Csv File'  => new Files\CsvFile(),
            'Ini File'  => new Files\IniFile(),
            'Json File' => new Files\JsonFile(),
            'Xml File'  => new Files\XmlFile(),
        ];

        $testing = new UnitTesting();

        foreach ( $files as $label => $file ) {
            $file->createFile( PATH_STORAGE . 'files' . DIRECTORY_SEPARATOR . dash( $label ) );
            $file->store( 'foo', 'bar' );

            $testing->test( $label, $file->writeFile(), true );
        }

        view( 'report', [ 'reports' => $testing->getReports() ] );
    }

    public function download()
    {
        $downloader = new Downloader( PATH_STORAGE . 'files' . DIRECTORY_SEPARATOR . 'php-7.1.6RC1-Win32-VC14-x86.zip' );
        $downloader
            ->speedLimit( 1024 )
            ->resumeable( true )
            ->download();
    }

    public function upload()
    {
        $upload = new Uploader;
        $upload->setPath( __DIR__ );
        $upload->setTargetFilename( 'Uploader' );
        $upload->setAllowedExtensions( 'txt,md,pdf' );
        $upload->setMinFileSize( 0, 'K' );
        $upload->setMaxFileSize( 50, 'M' );
        $upload->setMaxIncrementFilename( 3 );
        print_out( $upload->process( 'files' ) );
    }

    public function ftp()
    {
        $ftp = new Ftp();
        print_out( $ftp );
    }
}