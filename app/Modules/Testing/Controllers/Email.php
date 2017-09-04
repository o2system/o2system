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

use O2System\Email as Mail;
use O2System\Framework\Http\Controller;

/**
 * Class Email
 *
 * @package Testing\Controllers
 */
class Email extends Controller
{
    public function index()
    {
        $message = new Mail\Message();
        $message->contentType( 'html' );
        $message->from( 'steevenz@ymail.com', 'Me' );
        $message->subject( 'Testing email protocol encoding with attachment' );
        $message->body( 'Testing mail body' );
        $message->to( 'steeven.lim@gmail.com', 'Steeven Lim' );
        $message->priority( Mail\Message::PRIORITY_HIGHEST );

        $message->addAttachment( new Mail\Attachment( PATH_STORAGE . 'images/ferrari.jpg' ) );

        // Send with mail
        $spool = new Mail\Spool( new Mail\Datastructures\Config( [ 'protocol' => 'mail' ] ) );

        // Send with sendmail
        //$spool = new Mail\Spool(new Mail\Datastructures\Config(['protocol' => 'sendmail']));

        // Send with smtp
        /*$spool = new Mail\Spool(new Mail\Datastructures\Config([
            'protocol' => 'smtp',
            'host' => 'ssl://smtp.googlemail.com',
            'port' => 465,
            'username' => 'username',
            'password' => 'password',
        ]));*/

        $result = $spool->send( $message );

        print_out( $result );
    }
}