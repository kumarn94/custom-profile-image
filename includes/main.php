<?php
namespace Includes;


if (!class_exists('Main')){
    final class Main
    { 
        private static $instance = null;

        public function __construct() {
            add_action('after_setup_theme', array(__CLASS__,'init'),999);
         }
 
         public static function init()
         {           
            
            add_filter( 'get_avatar_url',  array('Helpers\Helper',  'site_get_avatar_url'), 10, 3 );   
             
             if(!current_user_can('upload_files') ){
                 return;
             }
 
             add_action( 'rest_api_init', array('Includes\DPImageLinkAPI', 'rest_dp') );

             add_action( 'show_user_profile',  array('Includes\UserForm', 'user_show_extra_profile_fields') );
             add_action( 'edit_user_profile',  array('Includes\UserForm', 'user_show_extra_profile_fields') ); 
             add_action( 'user_new_form',  array('Includes\UserForm', 'user_show_extra_profile_fields'));

             add_action( 'personal_options_update', array('Includes\SaveForm', 'user_save_extra_profile_fields') );
             add_action( 'edit_user_profile_update', array('Includes\SaveForm', 'user_save_extra_profile_fields') );
             add_action( 'user_register',  array('Includes\SaveForm', 'user_save_extra_profile_fields'));

             add_action( 'admin_print_footer_scripts-profile.php', array('Includes\CSS', 'profile_upload_css'),11 );
             add_action( 'admin_print_footer_scripts-user-edit.php', array('Includes\CSS', 'profile_upload_css'),11 );
             add_action( 'admin_print_footer_scripts-user-new.php', array('Includes\CSS', 'profile_upload_css'),11 );

             add_action( 'admin_print_footer_scripts-profile.php', array('Includes\JS', 'profile_upload_js'),10 );
             add_action( 'admin_print_footer_scripts-user-edit.php', array('Includes\JS', 'profile_upload_js'),10 );
             add_action( 'admin_print_footer_scripts-user-new.php', array('Includes\JS', 'profile_upload_js'),10 );

             add_action( 'admin_enqueue_scripts', array('Includes\JS', 'profile_img_assets') );
            
         }

         public static function instance() {
            if ( self::$instance == null )
                self::$instance = new self;
            return self::$instance;
        }
 
    }
}