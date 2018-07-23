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
        scheme: null,
        host: null,
        port: 80,
        path: null,
        query: null,
        string: null,
        segments: null,
        subDomain: null,
        subDomains: [],
        tld: null,
        tlds: [],

        getScheme: function(){
            return this.scheme;
        },

        getHost: function(){
            return this.host;
        },

        getHostname: function () {
            return window.location.hostname;
        },

        getPort: function () {
            return this.port;
        },

        getPath: function () {
            return this.path;
        },

        getQuery: function () {
            return this.query;
        },

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
        },

        getSubDomain: function () {
            return this.subDomain;
        },

        getSubDomains: function (level) {
            if (this.subDomains.hasOwnProperty(level)) {
                return this.subDomains[level];
            }
        },

        getTld: function () {
            return this.tld;
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
        },

        ipv4: function (uri) {
            var regexp = new RegExp([
                '^https?:\/\/([a-z0-9\\.\\-_%]+:([a-z0-9\\.\\-_%])+?@)?',
                '((25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])\\.){3}(25[0-5]|2[0-4',
                '][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])?',
                '(:[0-9]+)?(\/[^\\s]*)?$'
            ].join(''), 'i');

            if(uri == undefined) {
                uri = window.location.protocol + '//' + window.location.hostname + '/';
            }

            return regexp.test(uri);
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
        // Define Uri Scheme
        o2system.uri.scheme = window.location.protocol;

        // Define Uri Host
        o2system.uri.host = window.location.hostname;
        o2system.uri.host = o2system.uri.host.replace('www.','');

        // Define Uri Port
        o2system.uri.port = window.location.port;
        if(o2system.uri.port == '') {
            if(o2system.uri.scheme === 'http:') {
                o2system.uri.port = 80;
            } else if(o2system.uri.scheme === 'https:') {
                o2system.uri.port = 443;
            }
        }

        // Define Uri Tld
        var xHost = [];
        if(o2system.url.ipv4() !== false || o2system.uri.host.indexOf('.') === false) {
            xHost = [ o2system.uri.host ];
        } else {
            xHost = o2system.uri.host.split('.');
        }

        if(xHost.length > 1) {
            o2system.uri.subDomains = xHost;
            o2system.uri.subDomain = xHost[0];

            xHost.forEach(function (hostname, key) {
                if(key == (xHost.length - 1) && hostname.length <= 3) {
                    o2system.uri.subDomains.splice(key, 1);
                    o2system.uri.tlds.push(hostname);
                } else if(key == (xHost.length - 2) && hostname.length <= 3) {
                    o2system.uri.subDomains.splice(key, 1);
                    o2system.uri.tlds.push(hostname);
                }
            });

            if(o2system.uri.subDomains.length > 1) {
                o2system.uri.subDomains.splice(-1, 1);
            }

            o2system.uri.tld = '.' + o2system.uri.tlds.join('.');
            o2system.uri.host = o2system.uri.host.replace(o2system.uri.subDomain + '.','');
        }

        // Define Uri Path
        o2system.uri.path = window.location.pathname;

        // Define Uri Query
        o2system.uri.query = window.location.search.substring(1);

        // Define Uri String and Segments
        o2system.uri.string = window.location.pathname.substr(1);

        var segmentsSuffixes = ['.html', '.phtml', '.php', '.htm'];
        segmentsSuffixes.forEach(function(suffix, key){
            o2system.uri.string = o2system.uri.string.replace(suffix, '');
        });

        o2system.uri.segments = o2system.uri.string.split('/');

        // Define Server Query String and Params
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

        if ('serviceWorker' in navigator && 'PushManager' in window) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register(o2system.url.base() + 'assets/js/service-worker.js').then(function(registration) {
                    // Registration was successful
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, function(error) {
                    // registration failed :(
                    console.log('ServiceWorker registration failed: ', error);
                });
            });
        }
    };

    // ------------------------------------------------------------------------

    o2system.__construct();

}(jQuery));
