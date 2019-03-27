<?php
/*
Plugin Name: Sal Page Builder
Description: The optimized page builder
Version: 1.0
Author: Miquel Capó Casasnovas
*
*/
global $post;



define("SAL_REL_URI",   '/wp-content/plugins/sal-page-builder/');
define("SAL_BASE_VERSION", '1.0');
// enque scripts

$a = "s";

var_dump($a);

function sal_editor_scripts($hook_suffix ) {
  global $post_type;

  /* In Page Edit Screen */
//  if( 'page' == $post_type && in_array( $hook_suffix, array( 'post.php', 'post-new.php' ) ) ){

      $rand = rand( 1, 99999999999 );
        wp_enqueue_style( 'sal-editors', SAL_REL_URI .   'assets/css/sal-editor.css');



      //  wp_enqueue_script( 'sal-editor', SAL_BASE_URI . '/rating-platform/js/decelera-rating-platform.js', array('jquery'), $rand, true );

        wp_enqueue_script( 'sal-editor', SAL_REL_URI . 'assets/js/sal-editor.js', array( 'jquery', 'jquery-ui-sortable' ), SAL_BASE_VERSION, true );

    //  }

    }
    add_action( 'admin_enqueue_scripts', 'sal_editor_scripts' );




//



/* Add page builder form after editor */
add_action( 'edit_form_after_editor', 'sal_page_builder_editor' );


function sal_page_builder_editor($post){
?>
    <div id="fx-page-builder">
        <h1>Sal Page Builder</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a tortor quam. Vestibulum aliquet, diam eget dignissim vehicula, sapien sapien tempor velit, a ultrices tellus turpis nec nunc. Duis porta dapibus ligula vel semper.</p>
    </div><!-- #fx-page-builder -->



<?php
include 'back-end-form.php';




}

function save_custom_meta_box($post_id, $post, $update)
{
    /*if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;*/

    $slug = "post";
  /*  if($slug != $post->post_type)
        return $post_id;*/

$value = 'echoooo';
    if(isset($_POST['sal']))

    {
        $value = $_POST;
    }
    $value = $_POST;
    update_post_meta($post_id, "sal_page", $value);

}

add_action("save_post", "save_custom_meta_box", 10, 3);
