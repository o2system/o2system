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

use O2System\Image\Manipulation;
use O2System\Image\Watermark\Text;
use O2System\Image\Watermark\Overlay;

/**
 * Class Image
 *
 * @package Testing\Controllers
 */
class Image extends Testing
{
    /**
     * Image::index
     */
    public function index()
    {
        $manipulation = new Manipulation();
        $manipulation->setImageFile( PATH_STORAGE . 'images/ferrari.jpg' ); // landscape
        //$manipulation->setImageFile( PATH_STORAGE . 'images/jessica.jpg' ); // portrait
        //$manipulation->setImageFile( PATH_STORAGE . 'images/building.jpg' ); // square
        //$manipulation->setImageFile( PATH_STORAGE . 'images/kawah-putih.jpg' );
        //$manipulation->scaleImage( 15 );
        //print_out($manipulation);
        //$manipulation->rotateImage( Manipulation::ROTATE_CW );
        //$manipulation->resizeImage( 100, 100 );
        //$manipulation->resizeImage( 150, 100 );
        //$manipulation->cropImage( new Dimension( 100, 200, 0, 20 ) );

        $manipulation->watermarkImage( ( new Text() )
            ->setPosition( 'MIDDLE_BOTTOM' )
            ->setPadding( 10 )
            ->signature( 'Braunberrie Timeless Portraiture' )
            ->copyright( 'Copyright © ' . date( 'Y' ) . ' Poniman Mulijadi' . PHP_EOL . 'Braunberrie Timeless Portraiture' )
        );

        /*$manipulation->watermarkImage( ( new Overlay() )
            ->setImageScale( 25 )
            ->setImagePath( PATH_STORAGE . 'images/watermark/braunberrie-watermark.png' )
        );*/

        $manipulation->displayImage();
        //$manipulation->saveImage( PATH_STORAGE . 'images/ferrari-thumb.jpg' );
    }

    // ------------------------------------------------------------------------

    /**
     * Image::resizing
     */
    public function resizing()
    {
        $manipulation = new Manipulation();
        $manipulation->setImageFile( PATH_STORAGE . 'images/kawah-putih.jpg' );
        $manipulation->resizeImage( 150, 100 );
        $manipulation->displayImage();
    }

    // ------------------------------------------------------------------------

    /**
     * Image::thumbnailing
     */
    public function thumbnailing()
    {
        $manipulation = new Manipulation();
        $manipulation->setImageFile( PATH_STORAGE . 'images/kawah-putih.jpg' );
        $manipulation->resizeImage( 100, 100 );
        $manipulation->displayImage();
    }

    // ------------------------------------------------------------------------

    /**
     * Image::scaling
     */
    public function scaling()
    {
        $manipulation = new Manipulation();
        $manipulation->setImageFile( PATH_STORAGE . 'images/kawah-putih.jpg' );
        $manipulation->scaleImage( 15 );
        $manipulation->displayImage();
    }

    // ------------------------------------------------------------------------

    /**
     * Image::rotating
     */
    public function rotating()
    {
        $manipulation = new Manipulation();
        $manipulation->setImageFile( PATH_STORAGE . 'images/building.jpg' );
        $manipulation->rotateImage( Manipulation::ROTATE_CW );
        $manipulation->displayImage();
    }
}