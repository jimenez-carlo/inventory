<?php
class App_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    // $this->load->model('Logs_model','logs');
  }
  public function GetValue($table, $column, $where, $value)
  {
    $result = $this->db->query("SELECT {$value} from {$table} where $column= '{$where}'")->row();
    if (!empty($result)) {
      return $result->$value;
    } else {
      return 0;
    }
  }
  public function ImportCSV()
  {
    $this->db->trans_begin();
    set_time_limit(10000);
    header("Content-Type: text/html; charset=ISO-8859-1");
    //header('Content-Type: text/html; charset=UTF-8');
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.ms-excel');
    if (!empty($_FILES['CsvFile']['name']) && in_array($_FILES['CsvFile']['type'], $csvMimes)) {
      $csvReport = fopen($_FILES['CsvFile']['tmp_name'], 'r');
      $csvFile   = fopen($_FILES['CsvFile']['tmp_name'], 'r');
      $skip = 1;
      while (($line = fgetcsv($csvReport)) !== FALSE) {
        if ($skip != 1) {
          $this->InsertItems(
            $line[1],
            $this->app->GetValue('tbl_category', 'category_name', $line[2], 'id'),
            $this->app->GetValue('tbl_subcategory', 'sub_category_name', $line[3], 'id'),
            $line[4],
            $line[5]
          );
        }
        $skip++;
      }
    }
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->success('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('Import Succesfully!');
    }
  }
  public function InsertItems($item, $category, $subcategory, $qty, $price)
  {
    $data = array(
      'item_name' => $item,
      'category_id' => $category,
      'sub_category_id' => $subcategory,
      'item_qty' => $qty,
      'item_price' => $price
    );
    $this->db->insert('tbl_inventory', $data);
  }
  public function GetInventory()
  {
    return $this->db->query("SELECT x.*,y.category_name,z.sub_category_name from tbl_inventory x inner join tbl_category y on x.category_id = y.id inner join tbl_subcategory z on x.sub_category_id = z.id where x.deleted_flag = 0")->result_array();
  }
  public function GetItemHistory($id)
  {
    return $this->db->query("SELECT x.*,y.name,
    (CASE
    WHEN x.column_id = 2 THEN frm1.category_name
    WHEN x.column_id = 3 THEN frm2.sub_category_name
    ELSE x.from 
END) as `from`,
    (CASE
    WHEN x.column_id = 2 THEN to1.category_name
    WHEN x.column_id = 3 THEN to2.sub_category_name
    ELSE x.to 
END) as `to`
 from tbl_inventory_history x inner join tbl_fields y on x.column_id = y.id  
left join tbl_category frm1 on frm1.id = x.from 
left join tbl_subcategory frm2 on frm2.id = x.from 
left join tbl_category to1 on to1.id = x.to 
left join tbl_subcategory to2 on to2.id = x.to 

 where  x.inventory_id = " . $id . " order by x.created_date desc")->result_array();
  }
  public function GetCategory()
  {
    return $this->db->query("SELECT * from tbl_category where deleted_flag = 0 ")->result_array();
  }
  public function GetSubCategory($category = null)
  {
    $id = $this->db->query("SELECT id from tbl_category where deleted_flag = 0 order by id asc limit 1")->row()->id;
    if (!empty($category)) {
      return $this->db->query("SELECT x.*,y.category_name from tbl_subcategory x inner join tbl_category y on x.category_id = y.id where x.deleted_flag = 0 and x.category_id = '{$category}'")->result_array();
    } else {
      return $this->db->query("SELECT x.*,y.category_name from tbl_subcategory x inner join tbl_category y on x.category_id = y.id where x.deleted_flag = 0 and x.category_id = '{$id}'")->result_array();
    }
  }
  public function GetOne($table, $id)
  {
    return $this->db->query("SELECT * from tbl_{$table} where id = {$id}")->row();
  }
  public function InsertCategory()
  {
    $post = $this->input->post();
    $this->db->trans_begin();
    $data = array(
      'category_name' => $post['category']
    );
    $this->db->insert('tbl_category', $data);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->success('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('Category Saved Succesfully!');
    }
  }
  public function InsertSubCategory()
  {
    $post = $this->input->post();
    $this->db->trans_begin();
    $data = array(
      'category_id' => $post['category_id'],
      'sub_category_name' => $post['subcategory_name'],
    );
    $this->db->insert('tbl_subcategory', $data);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->success('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('SubCategory Saved Succesfully!');
    }
  }
  public function InsertItem()
  {
    $post = $this->input->post();
    $this->db->trans_begin();
    $data = array(
      'item_name' => $post['item_name'],
      'category_id' => $post['category_id'],
      'sub_category_id' => $post['subcategory_id'],
      'item_qty' => $post['qty'],
      'item_price' => $post['price']
    );
    $this->db->insert('tbl_inventory', $data);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->success('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('Item Saved Succesfully!');
    }
  }
  public function UpdateItem()
  {
    $post = $this->input->post();
    $this->db->trans_begin();
    $this->UpdateHistoryItem();
    $data = array(
      'item_name' => $post['item_name'],
      'category_id' => $post['category_id'],
      'sub_category_id' => $post['subcategory_id'],
      'item_qty' => $post['qty'],
      'item_price' => $post['price']
    );
    $this->db->where('id', $post['item_id']);
    $this->db->update('tbl_inventory', $data);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->success('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('Item Updated Succesfully!');
    }
  }

  public function UpdateHistoryItem()
  {
    $post = $this->input->post();
    $old_data = $this->GetOne('inventory', $post['item_id']);
    if ($old_data->item_name != $post['item_name']) {
      $this->InsertHistory($post['item_id'], 1, $old_data->item_name, $post['item_name']);
    }
    if ($old_data->category_id != $post['category_id']) {
      $this->InsertHistory($post['item_id'], 2, $old_data->category_id, $post['category_id']);
    }
    if ($old_data->sub_category_id != $post['subcategory_id']) {
      $this->InsertHistory($post['item_id'], 3, $old_data->sub_category_id, $post['subcategory_id']);
    }
    if ($old_data->item_price != $post['price']) {
      $this->InsertHistory($post['item_id'], 4, $old_data->item_price, $post['price']);
    }
    if ($old_data->item_qty != $post['qty']) {
      $this->InsertHistory($post['item_id'], 5, $old_data->item_qty, $post['qty']);
    }
  }

  public function InsertHistory($id, $column, $from, $to)
  {
    $post = $this->input->post();
    $data = array(
      'inventory_id' => $id,
      'column_id' => $column,
      'from' => $from,
      'to' => $to
    );
    $this->db->insert('tbl_inventory_history', $data);
  }


  public function UpdateCategory()
  {
    $post = $this->input->post();
    $this->db->trans_begin();
    $data = array(
      'category_name' => $post['category']
    );
    $this->db->where('id', $post['category_id']);
    $this->db->update('tbl_category', $data);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->success('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('Category Updated Succesfully!');
    }
  }
  public function UpdateSubCategory()
  {
    $post = $this->input->post();
    $this->db->trans_begin();
    $data = array(
      'category_id' => $post['category_id'],
      'sub_category_name' => $post['subcategory_name'],
    );
    $this->db->where('id', $post['subcategory_id']);
    $this->db->update('tbl_subcategory', $data);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->success('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('SubCategory Saved Succesfully!');
    }
  }

  public function DeleteCategory()
  {
    $post = $this->input->post();
    $this->db->trans_begin();
    $data = array(
      'deleted_flag' => 1
    );
    $this->db->where('id', $post['id']);
    $this->db->update('tbl_category', $data);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->success('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('Category ID#' . $post['id'] . ' Deleted Succesfully!');
    }
  }
  public function DeleteSubCategory()
  {
    $post = $this->input->post();
    $this->db->trans_begin();
    $data = array(
      'deleted_flag' => 1
    );
    $this->db->where('id', $post['id']);
    $this->db->update('tbl_subcategory', $data);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->success('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('SubCategory ID#' . $post['id'] . ' Deleted Succesfully!');
    }
  }
  public function DeleteItem()
  {
    $post = $this->input->post();
    $this->db->trans_begin();
    $data = array(
      'deleted_flag' => 1
    );
    $this->db->where('id', $post['id']);
    $this->db->update('tbl_inventory', $data);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->success('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('Item ID#' . $post['id'] . ' Deleted Succesfully!');
    }
  }
  public function error($message = "Error")
  {
    echo '<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
  <div><i class="fa fa-times"></i><b> ' . $message . '</b></div> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  public function success($message = "Successfull")
  {
    echo '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
    <i class="fa fa-check"></i>
  <div><b>' . $message . '</b></div>
  <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
}
