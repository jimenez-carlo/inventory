<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'app');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function Header($type)
	{
		$this->load->view('components/header/' . $type);
	}

	public function Body($type, $name)
	{
		$post = $this->input->post();
		$data['init'] = true;
		if ($type == 'form') {
			if (strpos($name, 'edit') !== false) {
				$clean_type = str_replace('_edit', '', $name);
				$temp = $this->app->GetOne($clean_type, $post['id']);
				$data['default'] = $temp;
				$data['category']    = $this->app->GetCategory();
				if ($clean_type == 'inventory') {
					$data['subcategory'] = $this->app->GetSubCategory($temp->category_id);
				}
			} else {
				$data['category']    = $this->app->GetCategory();
				$data['subcategory'] = $this->app->GetSubCategory();
			}
			$this->load->view('components/form/' . $name, $data);
		} else {
			$data['content'] = $this->TableData($name, $post['id']);
			$this->load->view('components/table/' . $name, $data);
		}
	}

	public function TableData($name, $id = null)
	{
		switch ($name) {
			case 'inventory':
				return $this->app->GetInventory();
				break;
			case 'category':
				return $this->app->GetCategory();
				break;
			case 'subcategory':
				return $this->app->GetSubCategory();
				break;
			case 'item_history':
				return $this->app->GetItemHistory($id);
				break;
		}
	}


	public function Request()
	{
		$post = $this->input->post();
		if (isset($post['SaveCategory'])) {
			echo $this->app->InsertCategory();
		} else if (isset($post['SaveSubCategory'])) {
			echo $this->app->InsertSubCategory();
		} else if (isset($post['SaveItem'])) {
			echo $this->app->InsertItem();
		} else if (isset($post['UpdateItem'])) {
			echo $this->app->UpdateItem();
		} else if (isset($post['UpdateCategory'])) {
			echo $this->app->UpdateCategory();
		} else if (isset($post['UpdateSubCategory'])) {
			echo $this->app->UpdateSubCategory();
		} else if (isset($post['DeleteCategory'])) {
			echo $this->app->DeleteCategory();
		} else if (isset($post['DeleteSubCategory'])) {
			echo $this->app->DeleteSubCategory();
		} else if (isset($post['DeleteItem'])) {
			echo $this->app->DeleteItem();
		}
		if (isset($post['ImportCSV'])) {
			echo $this->app->ImportCSV();
		}
	}

	public function DropdownSubCategory()
	{
		$post = $this->input->post();
		$selected = 1;
		if (isset($post['selected'])) {
			$selected = $post['selected'];
		}
		$data['subcategory'] = $this->app->GetSubCategory($selected);
		$this->load->view('dropdown', $data);
	}
}
