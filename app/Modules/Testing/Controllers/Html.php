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

use O2System\Framework\Http\Controller;
use O2System\Html\Document;
use O2System\Html\Element;

/**
 * Class Html
 *
 * @package Testing\Controllers
 */
class Html extends Controller
{
    public function element()
    {
        $element = new Element('div');
        $element->entity->setEntityName('testing');
        print_out($element);
    }

    public function basicUsage()
    {
        /* Load html using template */
        $document = new Document;
        $document->loadHTMLFile( __DIR__ . '/../../Views/samples/template.html' );

        /* Find tag using xpath */
        $find = $document->find( 'h1' );
        print_out( $find, false );

        /* Load html by given string */
        $html = '
            <!DOCTYPE html>
            <html>
                <head>
                    <title></title>
                </head>
                <body>
                    <p>Test String Html</p>
                </body>
            </html>
        ';
        $document = new Document;
        $document->load( $html );

        /* Generate result */
        print_out( $document->saveHTML(), false );

        /* Saving result in existed file */
        print_out( $document->saveHTMLFile( __DIR__ . '/../../Views/samples/generated.txt' ), false );

        /* XHTML Template */
        $document = new Document;
        $document->load( __DIR__ . '/../../Views/samples/template-xhtml.xhtml' );

        $find = $document->find( 'h1' );
        print_out( $find, false );

        /* XHTML Transitional Template */
        $document = new Document;
        $document->load( __DIR__ . '/../../Views/samples/template-xhtml-transitional.xhtml' );

        $find = $document->find( 'h1' );
        print_out( $find, false );

        /* BB Code */
        $document = new Document;
        $document->load( '[b]Test BB Code[b]' );

        print_out( $document->saveHTML(), false );

        exit;
    }

    public function openGraph()
    {
        /* Open graph basic meta */
        $document = new Document;
        $document->loadHTMLFile( __DIR__ . '/../../Views/samples/template.html' );

        $ogBasic = $document->metaOGPNodes->createBasicElement();
        $ogBasic = $ogBasic->setMetaData( 'url', 'test.url.com' );
        print_out( $document->saveHTML(), false );

        /* Open graph website meta */
        $document = new Document;
        $document->loadHTMLFile( __DIR__ . '/../../Views/samples/template.html' );

        $ogWebsite = $document->metaOGPNodes->createWebsiteElement();
        $ogWebsite->setName( 'OG Website Name' );
        $ogWebsite->setUrl( 'www.url.com' );
        print_out( $document->saveHTML(), false );

        /* Open graph image meta */
        $document = new Document;
        $document->loadHTMLFile( __DIR__ . '/../../Views/samples/template.html' );

        $ogImage = $document->metaOGPNodes->createImageElement();
        $ogImage->setUrl( 'http://test.image.com/image/200/200' );
        $ogImage->setMetadata( 'url', 'http://test.image.com/image/200/200' );
        $ogImage->setSecureUrl( 'https://test.image.com/image/200/200' );
        $ogImage->setMime( 'image/jpeg' );
        $ogImage->setSize( 200, 200 );
        print_out( $document->saveHTML(), false );

        /* Open graph video meta */
        $document = new Document;
        $document->loadHTMLFile( __DIR__ . '/../../Views/samples/template.html' );

        $ogVideo = $document->metaOGPNodes->createVideoElement();
        $ogVideo->setUrl( 'http://test.video.com/video/Lorem+ipsum' );
        $ogVideo->setMetadata( 'url', 'https://test.video.com/video/Lorem+ipsum' );
        $ogVideo->setSecureUrl( 'https://test.video.com/video/Lorem+ipsum' );
        $ogVideo->setMime( 'video/mkv' );
        $ogVideo->setSize( 200, 200 );
        $ogVideo->setDuration( 75 );
        $ogVideo->setReleaseDate( 'Mon, 20 Jan 2016 01:08 GMT' );
        $ogVideo->setTag( 'test video' );
        print_out( $document->saveHTML(), false );

        /* Open graph audio meta */
        $document = new Document;
        $document->loadHTMLFile( __DIR__ . '/../../Views/samples/template.html' );

        $ogAudio = $document->metaOGPNodes->createAudioElement();
        $ogAudio->setUrl( 'http://test.audio.com/audio/Lorem+ipsum' );
        $ogAudio->setMetadata( 'url', 'http://test.audio.com/audio/Lorem+ipsum' );
        $ogAudio->setSecureUrl( 'https://test.audio.com/audio/Lorem+ipsum' );
        $ogAudio->setMime( 'audio/mp3' );
        print_out( $document->saveHTML(), false );

        /* Open graph book meta */
        $document = new Document;
        $document->loadHTMLFile( __DIR__ . '/../../Views/samples/template.html' );

        $ogBook = $document->metaOGPNodes->createBookElement();
        $ogBook->setUrl( 'http://test.book.com/book/Lorem+ipsum' );
        $ogBook->setMetadata( 'url', 'http://test.book.com/book/Lorem+ipsum' );
        $ogBook->setReleaseDate( 'Mon, 20 Jan 2016 01:08 GMT' );
        $ogBook->setIsbn( 2000 );
        $ogBook->setTag( 'Comic' );
        $ogBook->createAuthor()->setName( 'Test Name' );
        print_out( $document->saveHTML(), false );

        /* Open graph article meta */
        $document = new Document;
        $document->loadHTMLFile( __DIR__ . '/../../Views/samples/template.html' );

        $ogArticle = $document->metaOGPNodes->createArticleElement();
        $ogArticle->setUrl( 'http://test.article.com/article/Lorem+ipsum' );
        $ogArticle->setMetadata( 'url', 'http://test.article.com/article/Lorem+ipsum' );
        $ogArticle->setPublishedTime( 'Mon, 20 Jan 2016 01:08 GMT' );
        $ogArticle->setModifiedTime( 'Mon, 20 Feb 2016 01:08 GMT' );
        $ogArticle->setExpirationTime( 'Mon, 20 Feb 2016 01:08 GMT' );
        $ogArticle->section( 'Section Article' );
        $ogArticle->setTag( 'Article' );
        print_out( $document->saveHTML(), false );

        /* Open graph profile meta */
        $document = new Document;
        $document->loadHTMLFile( __DIR__ . '/../../Views/samples/template.html' );

        $ogProfile = $document->metaOGPNodes->createProfileElement();
        $ogProfile->setMetadata( 'meta', 'data' );
        $ogProfile->setSiteName( 'Meta Profile' );
        $ogProfile->setUrl( 'http://test.profile.com/profile' );
        $ogProfile->setName( 'Lorem ipsum dolor sit' );
        $ogProfile->setUsername( 'lorem' );
        $ogProfile->setgender( 'male' );
        print_out( $document->saveHTML(), false );

        exit;
    }

