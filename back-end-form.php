<?php
/*Backend Form to create page array
*/
//global $post;

function get_sal_lenguages(){

  $lengs= array( 'es', 'en', 'fr');
  return $lengs;
}
?>
<div class="sal-editor">


  <div class="sal-editor-content sortable connectedSortable">

    Content of the editor

<?php include 'templates/sal-template.php';?>
<?php include 'templates/sal-template.php';?>
<?php include 'templates/sal-button.php';?>
<?php include 'templates/sal-button.php';?>
<?php include 'templates/sal-button.php';?>


  </div>


  <?php

  $attr = get_post_meta($post->ID, "sal_page", true); ?>

<?php
  // themes
  ?>
  <div class="sal-template row-editor" data-sal-order="1">
    <input type="hidden" name="sal[sal-order]">
    <div class="add-lenguage">
      <div class="form-title">Lenguages</div>
      <?php  $lengs = get_sal_lenguages();

      foreach ($lengs as $leng ) {?>
        <input type="radio" name="sal[leng]" value="<?php echo $leng;  ?>"><?php echo $leng;?></input>
<?php
      }
?>
    </div>
    <div class="add-level">
      <div class="form-title">Levels</div>
      <input type="text" name="sal[level]" value=""></input>
    </div>
    <div class="add-id">
      <div class="form-title">Row ID</div>
      <input type="text" name="sal[id]" value=""></input>
    </div>
    <div class="add-attributes">
      <div class="form-title">Attributes</div>
      <input type="text" name="sal[attr]" value="<?php print_r($attr); ?>"></input>
    </div>
    <div class="add-class">
      <div class="form-title">Add extra class</div>
      <input type="text" name="sal[class]" value=""></input>
    </div>
    <div class="add-text">
      <div class="form-title">Text</div>
      <input type="text" name="sal[content]" value=""></input>
      <?php
      $content = '';
$editor_id = 'mycustomeditor';

wp_editor( $content, $editor_id );
      ?>
    </div>
  </div>
</div>

<input type="submit">




<?php
