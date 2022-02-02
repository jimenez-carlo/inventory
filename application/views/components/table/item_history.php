<div class="table-responsive">
  <table class="table table-hover table-striped table-sm" id="myTable">
    <thead>
      <tr>
        <!-- <th scope="col">ID</th> -->
        <th scope="col">Field</th>
        <th scope="col">From</th>
        <th scope="col">To</th>
        <th scope="col">Date</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($content as $res) { ?>
        <tr>
          <!-- <td><?php echo $res['id']; ?></td> -->
          <td><?php echo $res['name']; ?></td>
          <td <?php if ($res['column_id'] == 4 || $res['column_id'] == 5) {
                echo 'style="text-align:right"';
              } ?>><?php echo ($res['column_id'] == 4) ? number_format($res['from'], 2) : $res['from']; ?></td>
          <td <?php if ($res['column_id'] == 4 || $res['column_id'] == 5) {
                echo 'style="text-align:right"';
              } ?>><?php echo ($res['column_id'] == 4) ? number_format($res['to'], 2) : $res['to']; ?></td>
          <td><?php echo $res['created_date']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="<?php echo base_url(); ?>assets/JS/table.js"></script>