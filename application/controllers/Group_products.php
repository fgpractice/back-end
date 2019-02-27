<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_products extends CI_Controller {

	//группа товара
	public function group_product()
	{
		//отображение данных в таблице
		$this->load->model('group_product');
		$data['group_product'] = $this->group_product->select_group_products();
		//добавление группы товара
		if(!empty($_POST)){
			//добавление переменной ввода названия группы
			$name_category = $this->input->post('name_category');
			//выполнить добавление
			$data['group_product'] = $this->group_product->insert_group_product($name_category);
			redirect('group_products/group_product');
		}
		$this->load->view('head');
		$this->load->view('navbar_input');
		$this->load->view('group_product',$data);
		$this->load->view('footer');
	}
}
