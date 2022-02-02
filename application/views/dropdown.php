<?php foreach ($subcategory as $res) { ?>
  <?php echo (isset($_POST['selected']) && $_POST['selected'] == $res['id']) ? 
  "<option value=".$res['id']." selected>".$res['sub_category_name']."</option>" : 
  "<option value=".$res['id'].">".$res['sub_category_name']."</option>" ?>
<?php } ?>