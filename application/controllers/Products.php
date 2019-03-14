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
		$this->load->model('category');
		$data['category'] = $this->category->select_category();
		//загружаем модель пользователя
		$this->load->model('user');
		//отображение имени пользователя в навбаре
		$data['data_user'] = $this->user->select_nav_user($this->session->userdata('id_user'));
		$data['text_login'] = $data['data_user']['login'];
		//добавление продукта
		if($this->input->post('insert_product')){
			//добавление переменной
			$name_product = $this->input->post('name_product');
			$description = $this->input->post('description');
			$measure_unit = $this->input->post('measure_unit');
			$photo = $this->input->post('photo');
			$category_id = $this->input->post('id_category');
			//добавление записи
			$data['product'] = $this->product->insert_product($name_product, $description, $measure_unit, $photo, $category_id);
			redirect('products/product');
		}
		$this->load->view('product',$data);
	}
}
