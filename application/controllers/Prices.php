<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prices extends CI_Controller {

	//прайс
	public function price()
	{
		//отображение данных в выпадающем меню
		$this->load->model('product');
		$data['product'] = $this->product->select_products();
		//отображение данных в таблице
		$this->load->model('price');
		//переменная id прайса
		$id_price = $this->input->post('id_price');
		//загружаем модель пользователя
		$this->load->model('user');
		//отображение имени пользователя в навбаре
		$data['data_user'] = $this->user->select_nav_user($this->session->userdata('id_user'));
		$data['text_login'] = $data['data_user']['login'];
		//отображение прайса
		$data['price'] = $this->price->select_price();
		//при нажатии на кнопку "Добавить" в модальном окне прайс-листа
		if($this->input->post('insert_price'))
		{
			//добавление переменных
			$price = $this->input->post('price');
			$product_id = $this->input->post('id_product');
			$supplier = $this->input->post('supplier');
			//добавление прайс-листа
			$data['price'] = $this->price->insert_price($price, $product_id, $supplier);
			redirect('prices/price');
		}
		//изменение конкретного прайс-листа
		if($this->input->post('update_price'))
		{
			//переменные
			$product_id = $this->input->post('editId_product');
			$price = $this->input->post('editPrice');
			$supplier = $this->input->post('editSupplier');
			//изменение записи прайс-листа
			$data['price'] = $this->price->update_price($id_price, $product_id, $price, $supplier);
			redirect('prices/price');
		}
		//удаление конкретного прайс-листа
		if($this->input->post('delete_price'))
		{
			$data['price'] = $this->price->delete_price($id_price);
			redirect('prices/price');
		}
		$this->load->view('price',$data);
	}
}
