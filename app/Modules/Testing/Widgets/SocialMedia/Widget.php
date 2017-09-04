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

namespace Testing\Widgets\Socialmedia;

// ------------------------------------------------------------------------

/**
 * Class Widget
 *
 * @package Testing\Widgets\SocialMedia
 */
class Widget extends \O2System\Framework\Http\Presenter\Widget
{
    public function __construct()
    {
        $this->store('facebook', 'facebook.com');
    }
}