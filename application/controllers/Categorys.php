<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorys extends CI_Controller {

	//группа товара
	public function category()
	{
		//отображение данных в таблице
		$this->load->model('category');
		$data['category'] = $this->category->select_category();
		//добавление группы товара
		if(!empty($_POST)){
			//добавление переменной ввода названия группы
			$name_category = $this->input->post('name_category');
			//выполнить добавление
			$data['category'] = $this->category->insert_category($name_category);
			redirect('categorys/category');
		}
		$this->load->view('head');
		$this->load->view('navbar_input');
		$this->load->view('category',$data);
		$this->load->view('footer');
	}
}
