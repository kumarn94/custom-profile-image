<?php
namespace Includes;

if (!class_exists('SaveForm')){
    class SaveForm
    {
        /*
         * Save custom user profile data
         *
         */
 
         public static function user_save_extra_profile_fields( $user_id ) {
 
            if ( !current_user_can( 'edit_user', $user_id ) )
                return false;

                if(!empty($_POST['profile_image_input'])  || ! wp_verify_nonce( $_POST['profile_image_input'], '_wpnonce' )){
                   update_user_meta( $user_id, 'profile_image', $_POST['profile_image_input'] );
                }else{
                   update_user_meta( $user_id, 'profile_image', '' );
                }
        }

    }
}
