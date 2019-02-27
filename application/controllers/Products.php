<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	//товар
	public function product()
	{
		//отображение данных в таблице
		$this->load->model('product');
		$data['product'] = $this->product->select_products();
		//отображение группы товара в выпадающем списке
		$this->load->model('group_product');
		$data['group_product'] = $this->group_product->select_group_products();
		//добавление продукта
		if(!empty($_POST)){
			//добавление переменной
			$name_product = $this->input->post('name_product');
			$description = $this->input->post('description');
			$measure_unit = $this->input->post('measure_unit');
			$photo = $this->input->post('photo');
			$category_id = $this->input->post('category_id');
			//добавление записи
			$data['product'] = $this->product->insert_product($name_product, $description, $measure_unit, $photo, $category_id);
			redirect('products/product');
		}
		$this->load->view('head');
		$this->load->view('navbar_input');
		$this->load->view('product',$data);
		$this->load->view('footer');
	}
}
