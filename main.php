<?php
/**
 * Plugin Name: Custom Profile Image
 * Description: The Custom Profile Image Plugin lets users upload their own profile images or use their Gravatar. It allows easy image management and switching between custom and Gravatar images.
 * Plugin URI: https://github.com/kumarn94/custom-profile-image
 * Author: Naresh Kumar
 * Version: 1.3.0
 * Author URI: https://profiles.wordpress.org/kumarn94/
 *
 * Text Domain: custom-profile-image
 *
 * @package Custom Profile Image
 * @category Core
 *
 */

if ( !defined('ABSPATH') ) { 
    die;
}

require_once __DIR__ . '/vendor/autoload.php';

Includes\Main::instance();
