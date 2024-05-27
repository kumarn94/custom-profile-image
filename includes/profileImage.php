<?php
namespace Includes;

use Helpers\Helper;
 
 if (!class_exists('AuthorProfileIMG')){
     final class AuthorProfileIMG
     {
         private static $instance = null;
 
         public static function webhead_ajax_query_attachments_args($args) {
 
             if(!empty($_REQUEST['query']['author']) && $_REQUEST['query']['author']==self::current_user()){
                 $args['meta_query'] = [
                     [
                         'key'     => 'profile_image',
                         'value'     => 1,
                         'compare' => '=',
                     ]
                 ];
             }else{
                 $args['meta_query'] = [
                     [
                         'key'     => 'profile_image',
                         'value'     => 1,
                         'compare' => 'NOT EXISTS',
                     ]
                 ];
             }
             
             return $args;
         }            
 
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
 
 