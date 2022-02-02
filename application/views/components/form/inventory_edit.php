<form action="">
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Item ID</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" required disabled value="<?php echo $default->id; ?>">
      <input type="hidden" name="item_id" value="<?php echo $default->id; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Item Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" name="item_name" placeholder="Product Item 1" required value="<?php echo $default->item_name; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Category</label>
    <div class="col-sm-8">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" required name="category_id" id="category">
        <?php foreach ($category as $res) { ?>
          <?php echo ($default->category_id == $res['id']) ?
            "<option value=" . $res['id'] . " selected>" . $res['category_name'] . "</option>" :
            "<option value=" . $res['id'] . ">" . $res['category_name'] . "</option>" ?>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*SubCategory</label>
    <div class="col-sm-8">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" required name="subcategory_id" id="subcategory">
        <?php foreach ($subcategory as $res) { ?>
          <?php echo ($default->subcategory_id == $res['id']) ?
            "<option value=" . $res['id'] . " selected>" . $res['sub_category_name'] . "</option>" :
            "<option value=" . $res['id'] . ">" . $res['sub_category_name'] . "</option>" ?>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Price</label>
    <div class="col-sm-8">
      <input type="number" class="form-control form-control-sm" placeholder="100.00" step=".01" name="price" required value="<?php echo $default->item_price; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Qty</label>
    <div class="col-sm-8">
      <input type="number" class="form-control form-control-sm" placeholder="0" require name="qty" value="<?php echo $default->item_qty; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-8">
      <button type="submit" class="btn btn-sm btn-dark" name="UpdateItem"> <i class="fa fa-save"></i> Save Item</button>
    </div>
  </div>
</form>