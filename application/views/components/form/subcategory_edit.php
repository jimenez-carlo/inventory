<form action="">
<div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*SubCategory ID</label>
    <div class="col-sm-8">
    <input type="text" class="form-control form-control-sm" required disabled value="<?php echo $default->id; ?>">
    <input type="hidden" name="subcategory_id" value="<?php echo $default->id; ?>"> 
    </div>
  </div>
<div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Category</label>
    <div class="col-sm-8">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="category_id">
        <?php foreach ($category as $res) { ?>
          <?php echo ($default->category_id == $res['id']) ? 
  "<option value=".$res['id']." selected>".$res['category_name']."</option>" : 
  "<option value=".$res['id'].">".$res['category_name']."</option>" ?>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*SubCategory Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" required name="subcategory_name" value="<?php echo $default->sub_category_name; ?>">
   
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-8">
      <button type="submit" class="btn btn-sm btn-dark" name="UpdateSubCategory"> <i class="fa fa-save"></i> Save SubCategory</button>
    </div>
  </div>
</form>