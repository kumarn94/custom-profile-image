<?php
namespace Includes;

use Includes\AuthorProfileIMG;

if ( !defined('ABSPATH') ) { 
    die;
}



if (!class_exists('JS')){
     class JS
    { 
        private static $instance = null;

         
 
        public static function profile_img_assets(){ 
            wp_enqueue_media();
        }

        public static function profile_upload_js() {      ?>  

        <script type="text/javascript">
 jQuery(document).ready(function() {
 
     jQuery(document).on("click", ".cpi_video_poster_upload_btn", function(e) {
         e.preventDefault();
         var t = jQuery(this);
         var fileID = jQuery('input[name="profile_image_input"]').val();
         var n;
         if (n) {
             n.open();
             return;
         }
 
 
         n = wp.media({
             frame: 'select',
            /*  state:'insert', */
             title: "Select or Upload Profile Image",
             button: {
                 text: "Upload profile img"
             },
             library: {
                 type: ['image/JPEG', 'image/PNG'],
                 author: <?php echo AuthorProfileIMG::current_user(); ?>,
                 /* custom_var: 'profile_image', */
             },
             multiple: false
         });
 
         n.on('open', function() {
             // if there is a file ID...
             if (fileID) {
                 // select the file ID to show it as selected in the Media Library Modal. 
                 n.uploader.uploader.param('post_id', parseInt(fileID));
                 var selection = n.state().get('selection');
                 selection.add(wp.media.attachment(fileID));
             }
         });
         n.on("select", function() {
             var e = n.state().get("selection").first().toJSON();
             t.closest(".cpi-video-poster-wrap")
                 .find(".box .image img")
                 .attr('src',e.url);
               
             t.closest(".cpi-video-poster-wrap").find("input[name='profile_image_input']").val(e
                 .id);

            t.closest(".cpi-video-poster-wrap")
            .find(".box button.delete").show();
         });
 
         n.open();
     });
 
 });

 function removeDP(it){
 
        jQuery(".cpi-video-poster-wrap").find("input[name='profile_image_input']").val('');

        jQuery.ajax( {
        url: '<?php  echo rest_url('user/dp'); ?>',
        method: 'POST',
        beforeSend: function ( xhr ) {
            xhr.setRequestHeader( 'X-WP-Nonce', '<?php echo wp_create_nonce( 'wp_rest' ); ?>' );
        },
        data:{
            'user_id' : jQuery(it).data('user-id'),
        }
        } ).done( function ( response ) {
            jQuery(".image").find("img").attr('src',response.url);
            jQuery(it).hide();
            console.log(response);
        } );
     }

 </script> 
 
 <?php }

        public static function instance() {
            if ( self::$instance == null )
                self::$instance = new self;
            return self::$instance;
        } 
    }
}