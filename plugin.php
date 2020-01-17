<?php
/**
 * Plugin Name: Paradowski Blocks
 * Description: A building block for building blocks!
 * Author: Human Made Limited
 * License: GPL-3.0
 */

namespace HM\Paradowski_Blocks;

require_once __DIR__ . '/inc/namespace.php';

add_action( 'plugins_loaded', __NAMESPACE__ . '\\setup' );
