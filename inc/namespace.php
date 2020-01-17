<?php

namespace HM\Paradowski_Blocks;

/**
 * Bootstrap the plugin.
 */
function setup() {
	// Add block assets.
	add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\enqueue_editor_assets' );

	// Enqueue front end assets.
	add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_scripts' );

	// Register blocks.
	add_action( 'init', __NAMESPACE__ . '\\register_blocks' );
}

/**
 * Enqueue block scripts.
 */
function enqueue_editor_assets() {

	$js  = get_asset_data( 'assets/dist/main.js' );
	$css = get_asset_data( 'assets/dist/main.css' );

	$handle = 'paradowski-blocks';
	$deps   = [
		'wp-i18n',
		'wp-blocks',
		'wp-components',
		'wp-editor',
		'wp-plugins',
		'wp-edit-post',
	];

	$locale_data = wp_set_script_translations( 'paradowski-blocks' );

	wp_enqueue_script( $handle, $js['src'], $deps, $js['ver'], false );
	wp_add_inline_script( $handle, sprintf( 'wp.i18n.setLocaleData( %s, "paradowski-blocks" );', wp_json_encode( $locale_data ) ), 'before' );

	wp_enqueue_style( $handle, $css['src'], [], $css['ver'] );
}

/**
 * Returns an array of src and version for a given relative asset file path.
 *
 * @param string $path
 * @return array
 */
function get_asset_data( $path ) {
	$plugin_dir_path  = dirname( __FILE__, 2 );
	$plugin_file_path = "{$plugin_dir_path}/plugin.php";

	// Get built file URL.
	$src = plugins_url( $path, $plugin_file_path );
	$ver = filemtime( "{$plugin_dir_path}/{$path}" );

	// // Use webpack dev server if SCRIPT_DEBUG or speific debug constant is true.
	// if ( ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) || ( defined( 'HM_Paradowski_Blocks_DEBUG' ) && HM_Paradowski_Blocks_DEBUG ) ) {
	// 	$src  = str_replace( content_url(), 'https://localhost:8884', $src );
	// 	$ver    = null;
	// } else {
	// 	$ver = filemtime( "{$plugin_dir_path}/{$path}" );
	// }

	return [
		'src' => $src,
		'ver' => $ver,
	];
}

/**
 * Enqueue front end styles and scripts.
 *
 * @return void
 */
function enqueue_scripts() {
	$css = get_asset_data( 'assets/dist/main.css' );

	wp_enqueue_style( 'paradowski-blocks', $css['src'], [], $css['ver'] );
}

/**
 * Register dynamic blocks here.
 *
 * @return void
 */
function register_blocks() {
	// Placeholder for dynamic blocks.
	// @todo add some dynamic block examples.
}
