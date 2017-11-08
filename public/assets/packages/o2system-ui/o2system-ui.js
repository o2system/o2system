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

/**
 * O2System User Interface (UI)
 */
$(function () {
    $('.preloader').fadeOut();

    // hide scroll to top
    $('.scroll-to-top').hide();

    // check window scroll
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });
    
    // click scroll to top
    $('.scroll-to-top').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
});

$('pre.line-numbers').each(function(i, pre){
    pre.innerHTML = '<span class="line-number"></span>' + pre.innerHTML + '<span class="clear-both"></span>';
    var lines = pre.innerHTML.split(/\n/);
    if( lines.length > 1 ) {
        $.each(lines, function(number){
            var lineNumber = pre.getElementsByTagName('span')[0];
            lineNumber.innerHTML += '<span>' + (number + 1) + '</span>';
        });
    }
});