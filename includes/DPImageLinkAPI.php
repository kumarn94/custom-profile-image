<?php
namespace Includes;

if (!class_exists('DPImageLinkAPI')){
    final class DPImageLinkAPI
    { 
        public  static function rest_dp() {
            register_rest_route( '/user', '/dp', array(
                'methods' => 'POST',
                'callback' => array(__CLASS__, 'user_dp'),
                'permission_callback' => '__return_true'        
                ) 
            );
        }
        
        public  static function user_dp($request){

            $user_id = $request->get_params()['user_id'];

            remove_filter( 'get_avatar_url', array('Helpers\Helper', 'site_get_avatar_url'), 10, 3 );

            $return = array(
                'message'  => 'Gravatar image',
                'url'       => get_avatar_url($user_id),
            );

            return wp_send_json($return);
        }
    }
}