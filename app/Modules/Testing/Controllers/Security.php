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
use O2System\Framework\Libraries\Ui\Components;
use O2System\Gear\UnitTesting;
use O2System\Security\Rules;

/**
 * Class Helpers
 *
 * @package Testing\Controllers
 */
class Security extends Controller
{
    public function __construct()
    {
        parent::__construct();

        presenter()->page->setHeader( 'Security' );
        presenter()->page->offsetSet('lead', 'Security Library Debugging and Testing');
        presenter()->page->offsetSet('author', implode(', ', [
            'Steeven Andrian  Salim'
        ]));
    }

    public function index()
    {
        $listGroup = new Components\Lists\Group();
        $listGroup->createList( new Components\Link( 'Security\\Protections\\Captcha', base_url( 'testing/security/captcha' ) ) );
        $listGroup->createList( new Components\Link( 'Security\\Encryptions', base_url( 'testing/security/encryptions' ) ) );
        $listGroup->createList( new Components\Link( 'Security\\Protections', base_url( 'testing/security/protections' ) ) );
        $listGroup->createList( new Components\Link( 'Security\\Filters', base_url( 'testing/security/filters' ) ) );
        $listGroup->createList( new Components\Link( 'Security\\Validation', base_url( 'testing/security/validation' ) ) );

        presenter()->page->offsetSet( 'lists', $listGroup );

        view( 'index' );
    }

    public function captcha()
    {
        $captcha = new \O2System\Security\Protections\Captcha;

        echo '<img src="' . $captcha->getImage() . '" />';
        exit( 0 );
    }

    public function encryptions()
    {
        $testing = new UnitTesting();

        $numeric = new \O2System\Security\Encryptions\Binary();
        $crypt = new \O2System\Security\Encryptions\Crypt();
        $password = new \O2System\Security\Encryptions\Password();
        $cookie = new \O2System\Security\Encryptions\Cookie();

        $testing->test( 'Binary', $numeric->decrypt( $numeric->encrypt( 'testing' ) ), 'testing' );
        $testing->test( 'Crypt', $crypt->decrypt( $crypt->encrypt( 'testing' ) ), 'testing' );
        $testing->test( 'Password', $password->verify( 'testing', $password->hash( 'testing' ) ), true );

        $cookie->encrypt( 'test_cookie', 'testing cookie value' );
        $testing->test( 'Cookie', $cookie->decrypt( 'test_cookie' ), 'testing cookie value' );

        view( 'report', [ 'reports' => $testing->getReports() ] );
    }

    public function protections()
    {
        $testing = new UnitTesting();

        $csrf = new \O2System\Security\Protections\Csrf();
        $xss = new \O2System\Security\Protections\Xss();

        $testing->test( 'CSRF', $csrf->verify( $csrf->getToken() ), true );
        $testing->test( 'XSS', $xss->verify( $xss->getToken() ), true );

        view( 'report', [ 'reports' => $testing->getReports() ] );
    }

    public function filters()
    {
        $utf8 = new \O2System\Security\Filters\Utf8;

        $result = $utf8->cleanString( 'κόσμεTest' );
        $result = $utf8->isAscii( '&#σ;' );
        $result = $utf8->safeAsciiForXML( 'κόσμεTest' );
        $result = $utf8->convertString( 'κόσμεTest', 'ISO-8859-16' );
    }

    public function validation()
    {
        /* Initialize data source */
        $data = [
            'username' => null,
            'password' => 'password',
        ];
        $rules = new Rules( $data );

        /* Add source */
        $rules->addSource( 'phone', '081234' );
        $rules->addSource( 'address', 'Lorem ipsum dolor sit.' );

        /* Add validation rule  */
        $rules->addRule(
            'username',
            'Username',
            'minLength[2]',
            [ 'minLength' => ':attribute Should Be More Than :params', 'required' => ':attribute Required' ]
        );
        $rules->addRule( 'password', 'Password', 'maxLength[2]', ':attribute should be less than :params' );

        /* Add multiple rules */
        $rules->addRules(
            [
                [
                    'field'    => 'phone',
                    'label'    => 'Phone',
                    'rules'    => 'required',
                    'messages' => 'Phone Required',
                ],
                [
                    'field'    => 'address',
                    'label'    => 'Address',
                    'rules'    => 'required',
                    'messages' => 'Address Required',
                ],
            ]
        );

        /* Validate rules */
        $validate = $rules->validate();

        print_out(
            [
                'validate' => ( $validate == true ? 1 : 0 ),
                'errors'   => $rules->getErrors(),
            ]
        );
    }
}
