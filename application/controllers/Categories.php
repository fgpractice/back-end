<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	//группа товара
	public function category()
	{
		//отображение данных в таблице
		$this->load->model('category');
		$data['category'] = $this->category->select_category();

		//это лучше вынести в конструктор
		$this->load->library('table');
		$template = array(
			'table_open' => '<table class="table" id="table">',
			'thead_open' => '<thead class="thead-dark">'
		);
		$this->table->set_template($template);
		


		//добавление группы товара
		if(!empty($_POST)){
			//добавление переменной ввода названия группы
			$name_category = $this->input->post('name_category');
			//выполнить добавление
			$data['category'] = $this->category->insert_category($name_category);
			redirect('categories/category');
		}
		$this->load->view('head');
		$this->load->view('navbar_input');
		$this->load->view('category',$data);
		$this->load->view('footer');
	}
}
