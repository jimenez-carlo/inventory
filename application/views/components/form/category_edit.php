<form action="" method="post">
<div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Category ID</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" required disabled value="<?php echo $default->id ?>">
      <input type="hidden" class="form-control form-control-sm" required name="category_id" value="<?php echo $default->id ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Category Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" required name="category" value="<?php echo $default->category_name ?>"">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-8">
      <button type="submit" class="btn btn-sm btn-dark" name="UpdateCategory"> <i class="fa fa-save"></i> Save Category</button>
    </div>
  </div>
</form>