<?php
namespace Includes;

use Helpers\Helper;

if (!class_exists('UserForm')){
    class UserForm
    {
        public static function user_show_extra_profile_fields( $user ) {  
            $user_id = null; 
            if(!empty($user) && is_object($user)){
                $user_id = $user->ID;
            } 
            $user_profile_photo = Helper::user_profile_image_id( $user_id );
            $none = ( ! $user_profile_photo ) ? 'display:none;':''; 
            
 
            echo  '<h3>Extra profile information</h3>
 
            <table class="form-table">
                <tr>
                    <th><label for="profile_image_input">Profile Image</label></th>
                    <td>
                        <div class="cpi-video-poster-wrap">
                            <p class="video-poster-img">
                                <div class="box">
                                    <button type="button" class="delete" style="'.$none.'" title ="Remove local avatar" onclick="removeDP(this)" data-user-id="'.$user_id.'">
                                        <span>&times;</span>
                                    </button>
                                    <div class="image">
                                        <img  class="cpi_video_poster_upload_btn" title ="Choose avatar from media library" src="'.esc_url( get_avatar_url( $user_id ) ).'" />
                                    </div>
                                </div>
                            </p>
                            <input type="hidden" name="profile_image_input" value="'.esc_attr( $user_profile_photo ).'">
                            </div>
                        <input type="hidden" name="cpi_action" value="cpi_profile_update_by_wp">
                    </td>
                </tr>
            </table>';
        }
    }
}