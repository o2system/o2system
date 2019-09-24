/**
 * This file is part of the O2System Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian Salim
 * @copyright      Copyright (c) Steeve Andrian Salim
 */
// ------------------------------------------------------------------------

let blender = require('o2system-blender');
blender.js('./resources/app.js', 'assets')
    .sass('./resources/app.scss', 'assets').
    sourceMaps();

blender.setOutputPath('assets/');
blender.setResourceRoot('');

// Set Entry
if (typeof process.env.npm_config_theme !== "undefined") {
    if (typeof process.env.npm_config_app !== "undefined") {
        blender.js(
            './resources/' + process.env.npm_config_app + '/themes/' + process.env.npm_config_theme + '/theme.js',
            './public/' + process.env.npm_config_app + '/themes/' + process.env.npm_config_theme
        ).sass(
            './resources/' + process.env.npm_config_app + '/themes/' + process.env.npm_config_theme + '/theme.scss',
            './public/' + process.env.npm_config_app + '/themes/' + process.env.npm_config_theme
        );
    } else {
        blender.js(
            './resources/themes/' + process.env.npm_config_theme + '/theme.js',
            './public/themes/' + process.env.npm_config_theme
        ).sass(
            './resources/themes/' + process.env.npm_config_theme + '/theme.scss',
            './public/themes/' + process.env.npm_config_theme
        );
    }
}

if (typeof process.env.npm_config_module !== "undefined") {
    blender.js(
        './resources/modules/' + process.env.npm_config_module + '/module.js',
        './public/modules/' + process.env.npm_config_module
    ).sass(
        './resources/modules/' + process.env.npm_config_module + '/module.scss',
        './public/modules/' + process.env.npm_config_module
    );
}

//blender.version().browserSync(); // Hot reloading
