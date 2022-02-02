<div class="table-responsive">
<table class="table table-hover table-striped table-sm" id="myTable">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Subcategory Name</th>
      <th scope="col">Category Name</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($content as $res) { ?>
    <tr>
      <td><?php echo $res['id']; ?></td>
      <td><?php echo $res['sub_category_name']; ?></td>
      <td><?php echo $res['category_name']; ?></td>
      <td>
          <button class="btn btn-dark btn-sm" id="EditSubCategory"   value="<?php echo $res['id']; ?>"><i class="fa fa-edit"></i> Edit</button>
          <button class="btn btn-dark btn-sm" id="DeleteSubCategory" value="<?php echo $res['id']; ?>"><i class="fa fa-trash"></i> Delete</button>
      </td>
      </tr>
  <?php } ?>  

  </tbody>
</table>
</div>
<script src="<?php echo base_url(); ?>assets/JS/table.js"></script>