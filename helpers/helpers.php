<?php
namespace Helpers;

if ( !defined('ABSPATH') ) { 
    die;
}



if (!class_exists('Helper')){
    final class Helper
    { 
        private static $instance = null;

        public static function user_profile_image_id($user_id=null){
            if(empty($user_id)){
                return;
            }
        
            return get_user_meta( $user_id, 'profile_image', true );
        }

        public static function avatar_userID($id_or_email){
            $id = '';
            if ( is_numeric( $id_or_email ) ) {
                $id = (int) $id_or_email;
            } 
            elseif ( is_object( $id_or_email ) ) {
                if ( ! empty( $id_or_email->user_id ) ) {
                    $id = (int) $id_or_email->user_id;
                }
            } else {
                $user = get_user_by( 'email', $id_or_email );
                $id = !empty( $user ) ?  $user->data->ID : '';
            }

            return $id;
        }

                 
        public static function isInteger($input){
            return (ctype_digit(strval($input)));
        }

        public static function site_get_avatar_url( $url, $id_or_email, $args ) {
           
            $id = self::avatar_userID($id_or_email);

            //Preparing for the launch.
            $custom_url = $id ? self::user_profile_image_id( $id ) : '';

            $user_id  = self::isInteger($custom_url);

            if( $user_id ){
                $return = esc_url_raw( wp_get_attachment_image_url( $custom_url ) );
            }elseif( empty($user_id ) && ($custom_url == '' || !empty($args['force_default']))  ){
                $return = esc_url_raw( $url ); 
            }else{
                $return = esc_url_raw( $custom_url ); 
            }
            return $return;

        }

        public static function instance() {
            if ( self::$instance == null )
                self::$instance = new self;
            return self::$instance;
        } 
    }
}