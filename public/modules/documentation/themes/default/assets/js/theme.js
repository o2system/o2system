
(function($){
    $(document).ready(function() {
        /*Mobile menu*/
        $('.mobile-header .button-open-menu').on('click touchend', function(e) {
            e.preventDefault();
            var $self = $(this);
            var $section = $self.parent();
            $section.addClass('open').find('.responsive-mask').addClass('active').animate({'opacity' : 'toggle'}, 500);
            $section.siblings('#documentation-sidebar').addClass('open').animate({'width':'show'}, 300);
        });
        $('.mobile-header .responsive-mask').on('click touchend', function(e) {
            e.preventDefault();
            var $self = $(this);
            var $section = $self.parent();
            $section.removeClass('open').find('.responsive-mask').removeClass('active').animate({'opacity' : 'toggle'}, 500);
            $section.siblings('#documentation-sidebar').removeClass('open').animate({'width':'hide'}, 300);
        });

        // make code pretty
        window.prettyPrint && prettyPrint();

    });

    (function () {
        var pre = document.getElementsByTagName('pre'),
            preLen = pre.length;
        for (var i = 0; i < preLen; i++) {
            pre[i].innerHTML = '<span class="line-number"></span>' + pre[i].innerHTML + '<span class="clear-both"></span>';
            var linesNum = pre[i].innerHTML.split(/\n/).length;
            for (var number = 0; number < linesNum; number++) {
                var lineNumber = pre[i].getElementsByTagName('span')[0];
                lineNumber.innerHTML += '<span>' + (number + 1) + '</span>';
            }
        }
    })();

    function gearGetSelectionText() {
        var selectedText = ""
        if (window.getSelection) { // all modern browsers and IE9+
            selectedText = window.getSelection().toString()
        }
        return selectedText;
    }

    function gearCopySelectionText() {
        var isCopied // var to check whether execCommand successfully executed
        try {
            isCopied = document.execCommand("copy") // run command to copy selected text to clipboard
        } catch (e) {
            isCopied = false
        }
        return isCopied;
    }

    function gearSelectCode() {
        if (document.selection) {
            var range = document.body.createTextRange();
            range.moveToElementText(document.getElementById('gear-code-container'));
            range.select();
        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById('gear-code-container'));
            window.getSelection().addRange(range);
        }
    }

    function gearCopyCode() {
        var selected = gearGetSelectionText() // call gearGetSelectionText() to see what was selected
        if (selected.length > 0) { // if selected text length is greater than 0
            var isCopied = gearCopySelectionText() // copy user selected text to clipboard
            alert('Copied to clipboard');
        }
    }

    hljs.initHighlightingOnLoad();
})(jQuery);