<?php
namespace Includes;

use Helpers\Helper;
 
 if (!class_exists('AuthorProfileIMG')){
     final class AuthorProfileIMG
     {
         private static $instance = null;           
 
         public static function current_user(){ 
             if ( is_user_logged_in() ) {
                 
                 if ( current_user_can( 'manage_options' ) ) {
                     $user_id = 0;
                 }else{
                     $user_id = get_current_user_id();
                 }
                 
             } else {
                 $user_id = 0;
             }
 
             return $user_id;
         }

     }
 
 }
 
 