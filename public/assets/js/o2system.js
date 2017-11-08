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
 * O2System Javascript Framework
 */
var o2system = new Object();

(function ($) {
    // Extends jQuery Object
    $.system = o2system;

    // ------------------------------------------------------------------------

    /**
     * URI Object
     */
    o2system.uri = {
        string: null,
        segments: null,

        getString: function () {
            return this.string;
        },

        getSegments: function () {
            return this.segments;
        },

        getSegment: function (n) {
            if (this.segments.hasOwnProperty(n - 1)) {
                return this.segments[n - 1];
            }

            return null;
        }
    };

    // ------------------------------------------------------------------------

    /**
     * URL Helpers Object
     */
    o2system.url = {
        base: function (uri) {
            if (uri == undefined) {
                return window.location.protocol + '//' + window.location.hostname + '/';
            }
            return window.location.protocol + '//' + window.location.hostname + '/' + uri;
        },
        current: function () {
            return window.location.protocol + '//' + window.location.hostname + window.location.pathname;
        }
    };

    // ------------------------------------------------------------------------

    /**
     * Server Object
     */
    o2system.server = {
        queryString: null,
        queryParams: null,
        getQueryString: function () {
            return this.queryString;
        },
        getQueryParams: function () {
            return this.queryParams
        }
    };

    // ------------------------------------------------------------------------

    /**
     * Input Object
     */
    o2system.input = {
        getParams: [],
        get: function (index) {
            if (index == undefined) {
                return this.getParams;
            } else if (this.getParams.hasOwnProperty(index)) {
                return this.getParams[index];
            }

            return false;
        },
        hash: function () {
            return window.location.hash;
        },
        buildQuery: function (queryParams) {
            if (queryParams == undefined) {
                queryParams = this.getParams;
            }

            var queryString = '?';
            $.each(queryObject, function (key, value) {
                if (value !== 'undefined' && value !== '' && key !== '') {
                    queryString = queryString + key + '=' + value + '&';
                }
            });

            return queryString.substring(0, (queryString.length - 1));
        }
    };

    // ------------------------------------------------------------------------

    /**
     * Validate Object
     */
    o2system.validate = {
        url: function (string) {
            var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
            return regexp.test(string);
        },
        domain: function (string) {
            var regexp = /^((?:(?:(?:\w[\.\-\+]?)*)\w)+)((?:(?:(?:\w[\.\-\+]?){0,62})\w)+)\.(\w{2,6})$/;
            return regexp.test(string);
        },
        alphaNumeric: function (string) {
            var regexp = /^([a-zA-Z0-9-]+)$/;
            return regexp.test(string);
        },
        empty: function (string) {
            if (string.trim()) {
                return true;
            }
            return false;
        }
    };

    // ------------------------------------------------------------------------

    /**
     * O2System Sanitize Helper
     */
    o2system.sanitize = function (string) {
        var tagBody = '(?:[^"\'>]|"[^"]*"|\'[^\']*\')*';

        var tagOrComment = new RegExp(
            '<(?:'
            // Comment body.
            + '!--(?:(?:-*[^->])*--+|-?)'
            // Special "raw text" elements whose content should be elided.
            + '|script\\b' + tagBody + '>[\\s\\S]*?</script\\s*'
            + '|style\\b' + tagBody + '>[\\s\\S]*?</style\\s*'
            // Regular name
            + '|/?[a-z]'
            + tagBody
            + ')>',
            'gi');

        var oldString;
        do {
            oldString = string;
            string = string.replace(tagOrComment, '');
        } while (string !== oldString);
        return string.replace(/</g, '&lt;');
    };

    // ------------------------------------------------------------------------

    /**
     * O2System Window Helpers Object
     */
    o2system.window = {
        open : function (url, title, width, height) {
            // Fixes dual-screen position Most browsers Firefox
            var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
            var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

            screenWidth = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
            screenHeight = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

            var left = ((screenWidth / 2) - (width / 2)) + dualScreenLeft;
            var top = ((screenHeight / 2) - (height / 2)) + dualScreenTop;
            var newWindow = window.open(url, title, 'toolbar=no, menubar=no, resizable=no, copyhistory=no, location=no, directories=no, status=no, addressbar=0, scrollbars=no, width=' + width + ', height=' + height + ', top=' + top + ', left=' + left);

            // Puts focus on the newWindow
            if (window.focus) {
                newWindow.focus();
            }
        }
    };

    // ------------------------------------------------------------------------

    /**
     * O2System Format Helpers Object
     */
    o2system.format = {
        number : function (number) {
            return ("" + number).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, function ($1) {
                return $1 + "."
            });
        }
    };

    // ------------------------------------------------------------------------

    /**
     * O2System Cache Object
     */
    o2system.cache = localStorage;

    // ------------------------------------------------------------------------

    /**
     * O2System Session Object
     */
    o2system.session = sessionStorage;

    // ------------------------------------------------------------------------

    /**
     * O2System Constructor
     * @private
     */
    o2system.__construct = function () {
        o2system.uri.string = window.location.pathname.substr(1);
        o2system.uri.segments = o2system.uri.string.split('/');

        o2system.server.queryString = window.location.search.substring(1);
        o2system.server.queryParams = o2system.server.queryString.split('&');

        if (o2system.server.queryParams.length > 0) {
            for (var i = 0; i < o2system.server.queryParams.length; i++) {
                var xParams = o2system.server.queryParams[i].split('=');
                o2system.input.getParams[xParams[0]] = xParams[1];

                // unset xParams
                delete xParams;
            }
        }
    };

    // ------------------------------------------------------------------------

    o2system.__construct();

}(jQuery));
