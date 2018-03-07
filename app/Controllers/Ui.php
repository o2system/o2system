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

namespace App\Controllers;

// ------------------------------------------------------------------------

use App\Http\Controller;
use O2System\Framework\Libraries\Ui\Contents;
use O2System\Framework\Libraries\Ui\Components;

/**
 * Class Ui
 *
 * @package App\Controllers
 */
class Ui extends Controller
{
    public function index()
    {
        presenter()->page
            ->setHeader( 'User Interface' )
            ->setDescription( 'Demo User Interface' );

        /**
         * Alerts
         */
        $alerts[ 'success' ] = new Components\Alert();
        $alerts[ 'success' ]
            ->contextSuccess()
            ->setHeading( 'Well done!' )
            ->setText( 'You successfully read this important alert message.' );

        $alerts[ 'info' ] = new Components\Alert();
        $alerts[ 'info' ]
            ->contextInfo()
            ->setHeading( 'Heads up!' )
            ->setText( 'This alert needs your attention, but it\'s not super important.' );

        $alerts[ 'warning' ] = new Components\Alert();
        $alerts[ 'warning' ]
            ->contextWarning()
            ->setHeading( 'Warning!' )
            ->setText( 'Better check yourself, you\'re not looking too good.' );

        $alerts[ 'danger' ] = new Components\Alert();
        $alerts[ 'danger' ]
            ->contextDanger()
            ->setHeading( 'Oh snap!' )
            ->setText( 'Change a few things up and try submitting again.' );

        /**
         * Accordion
         */
        $accordion = new Components\Accordion();
        $accordion->createCard( 'Card One', 'Content Card One' )->show();
        $card = $accordion->createCard( 'Card Two' );
        $card->block->setParagraph( 'Content Card Two' );

        /**
         * Badges
         */
        $badges[ 'link' ] = new Contents\Link( 'Inbox', '#' );
        $badges[ 'link' ]->childNodes->push( new Components\Badge( 42 ) );

        $badges[ 'button' ] = new Components\Button( 'Messages', [], Components\Button::PRIMARY_CONTEXT );
        $badges[ 'button' ]->childNodes->push( new Components\Badge( 4 ) );

        $contextualClasses = [
            'default',
            'primary',
            'secondary',
            'success',
            'info',
            'warning',
            'danger',
            'light',
            'dark',
        ];

        $badges[ 'colors' ] = [];
        foreach ( $contextualClasses as $contextualClass ) {
            $badges[ 'colors' ][ $contextualClass ] = new Components\Badge( ucfirst( $contextualClass ),
                $contextualClass );
        }

        /**
         * Buttons
         */
        $buttons[ 'default' ] = new Components\Button( 'Default' );
        $buttons[ 'active' ] = ( new Components\Button( 'Active' ) )->active();
        $buttons[ 'disabled' ] = ( new Components\Button( 'Disabled' ) )->disabled();
        $buttons[ 'outline' ] = ( new Components\Button( 'Outline' ) )->contextOutline();
        $buttons[ 'rounded' ] = ( new Components\Button( 'Round' ) )->rounded();
        $buttons[ 'with-icon' ] = ( new Components\Button( 'With Icon' ) )->setIcon( [
            'fa',
            'fa-star',
        ] )->rounded();
        $buttons[ 'only-icon' ] = ( new Components\Button() )->setIcon( [
            'fa',
            'fa-star',
        ] )->rounded();

        $buttons[ 'sizes' ][ 'xsmall' ] = ( new Components\Button( 'Extra Small' ) )->extraSmallSize();
        $buttons[ 'sizes' ][ 'small' ] = ( new Components\Button( 'Small' ) )->smallSize();
        $buttons[ 'sizes' ][ 'medium' ] = ( new Components\Button( 'Medium' ) )->mediumSize();
        $buttons[ 'sizes' ][ 'large' ] = ( new Components\Button( 'Large' ) )->largeSize();
        $buttons[ 'sizes' ][ 'xlarge' ] = ( new Components\Button( 'Extra Large' ) )->extraLargeSize();

        $buttons[ 'colors' ][ 'default' ] = ( new Components\Button( 'Default' ) )->contextDefault();
        $buttons[ 'colors' ][ 'primary' ] = ( new Components\Button( 'Primary' ) )->contextPrimary();
        $buttons[ 'colors' ][ 'secondary' ] = ( new Components\Button( 'Secondary' ) )->contextSecondary();
        $buttons[ 'colors' ][ 'success' ] = ( new Components\Button( 'Success' ) )->contextSuccess();
        $buttons[ 'colors' ][ 'info' ] = ( new Components\Button( 'Info' ) )->contextInfo();
        $buttons[ 'colors' ][ 'warning' ] = ( new Components\Button( 'Warning' ) )->contextWarning();
        $buttons[ 'colors' ][ 'danger' ] = ( new Components\Button( 'Danger' ) )->contextDanger();
        $buttons[ 'colors' ][ 'light' ] = ( new Components\Button( 'Light' ) )->contextLight();
        $buttons[ 'colors' ][ 'dark' ] = ( new Components\Button( 'Dark' ) )->contextDark();

        $buttons[ 'popover' ] = new Components\Button( 'Popover' );
        $buttons[ 'popover' ]->setPopover( 'Popover title', 'This is popover content.' );

        $buttons[ 'tooltip' ] = new Components\Button( 'Tooltip' );
        $buttons[ 'tooltip' ]->setTooltip( 'This is tooltip content.', 'top' );

        $buttons[ 'dropdown' ] = new Components\Dropdown( 'Dropdown' );
        $buttons[ 'dropdown' ]->menu->createHeader( 'Dropdown Header' );
        $buttons[ 'dropdown' ]->menu->createItem( 'Action', '#' );
        $buttons[ 'dropdown' ]->menu->createItem( 'Another Action', '#' );
        $buttons[ 'dropdown' ]->menu->createDivider();
        $buttons[ 'dropdown' ]->menu->createItem( 'Separated Link', '#' );

        $buttons[ 'group' ] = new Components\Buttons\Group();
        foreach ( [ 'Left', 'Middle', 'Right' ] as $label ) {
            $buttons[ 'group' ]->createButton( $label );
        }

        $buttons[ 'button-toolbar' ] = new Components\Buttons\Toolbar();
        $buttonGroup = $buttons[ 'button-toolbar' ]->createButtonGroup();
        $buttonGroup->attributes->addAttributeClass( 'mr-2' );

        foreach ( range( 1, 4 ) as $number ) {
            $buttonGroup->createButton( $number );
        }

        $buttonGroup = $buttons[ 'button-toolbar' ]->createButtonGroup();
        $buttonGroup->attributes->addAttributeClass( 'mr-2' );

        foreach ( range( 5, 7 ) as $number ) {
            $buttonGroup->createButton( $number );
        }

        $buttonGroupDropdown = $buttons[ 'button-toolbar' ]->createDropdownButtonGroup( 'Dropdown' );
        $buttonGroupDropdown->menu->createHeader( 'Dropdown Header' );
        $buttonGroupDropdown->menu->createItem( 'Action', '#' );
        $buttonGroupDropdown->menu->createItem( 'Another Action', '#' );
        $buttonGroupDropdown->menu->createDivider();
        $buttonGroupDropdown->menu->createItem( 'Separated Link', '#' );

        $buttons[ 'nesting-toolbar' ] = new Components\Buttons\Toolbar();
        $buttonGroup = $buttons[ 'nesting-toolbar' ]->createButtonGroup();
        $buttonGroup->createButton( '1' );
        $buttonGroup->createButton( '2' );
        $buttonGroup->createButton( $buttons[ 'dropdown' ] );

        $buttons[ 'mixed-toolbar' ] = new Components\Buttons\Toolbar();
        $buttonGroup = $buttons[ 'mixed-toolbar' ]->createButtonGroup();
        $buttonGroup->attributes->addAttributeClass( 'mr-2' );
        $buttonGroup->createButton( '1' );
        $buttonGroup->createButton( '2' );
        $buttonGroup->createButton( $buttons[ 'dropdown' ] );

        $inputGroup = $buttons[ 'mixed-toolbar' ]->createInputGroup();
        $inputGroup->createAddon( '@' );
        $inputGroup->createInput( [ 'placeholder' => 'Input group example' ] );

        $buttons[ 'vertical' ] = new Components\Buttons\Group();
        $buttons[ 'vertical' ]->verticalStacked();
        $buttons[ 'vertical' ]->createButton( 'Button' );
        $buttons[ 'vertical' ]->createButton( $buttons[ 'dropdown' ] );
        $buttons[ 'vertical' ]->createButton( 'Button' );

        /**
         * Breadcrumb
         */
        $breadcrumb = new Components\Breadcrumb();
        $breadcrumb->createList( ( new Contents\Link( 'Home', base_url() ) ) );
        $breadcrumb->createList( ( new Contents\Link( 'Library', '#' ) ) );
        $breadcrumb->createList( ( new Contents\Link( 'Data', current_url() ) ) );

        /**
         * Cards
         */
        $cards[ 'basic' ] = new Components\Card();
        $cards[ 'basic' ]->createImage( PATH_THEME . 'assets/img/ui/white-stone-harbor.jpg', 'White Stone Harbor' );
        $cards[ 'basic' ]->header->textContent->push( 'Card Header Title' );

        $body = $cards[ 'basic' ]->createBody();
        $body->setTitle( 'White Stone Harbour' );
        $body->setSubTitle( 'Karimun Java' );
        $body->setParagraph( 'The freedom memorial of someone that i love anchored!' );
        $body->createLink( 'Card link', '#' );
        $body->createLink( 'Another card link', '#' );

        $cards[ 'basic' ]->footer->textContent->push( '2 days ago' );

        $cards[ 'with-overlay' ] = new Components\Card();
        $image = $cards[ 'with-overlay' ]->createImage( PATH_THEME . 'assets/img/ui/karimun-java-monument.jpg',
            'Karimun Java Monument' );
        $overlay = $image->createOverlay();
        $overlay->setTitle( 'Karimun Java Monument' );
        $overlay->createParagraph( 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.' );

        $cards[ 'with-heading' ] = new Components\Card();
        $cards[ 'with-heading' ]->header->tagName = 'h3';
        $cards[ 'with-heading' ]->header->textContent->push( 'Custom Header' );

        $body = $cards[ 'with-heading' ]->createBody();
        $body->setParagraph( 'Some quick example text to build on the card title and make up the bulk of the card\'s content.' );

        $cards[ 'with-navigation' ] = new Components\Card();
        $headerNav = $cards[ 'with-navigation' ]->header->createNav();
        $headerNav->createLink( 'Action', current_url() );
        $headerNav->createLink( 'Link', '#' );
        $headerNav->createList( ( new Components\Card\Header\Nav\Link( 'Disabled', '#' ) )->disabled() );

        $body = $cards[ 'with-navigation' ]->createBody();
        $body->setParagraph( 'Some quick example text to build on the card title and make up the bulk of the card\'s content.' );

        $cards[ 'with-list-group' ] = new Components\Card();
        $cards[ 'with-list-group' ]->createImage( PATH_THEME . 'assets/img/ui/stone-mask-hut.jpg', 'Stone Mask Hut' );

        $body = $cards[ 'with-list-group' ]->createBody();
        $body->setTitle( 'Stone Mask Hut' );
        $body->setSubTitle( 'Karimun Java' );
        $body->setParagraph( 'The hut where the longing for a freedom from someone i love is laid off.' );

        $list = $cards[ 'with-list-group' ]->createListGroup();
        $list->createList( 'Everything is beautiful' );
        $list->createList( 'In His Time' );
        $list->createList( 'I\'ll set you free' );

        $body = $cards[ 'with-list-group' ]->createBody();
        $body->createLink( 'Card link', '#' );
        $body->createLink( 'Another card link', '#' );

        $cards[ 'group' ] = new Components\Card\Group();
        foreach ( range( 1, 3 ) as $number ) {
            $card = $cards[ 'group' ]->createCard();
            $card->createImage( PATH_THEME . 'assets/img/ui/landscape' . $number . '.jpg', 'Card image ' . $number );
            $card->header->textContent->push( 'Featured ' . $number );

            $body = $card->createBody();
            $body->setTitle( 'Card Title ' . $number );
            $body->setSubTitle( 'Card Sub-Title ' . $number );
            $body->setParagraph( 'Some quick example text to build on the card title and make up the bulk of the card\'s content for card ' . $number . '.' );
            $body->createLink( 'Card link', '#' );
            $body->createLink( 'Another card link', '#' );
            $card->footer->textContent->push( $number . ' days ago' );
        }

        $cards[ 'deck' ] = new Components\Card\Deck();
        foreach ( range( 1, 3 ) as $number ) {
            $card = $cards[ 'deck' ]->createCard();
            $card->createImage( PATH_THEME . 'assets/img/ui/landscape' . $number . '.jpg', 'Card image ' . $number );
            $card->header->textContent->push( 'Featured ' . $number );

            $body = $card->createBody();
            $body->setTitle( 'Card Title ' . $number );
            $body->setSubTitle( 'Card Sub-Title ' . $number );
            $body->setParagraph( 'Some quick example text to build on the card title and make up the bulk of the card\'s content for card ' . $number . '.' );
            $body->createLink( 'Card link', '#' );
            $body->createLink( 'Another card link', '#' );

            $card->footer->textContent->push( $number . ' days ago' );
        }

        $cards[ 'columns' ] = new Components\Card\Columns();
        foreach ( range( 1, 3 ) as $number ) {
            $card = $cards[ 'columns' ]->createCard();
            $card->createImage( PATH_THEME . 'assets/img/ui/landscape' . $number . '.jpg', 'Card image ' . $number );

            $body = $card->createBody();
            $body->setTitle( 'Card Title ' . $number );
            $body->setSubTitle( 'Card Sub-Title ' . $number );
            $body->setParagraph( 'Some quick example text to build on the card title and make up the bulk of the card\'s content for card ' . $number . '.' );
            $body->createLink( 'Card link', '#' );
            $body->createLink( 'Another card link', '#' );

            $card->footer->textContent->push( $number . ' days ago' );
        }

        foreach ( range( 2, 4 ) as $number ) {
            $card = $cards[ 'columns' ]->createCard();
            $card->header->textContent->push( 'Featured ' . $number );

            $body = $card->createBody();
            $body->setTitle( 'Card Title ' . $number );
            $body->setSubTitle( 'Card Sub-Title ' . $number );
            $body->setParagraph( 'Some quick example text to build on the card title and make up the bulk of the card\'s content for card ' . $number . '.' );
            $body->createLink( 'Card link', '#' );
            $body->createLink( 'Another card link', '#' );

            $card->footer->textContent->push( $number . ' days ago' );
        }

        $card = $cards[ 'columns' ]->createCard();
        $body = $card->createBody();

        $bodyquote = $body->createBlockquote( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.' );
        $bodyquote->setAuthor( 'Some Person' )->setSource( 'From Source' );

        $card = $cards[ 'columns' ]->createCard( Components\Card::PRIMARY_CONTEXT, true );
        $body = $card->createBody();
        $bodyquote = $body->createBlockquote( 'New Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.' );
        $bodyquote->setAuthor( 'Some Person', '#' )->setSource( 'From Source', '#' );

        $cards[ 'customs' ] = new Components\Card\Columns();

        // Card with badge
        $card = $cards[ 'customs' ]->createCard();
        $card->createImage( PATH_THEME . 'assets/img/ui/landscape1.jpg', 'Card custom with badges' );

        $card->createBadge( 'Left' );
        $card->createBadge( 'Right', Components\Card\Badge::SUCCESS_CONTEXT, Components\Card\Badge::RIGHT_BADGE );

        $body = $card->createBody();
        $body->setTitle( 'Card with Badges' );
        $body->setSubTitle( 'Card badges on left and right' );
        $body->setParagraph( 'Some quick example text to build on the card title and make up the bulk of the card\'s content for card ' . $number . '.' );
        $body->createLink( 'Card link', '#' );
        $body->createLink( 'Another card link', '#' );

        // Card with badge
        $card = $cards[ 'customs' ]->createCard();
        $card->createImage( PATH_THEME . 'assets/img/ui/landscape2.jpg', 'Card custom with ribbons' );

        $card->createRibbon( 'Left' );
        $card->createRibbon( 'Right', Components\Card\Ribbon::SUCCESS_CONTEXT, Components\Card\Ribbon::RIGHT_RIBBON );

        $body = $card->createBody();
        $body->setTitle( 'Card with Ribbons' );
        $body->setSubTitle( 'Card ribbons on left and right' );
        $body->setParagraph( 'Some quick example text to build on the card title and make up the bulk of the card\'s content for card ' . $number . '.' );
        $body->createLink( 'Card link', '#' );
        $body->createLink( 'Another card link', '#' );

        // Card with Testimonial
        $card = $cards[ 'customs' ]->createCard();
        $body = $card->createBody();
        $body->createTestimonial('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.');

        $author = $body->createAuthor();
        $author->setPhoto( PATH_THEME . 'assets/img/ui/zha-avatar.jpg' );
        $author->setPerson('Zha Lim', 'http://facebook.com/differentce');
        $author->setJobTitle('Public Relation');
        $author->setCompany('O2System Framework', 'http://o2system.id');

        // Card with Product
        $card = $cards[ 'customs' ]->createCard();
        $card->createImage( PATH_THEME . 'assets/img/ui/landscape2.jpg', 'Card custom with product' );

        $body = $card->createBody();
        $body->setTitle('Card with Product');
        $body->setSubTitle('Create a card for product');
        $body->setParagraph( 'Some quick example text to build on the card title and make up the bulk of the card\'s content for card' );

        //$product = $card->createProduct();
        //$product->setName('Product Card');
        //$product->setDescription('Some quick example text to build on the product card');
        //$product->setPrice(100000, 'IDR');
        //$product->setDiscount('10000', 'IDR');

        // Card with Carousel
        $card = $cards[ 'customs' ]->createCard();

        $carousel = $card->createCarousel();
        foreach ( range( 1, 3 ) as $number ) {
            $slide = $carousel->slides->createSlide();

            if ( $number == 1 ) {
                $slide->active();
            }

            $slide->createImage( PATH_THEME . 'assets/img/ui/landscape' . $number . '.jpg',
                'Landscape Photography ' . $number );
        }

        $body = $card->createBody();
        $body->setTitle('Card with Carousel');
        $body->setSubTitle( 'Create a card with multiple image carousel');
        $body->setParagraph( 'Some quick example text to build on the card title and make up the bulk of the card\'s content for card' );

        /**
         * Carousel
         */
        $carousel = new Components\Carousel();

        foreach ( range( 1, 3 ) as $number ) {
            $slide = $carousel->slides->createSlide();

            if ( $number == 1 ) {
                $slide->active();
            }

            $slide->createImage( PATH_THEME . 'assets/img/ui/landscape' . $number . '.jpg',
                'Landscape Photography ' . $number );
        }

        /**
         * Dropdowns
         */
        $dropdowns[ 'basic' ] = new Components\Dropdown( 'Dropdown' );
        $dropdowns[ 'basic' ]->menu->createHeader( 'Dropdown Header' );
        $dropdowns[ 'basic' ]->menu->createItem( 'Action', '#' );
        $dropdowns[ 'basic' ]->menu->createItem( 'Another Action', '#' );
        $dropdowns[ 'basic' ]->menu->createDivider();
        $dropdowns[ 'basic' ]->menu->createItem( 'Separated Link', '#' );

        $dropdowns[ 'split-menu' ] = new Components\Dropdown( 'Dropdown' );
        $dropdowns[ 'split-menu' ]->splitMenu();
        $dropdowns[ 'split-menu' ]->menu->createHeader( 'Dropdown Header' );
        $dropdowns[ 'split-menu' ]->menu->createItem( 'Action', '#' );
        $dropdowns[ 'split-menu' ]->menu->createItem( 'Another Action', '#' );
        $dropdowns[ 'split-menu' ]->menu->createDivider();
        $dropdowns[ 'split-menu' ]->menu->createItem( 'Separated Link', '#' );

        /**
         * Forms
         */
        $forms[ 'inputs' ] = new Components\Form();

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Text' );
        $group->createInput( [
            'type'        => 'text',
            'name'        => 'text',
            'placeholder' => 'text',
        ] );

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Search' );
        $group->createInput( [
            'type'        => 'search',
            'name'        => 'search',
            'placeholder' => 'search here',
        ] );

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Email Address' );
        $group->createInput( [
            'type'        => 'email',
            'name'        => 'email',
            'placeholder' => 'email@domain.com',
        ] );

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Password' );
        $group->createInput( [
            'type'        => 'password',
            'name'        => 'password',
            'placeholder' => 'password',
        ] );

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Url' );
        $group->createInput( [
            'type'        => 'url',
            'name'        => 'url',
            'placeholder' => 'https://o2system.id',
        ] );

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Telephone' );
        $group->createInput( [
            'type'        => 'tel',
            'name'        => 'tel',
            'placeholder' => '1-(777)-777-777',
        ] );

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Number' );
        $group->createInput( [
            'type'        => 'number',
            'name'        => 'number',
            'placeholder' => '23',
        ] );

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Date and Time' );
        $group->createInput( [
            'type'  => 'datetime-local',
            'name'  => 'datetime-local',
            'value' => date( 'Y-m-d' ) . 'T' . date( 'H:m:s' ),
        ] );

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Date' );
        $group->createInput( [
            'type'  => 'date',
            'name'  => 'date',
            'value' => date( 'Y-m-d' ),
        ] );

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Month' );
        $group->createInput( [
            'type'  => 'month',
            'name'  => 'month',
            'value' => date( 'Y-m' ),
        ] );

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Week' );
        $group->createInput( [
            'type'  => 'week',
            'name'  => 'week',
            'value' => date( 'Y' ) . '-W' . date( 'W' ),
        ] );

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Time' );
        $group->createInput( [
            'type'  => 'time',
            'name'  => 'time',
            'value' => date( 'H:m:s' ),
        ] );

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Color' );
        $group->createInput( [
            'type'  => 'color',
            'name'  => 'color',
            'value' => '#f00000',
        ] );

        /**
         * http://www.hongkiat.com/blog/html5-form-input-type/
         */

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Range' );
        $group->createInput( [
            'type'  => 'range',
            'name'  => 'range',
            'value' => 10,
            'min'   => 0,
            'max'   => 100,
        ] );

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'File' );
        $group->createInput( [
            'type'  => 'file',
            'name'  => 'file',
            'value' => null,
        ] );

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Checkbox' );
        $group->createInput( [
            'type'  => 'checkbox',
            'name'  => 'checkbox',
            'value' => 1,
        ] );

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Radio' );
        $group->createInput( [
            'type'  => 'radio',
            'name'  => 'radio',
            'value' => 1,
        ] );

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Select' );
        $group->createSelect( [
            'Yes' => 'yes',
            'No'  => 'no',
        ], 'no', [
            'name' => 'select',
        ] );


        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Multiple Select' );
        $group->createSelect( [
            'Yes' => 'yes',
            'No'  => 'no',
        ], [ 'no' ], [
            'name' => 'select',
        ] )->multiple();

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Textarea' );
        $group->createTextarea( [
            'name' => 'textarea',
        ] );

        $group = $forms[ 'inputs' ]->createFormGroup();
        $group->createLabel( 'Input Group' );
        $inputGroup = $group->createInputGroup( [
            'name' => 'group-text',
        ] );
        $inputGroup->createAddon( '@', Components\Form\Input\Group\AddOn::ADDON_LEFT );

        /**
         * Jumbotron
         */
        $jumbotron[ 'basic' ] = new Components\Jumbotron();
        $jumbotron[ 'basic' ]->createHeader( 'Hello World!' );
        $jumbotron[ 'basic' ]->createParagraph( 'This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information',
            [ 'class' => 'lead' ] );
        $jumbotron[ 'basic' ]->createHorizontalRule();
        $jumbotron[ 'basic' ]->createParagraph( 'It uses utility classes for typography and spacing to space content out within the larger container.' );
        $jumbotron[ 'basic' ]->createParagraph()->createLink( 'Learn More', '#' );

        $jumbotron[ 'image' ] = new Components\Jumbotron();
        $jumbotron[ 'image' ]->setImageBackground( PATH_THEME . 'assets/img/bg-galaxy.jpg' );
        $jumbotron[ 'image' ]->createHeader( 'Hello World!' );
        $jumbotron[ 'image' ]->createParagraph( 'This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information',
            [ 'class' => 'lead' ] );
        $jumbotron[ 'image' ]->createHorizontalRule();
        $jumbotron[ 'image' ]->createParagraph( 'It uses utility classes for typography and spacing to space content out within the larger container.' );
        $jumbotron[ 'image' ]->createParagraph()->createLink( 'Learn More', '#' );

        $jumbotron[ 'video' ] = new Components\Jumbotron();
        $jumbotron[ 'video' ]->setVideoBackground( PATH_THEME . 'assets/media/explore.webm' );
        $jumbotron[ 'video' ]->createHeader( 'Hello World!' );
        $jumbotron[ 'video' ]->createParagraph( 'This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information',
            [ 'class' => 'lead' ] );
        $jumbotron[ 'video' ]->createHorizontalRule();
        $jumbotron[ 'video' ]->createParagraph( 'It uses utility classes for typography and spacing to space content out within the larger container.' );
        $jumbotron[ 'video' ]->createParagraph()->createLink( 'Learn More', '#' );

        $jumbotron[ 'carousel' ] = new Components\Jumbotron();
        $jumbotron[ 'carousel' ]->setCarousel( $carousel );
        $jumbotron[ 'carousel' ]->createHeader( 'Hello World!' );
        $jumbotron[ 'carousel' ]->createParagraph( 'This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information',
            [ 'class' => 'lead' ] );
        $jumbotron[ 'carousel' ]->createHorizontalRule();
        $jumbotron[ 'carousel' ]->createParagraph( 'It uses utility classes for typography and spacing to space content out within the larger container.' );
        $jumbotron[ 'carousel' ]->createParagraph()->createLink( 'Learn More', '#' );

        /**
         * List  Group
         */
        $listGroup = new Components\ListGroup();
        $listGroup->createList( 'This is an active item example' )->active();
        $listGroup->createList( 'This is a disabled item example' )->disabled();
        $listGroup->createList( 'This is example item with badge' )->childNodes->push( new Components\Badge( 2 ) );
        $listGroup->createList( 'This is an item example with success contextual class' )->contextSuccess();

        /**
         * Modal
         */
        $modal = new Components\Modal();
        $modal->attributes->setAttributeId( 'example-modal' );
        $modal->dialog->content->header->setTitle( 'Modal title' );
        $modal->dialog->content->body->createParagraph( 'Modal body content' );
        $modal->dialog->content->footer->createButton( 'Close' )->attributes->addAttribute( 'data-dismiss', 'modal' );

        /**
         * Navs
         */
        $navs[ 'base' ] = new Components\Navs\Base();
        $navs[ 'base' ]->createLink( 'Active', current_url() );
        $navs[ 'base' ]->createLink( 'Link', '#' );
        $navs[ 'base' ]->createLink( 'Disabled', '#' )->disabled();

        $navs[ 'pills' ] = new Components\Navs\Pills();
        $navs[ 'pills' ]->createLink( 'Active', current_url() );
        $navs[ 'pills' ]->createLink( 'Link', '#' );
        $navs[ 'pills' ]->createLink( 'Disabled', '#' )->disabled();

        $navs[ 'bullets' ] = new Components\Navs\Bullets();
        $navs[ 'bullets' ]->createBullet( 'fa fa-home', current_url() );
        $navs[ 'bullets' ]->createBullet( 'fa fa-dashboard', '#' );
        $navs[ 'bullets' ]->createBullet( 'fa fa-suitcase', '#' );

        $navs[ 'tabs' ] = new Components\Navs\Tabs();
        $navs[ 'tabs' ]->createLink( 'Active', current_url() );
        $navs[ 'tabs' ]->createLink( 'Link', '#' );
        $navs[ 'tabs' ]->createLink( 'Disabled', '#' )->disabled();

        $navbar = new Components\Navbar();
        $navbar->createBrand( 'Navbar' );

        $navbar->nav->createLink( 'Active', current_url() );
        $navbar->nav->createLink( 'Link', '#' );
        $navbar->nav->createLink( 'Disabled', '#' )->disabled();
        $navbar->nav->createList( $dropdowns[ 'basic' ] );

        $navbarForm = $navbar->createForm();
        $navbarForm->createInput( [
            'name'        => 'search',
            'type'        => 'search',
            'placeholder' => 'search',
        ] );
        $navbarForm->createButton( 'Search', [
            'type' => 'submit',
        ] );

        /**
         * Pagination
         */
        $pagination = new Components\Pagination( 25 );

        /**
         * Progress
         */
        $progress[ 'basic' ] = new Components\Progress( 2 );

        $progress[ 'multiple' ] = new Components\Progress( 35, 0, 100 );
        $progress[ 'multiple' ]->addBar( ( new Components\Progress\Bar( 20, 0, 100,
            Components\Progress\Bar::WARNING_CONTEXT ) )->striped()->animate() );
        $progress[ 'multiple' ]->addBar( 10, 0, 100, Components\Progress\Bar::DANGER_CONTEXT );

        /**
         * Table
         */
        $table = new Contents\Table();
        $table->header->createRow()->createColumns( [
            'First Name',
            'Last Name',
            'Email',
        ], 'th' );

        $table->body->createRow()->createColumns( [
            'John',
            'Doe',
            'john.doe@gmail.com',
        ] );

        $table->body->createRow()->createColumns( [
            'Jane',
            'Doe',
            'jane.doe@gmail.com',
        ] );

        /**
         * Embed
         */
        $embed = new Components\Embed();
        $embed->setMedia( 'https://youtu.be/JGwWNGJdvx8' );

        /**
         * Media
         */
        $media = new Components\Media();

        $media->createObject()
            ->setImage( 'holder.js/64x64' )
            ->setHeading( 'Nested media' )
            ->setParagraph( 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.' )
            ->createNestedObject()
            ->setImage( 'holder.js/64x64' )
            ->setHeading( 'Child Nested media' )
            ->setParagraph( 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.' )
            ->createNestedObject()
            ->setImage( 'holder.js/64x64' )
            ->setHeading( 'Sub Child Nested media' )
            ->setParagraph( 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.' );

        $media->createObject()
            ->setImage( 'holder.js/64x64' )
            ->setHeading( 'Top aligned media' )
            ->setParagraph( 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.' );

        $media->createObject()
            ->alignMiddle()
            ->setImage( 'holder.js/64x64' )
            ->setHeading( 'Middle aligned media' )
            ->setParagraph( 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.' );

        $media->createObject()
            ->alignBottom()
            ->setImage( 'holder.js/64x64' )
            ->setHeading( 'Bottom aligned media' )
            ->setParagraph( 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.' );

        $image = new Contents\Image();
        $image->setSrc( PATH_THEME . 'assets/img/ui/zha-avatar.jpg' );
        $image->setWidth( 200 );

        view(
            'ui',
            [
                'alerts'     => $alerts,
                'accordion'  => $accordion,
                'badges'     => $badges,
                'buttons'    => $buttons,
                'breadcrumb' => $breadcrumb,
                'cards'      => $cards,
                'carousel'   => $carousel,
                'dropdowns'  => $dropdowns,
                'forms'      => $forms,
                'jumbotron'  => $jumbotron,
                'listGroup'  => $listGroup,
                'labels'     => $badges,
                'modal'      => $modal,
                'navs'       => $navs,
                'navbar'     => $navbar,
                'pagination' => $pagination,
                'progress'   => $progress,
                'table'      => $table,
                'embed'      => $embed,
                'media'      => $media,
                'image'      => $image,
            ]
        );
    }
}