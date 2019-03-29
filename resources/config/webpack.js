/**
 * This file is part of the O2System Venus UI Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian Salim
 * @copyright      Copyright (c) Steeve Andrian Salim
 */
// ------------------------------------------------------------------------

const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");

let config = {
	mode: "development",
	output: {
		filename: "[name].js",
		path: path.resolve(__dirname, "../../public/assets"),
		publicPath: "/"
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				use: [
					{
						loader: "babel-loader",
						options: {
							cacheDirectory: true,
							presets: [
								[
									"@babel/preset-env",
									{
										modules: false,
										forceAllTransforms: true
									}
								]
							],
							plugins: [
								"@babel/plugin-proposal-object-rest-spread",
								[
									"@babel/plugin-transform-runtime",
									{
										helpers: false
									}
								]
							]
						}
					}
				],
				exclude: /(node_modules|bower_components)/
			},
			{
				test: /\.(sa|sc|c)ss$/,
				use: [
					MiniCssExtractPlugin.loader,
					{ loader: 'css-loader', options: { importLoaders: 1 } },
					/*{
						loader: 'postcss-loader',
						options: {
							ident: 'postcss',
							syntax: 'postcss-scss',
							map: {
								'inline': true,
							},
							plugins: (loader) => [
								require('postcss-import')({ root: loader.resourcePath }),
								require('postcss-preset-env')(),
								require('autoprefixer')({
									'browsers': ['last 15 versions']
								}),
							]
						}
					},*/
					'sass-loader',
				]
			},
			{
				test: /\.(jpg|jpeg|gif|png|webpm|svg)$/,
				use: [
					{
						loader: "file-loader",
						options: {
							name: "../assets/img/[name].[ext]"
						}
					}
				]
			},
			{
				test: /.(woff|woff2|ttf|eot)$/,
				use: [
					{
						loader: "file-loader",
						options: {
							name: "../assets/fonts/[name].[ext]"
						}
					}
				]
			}
		],
	},
	plugins: [
		new MiniCssExtractPlugin({
			// Options similar to the same options in webpackOptions.output
			// both options are optional
			filename: "[name].css",
			chunkFilename: "[id].css"
		})
	],
};

if (typeof process.env.npm_config_mode !== "undefined") {
	config.mode = process.env.npm_config_mode;
}

if (config.mode == "development") {
	// Set Development Server
	config.devServer = {
		hot: false,
		open: false,
		historyApiFallback: true,
		contentBase: "dist",
		overlay: true,
		stats: {
			colors: true
		}
	};

	// Set Development Tools
	config.devtool = "sourcemap";
} else {
	config.optimization = {
		minimize: true,
		minimizer: [
			new TerserPlugin({
				terserOptions: {
					output: {
						comments: false,
					},
				},
			}),
			new OptimizeCSSAssetsPlugin({
				assetNameRegExp: /\.min\.css$/g,
				cssProcessor: require("cssnano"),
				cssProcessorPluginOptions: {
					preset: ["default", { discardComments: { removeAll: true } }],
				},
				canPrint: true
			})
		]
	}
}

// Set Entry
if (typeof process.env.npm_config_theme !== "undefined") {
	if (typeof process.env.npm_config_app !== "undefined") {
		config.entry = {
			"theme": "./resources/" + process.env.npm_config_app + "/themes/" + process.env.npm_config_theme + "/theme.js",
			"theme.min": "./resources/" + process.env.npm_config_app + "/themes/" + process.env.npm_config_theme + "/theme.js"
		};

		config.output = {
			filename: "[name].js",
			path: path.resolve(__dirname, "../../public/" + process.env.npm_config_app + "/themes/" + process.env.npm_config_theme),
			publicPath: "/"
		};
	} else {
		config.entry = {
			"theme": "./resources/themes/" + process.env.npm_config_theme + "/theme.js",
			"theme.min": "./resources/themes/" + process.env.npm_config_theme + "/theme.js"
		};

		config.output = {
			filename: "[name].js",
			path: path.resolve(__dirname, "../../public/themes/" + process.env.npm_config_theme),
			publicPath: "/"
		};
	}
} else if (typeof process.env.npm_config_module !== "undefined") {
	config.entry = {
		"module": "./resources/modules/" + process.env.npm_config_module + "/module.js",
		"module.min": "./resources/modules/" + process.env.npm_config_module + "/module.js"
	};

	config.output = {
		filename: "[name].js",
		path: path.resolve(__dirname, "../../public/modules/" + process.env.npm_config_module),
		publicPath: "/"
	};
} else {
	config.entry = {
		"app": "./resources/app.js",
		"app.min": "./resources/app.js"
	};
}

module.exports = config;