    public function nodes()
    {
        /* Meta create element */
        $document = new Document;
        $document->loadHTMLFile( __DIR__ . '/../../Views/samples/template.html' );

        $nodes = $document->metaNodes->createElement(
            'description',
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, possimus.'
        );
        print_out( $document->saveHTML(), false );

        /* Meta offset set */
        $document = new Document;
        $document->loadHTMLFile( __DIR__ . '/../../Views/samples/template.html' );

        $nodes = $document->metaNodes->offsetSet( 'tag', 'sample, site, tag, meta' );
        print_out( $document->saveHTML(), false );

        exit;
    }

    public function xpath()
    {
        $document = new Document;
        $document->loadHTMLFile( __DIR__ . '/../../Views/samples/template.html' );
        $find = $document->find( 'h1' );

        /* Item */
        print_out(
            [
                'Method Item : ',
                'result' => $find->item( 0 ),
            ],
            false
        );

        /* Has children */
        print_out(
            [
                'Has Children : ',
                'result' => $find->hasChildren(),
            ],
            false
        );

        /* Get children */
        print_out(
            [
                'Get Children : ',
                'result' => $find->getChildren(),
            ],
            false
        );

        /* Append */
        $find->append( ' Append Content ' );
        print_out(
            [
                'Append : ',
                'result' => $document->saveHTML(),
            ],
            false
        );

        /* Prepend */
        $find->prepend( ' Prepend Content ' );
        print_out(
            [
                'Prepend : ',
                'result' => $document->saveHTML(),
            ],
            false
        );

        /* Before */
        $find->before( ' Before Content ' );
        print_out(
            [
                'Before : ',
                'result' => $document->saveHTML(),
            ],
            false
        );

        /* After */
        $find->after( ' After Content ' );
        print_out(
            [
                'After : ',
                'result' => $document->saveHTML(),
            ],
            false
        );

        /* Replace */
        $find->replace( ' Content Replaced ' );
        print_out(
            [
                'Replace : ',
                'result' => $document->saveHTML(),
            ],
            false
        );

        /* Remove */
        // $find = $document->find('p');
        $find->remove();
        print_out(
            [
                'Remove : ',
                'result' => $document->saveHTML(),
            ],
            false
        );

        exit;
    }
}
