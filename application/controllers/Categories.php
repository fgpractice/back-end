<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	//группа товара
	public function category()
	{
		var_dump($_POST);
		//отображение данных в таблице
		$this->load->model('category');
		$data['category'] = $this->category->select_category();
		//переменная id категории
		//$id_category = $this->input->post('id_category');
		//загружаем модель пользователя
		$this->load->model('user');
		//отображение имени пользователя в навбаре
		$data['data_user'] = $this->user->select_nav_user($this->session->userdata('id_user'));
		$data['text_login'] = $data['data_user']['login'];
		//при нажатии на кнопку "Добавить" (в модальном окне добавления категории)
		if($this->input->post('insert_category')){
			//добавление переменной ввода названия группы
			$name_category = $this->input->post('name_category');
			//выполнить добавление
			$data['category'] = $this->category->insert_category($name_category);
			redirect('categories/category');
		}
		//при нажатии на кнопку "Изменить"
		if($this->input->post('update_category'))
		{
			$name_category = $this->input->post('editName_category');
			$data['category'] = $this->category->update_category($id_category, $name_category);
			redirect('categories/category');
		}
		//при нажатии на кнопку "Удалить"
		if($this->input->post('delete_category'))
		{
			//переменная id категории
			$id_category = $this->input->post('id_category');
			var_dump($id_category);
			$data['category'] = $this->category->delete_category($id_category);
			redirect('categories/category');
		}
		$this->load->view('category',$data);
	}
}
