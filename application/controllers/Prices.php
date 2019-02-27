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
		$data['price'] = $this->price->select_price();
		//добавление прайса
		if(!empty($_POST)){
			//добавление переменных
			$price = $this->input->post('price');
			$product_id = $this->input->post('product_id');
			$supplier = $this->input->post('supplier');
			$data['price'] = $this->price->insert_price($price, $product_id, $supplier);
			redirect('prices/price');
		}
		$this->load->view('head');
		$this->load->view('navbar_input');
		$this->load->view('price',$data);
		$this->load->view('footer');
	}
}
