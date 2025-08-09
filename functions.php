<?php
/**
 * Cyan Theme Functions
 * this file is used to initialize the theme
 * @package CyanTheme
 */



//Constants
define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );
define( 'THEME_VERSION', '2.0.0' );
define( 'ENVIRONMENT', 'development' ); //development, production
define( 'THEME_SLUG', 'cyn-theme' );
define( 'THEME_NAME', 'Cyan Theme' );

define( 'THEME_ASSETS_DIR', THEME_DIR . '/assets' );
define( 'THEME_ASSETS_URI', THEME_URI . '/assets' );

define( 'THEME_IMAGES_DIR', THEME_DIR . '/assets/images' );
define( 'THEME_IMAGES_URI', THEME_URI . '/assets/images' );

//Autoload
include_once THEME_DIR . '/vendor/autoload.php';

//Setup Theme
Cyan\Theme\Classes\Setup::init();


function debug_page_template()
{
      if (is_page('blogs')) {
            error_log('Current template: ' . get_page_template());
            error_log('Is posts page: ' . (is_home() ? 'yes' : 'no'));
            error_log('Page ID: ' . get_the_ID());
      }
}
add_action('wp', 'debug_page_template');
