<div class="table-responsive">
  <table class="table table-hover table-striped table-sm" id="myTable">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Subcategory</th>
        <th scope="col">Price</th>
        <th scope="col">Qty</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($content as $res) { ?>
        <tr>
          <td><?php echo $res['id']; ?></td>
          <td><?php echo $res['item_name']; ?></td>
          <td><?php echo $res['category_name']; ?></td>
          <td><?php echo $res['sub_category_name']; ?></td>
          <td style="text-align:right"><?php echo number_format($res['item_price'], 2); ?></td>
          <td style="text-align:right"><?php echo $res['item_qty']; ?></td>
          <td>
            <button class="btn btn-dark btn-sm" id="EditItem" value="<?php echo $res['id']; ?>"><i class="fa fa-edit"></i> Edit</button>
            <button class="btn btn-dark btn-sm" id="HistoryItem" value="<?php echo $res['id']; ?>"><i class="fa fa-history"></i> History</button>
            <button class="btn btn-dark btn-sm" id="DeleteItem" value="<?php echo $res['id']; ?>"><i class="fa fa-trash"></i> Delete</button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="<?php echo base_url(); ?>assets/JS/table.js"></script>