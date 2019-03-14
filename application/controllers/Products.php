<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	//товары
	public function index()
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
		$this->load->view('product',$data);
	}
	//добавление товара
	public function insert()
	{
		//загрузка модели товара
		$this->load->model('product');
		//добавление товара
		if($this->input->post('insert_product')){
			//добавление переменной
			$name_product = $this->input->post('name_product');
			$description = $this->input->post('description');
			$measure_unit = $this->input->post('measure_unit');
			$photo = $this->input->post('photo');
			$category_id = $this->input->post('id_category');
			//добавление записи
			$data['product'] = $this->product->insert_product($name_product, $description, $measure_unit, $photo, $category_id);
			redirect('products/index');
		}
	}
	//изменение товара
	public function update()
	{
		//загрузка модели товара
		$this->load->model('product');
		//переменная id товара
		$id_product = $this->input->post('id_product');
		if($this->input->post('update_product'))
		{
			$name_product = $this->input->post('editName_product');
			$description = $this->input->post('editDescription');
			$measure_unit = $this->input->post('editMeasure_unit');
			$photo = $this->input->post('editPhoto');
			$category_id = $this->input->post('id_category');
			$data['product'] = $this->product->update_product($id_product, $category_id, $name_product, $description, $measure_unit, $photo);
			redirect('products/index');
		}
	}
	//удаление товара
	public function delete()
	{
		//загрузка модели товара
		$this->load->model('product');
		//переменная id товара
		$id_product = $this->input->post('id_product');
		if($this->input->post('delete_product'))
		{
			$data['product'] = $this->product->delete_product($id_product);
			redirect('products/index');
		}
	}
}
