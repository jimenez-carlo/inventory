<form action="">
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Item Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" name="item_name" placeholder="Product Item 1" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Category</label>
    <div class="col-sm-8">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" required name="category_id" id="category">
        <?php foreach ($category as $res) { ?>
          <option value="<?php echo $res['id'] ?>"><?php echo $res['category_name']; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*SubCategory</label>
    <div class="col-sm-8">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" required name="subcategory_id" id="subcategory">
        <?php foreach ($subcategory as $res) { ?>
          <option value="<?php echo $res['id'] ?>"><?php echo $res['sub_category_name']; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Price</label>
    <div class="col-sm-8">
      <input type="number" class="form-control form-control-sm" placeholder="100.00" step=".01" name="price" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Qty</label>
    <div class="col-sm-8">
      <input type="number" class="form-control form-control-sm" placeholder="0" require name="qty">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-8">
      <button type="submit" class="btn btn-sm btn-dark" name="SaveItem"> <i class="fa fa-save"></i> Save Item</button>
    </div>
  </div>
</form>