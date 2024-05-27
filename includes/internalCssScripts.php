<?php
namespace Includes;



if ( !defined('ABSPATH') ) { 
    die;
}

if (!class_exists('CSS')){
     class CSS
    { 
        private static $instance = null;
        
        public static function profile_upload_css() { ?>
            <style>
            #your-profile .form-table .user-profile-picture {
                display: none;
            }
            
            .cpi_remove_profile_img {
                cursor: pointer;
            }
           
            .delete {
               cursor: pointer !important;
               font-size: 30px;
               position: absolute;
               color: white;
               border: none;
               background: none;
               right: -15px;
               top: -15px;
               line-height: .85;
               z-index: 99;
               padding: 0;
           }
           .delete span {
               height: 30px;
               width: 30px;
               background-color: black;
               border-radius: 50%;
               display: block;
           }
           
           .box{
                cursor: pointer !important;
               width: calc((100% - 700px) * 0.55);
               margin: 5px;
               height: 150px;
               background: #CCCCCC;
               float: left;
               box-sizing: border-box;    
               position: relative;
               box-shadow: 0 0 5px 2px rgba(0,0,0,.15);
           }
           
           .box:hover{
               box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.5);
           }
           
           .box .image{
               width: 100%;
               height: 100%;
               position: relative;
               overflow: hidden;
           }
           
           .box .image img{
               width: 100%;
               min-height: 100%;
               position: absolute;
               left: 50%;
               top: 50%;
               transform: translate(-50%,-50%);
               -ms-transform: translate(-50%,-50%);
               -webkit-transform: translate(-50%,-50%);
           }
           
           @media (max-width: 600px) {
               .box{
                   width: calc((100% - 20px) * 0.5);
                   height: 200px;
               }
           }
            </style>

            <?php }

        public static function instance() {
            if ( self::$instance == null )
                self::$instance = new self;
            return self::$instance;
        } 
    }
}