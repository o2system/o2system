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

namespace App\Datastructures;

// ------------------------------------------------------------------------

use O2System\Framework\Http\Message\Uri;
use O2System\Framework\Libraries\Ui\Components\Breadcrumb;
use O2System\Framework\Libraries\Ui\Components\Link;
use O2System\Psr\Patterns\AbstractVariableStoragePattern;

/**
 * Class Page
 *
 * @package App\Datastructures
 */
class Page extends AbstractVariableStoragePattern
{
    /**
     * Page::__construct
     */
    public function __construct()
    {
        // Create Page breadcrumbs
        $breadcrumb = new Breadcrumb();
        $breadcrumb->createList( new Link( language()->getLine( 'HOME' ), base_url() ) );
        $this->store( 'breadcrumb', $breadcrumb );

        // Store Page Uri
        $uri = new Uri();
        $this->store( 'uri', $uri );
    }

    // ------------------------------------------------------------------------

    /**
     * Page::setHeader
     *
     * @param string $header
     *
     * @return static
     */
    public function setHeader( $header )
    {
        $header = trim( $header );
        $this->store( 'header', $header );
        presenter()->meta->offsetSet( 'subtitle', $header );
        presenter()->meta->title->append( $header );

        return $this;
    }

    // ------------------------------------------------------------------------

    /**
     * Page::setSubHeader
     *
     * @param string $subHeader
     *
     * @return static
     */
    public function setSubHeader( $subHeader )
    {
        $this->store( 'subHeader', trim( $subHeader ) );

        return $this;
    }

    // ------------------------------------------------------------------------

    /**
     * Page::setDescription
     *
     * @param string $description
     *
     * @return static
     */
    public function setDescription( $description )
    {
        $description = trim( $description );
        $this->store( 'description', $description );

        return $this;
    }

    // ------------------------------------------------------------------------
}