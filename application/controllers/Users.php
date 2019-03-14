<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	//пользователи
	public function index()
	{
		//загрузка модели
		$this->load->model('user');
		$data['user'] = $this->user->select_users();
		//id пользователя из таблицы
		$id_user = $this->input->post('id_user');
		//отображение имени пользователя в навбаре
		$data['data_user'] = $this->user->select_nav_user($this->session->userdata('id_user'));
		$data['text_login'] = $data['data_user']['login'];
		$this->load->view('user', $data);
	}
	//добавление пользователя
	public function insert()
	{
			//загрузка модели пользователя
			$this->load->model('user');
			//при нажатии на кнопку "Добавить" (в модальном окне при добавлении пользователя)
			if($this->input->post('insert_user'))
			{	
				//добавление входных значений
				$login = $this->input->post('login');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				$phone = $this->input->post('phone');
				$device = $this->input->post('device');
				$name_user = $this->input->post('name_user');
				//добавление пользователя
				$data['user'] = $this->user->insert_user($login, $password, $email, $phone, $device, $name_user);
				redirect('users/index');
			}
	}
	//изменение пользователя
	public function update()
	{
		//загрузка модели пользователя
		$this->load->model('user');			
		//при нажатии на кнопку "Изменить"
		if($this->input->post('update_user'))
		{
			//добавление входных значений
			$login = $this->input->post('editLogin');
			$password = $this->input->post('editPassword');
			$email = $this->input->post('editEmail');
			$phone = $this->input->post('editPhone');
			$device = $this->input->post('editDevice');
			$name_user = $this->input->post('editName_user');
			//изменение данных пользователя
			$data['user'] = $this->user->update_user($id_user, $login, $password, $email, $phone, $device, $name_user);
			redirect('user/index');
		}
	}
	//удаление пользователя
	public function delete()
	{
		//загрузка модели пользователя
		$this->load->model('user');
		//переменная id пользователя
		$id_user = $this->input->post('id_user');
		//при нажатии на кнопку "Удалить"
		if($this->input->post('delete_user'))
		{
			//удаление конкретного пользователя
			$data['user'] = $this->user->delete_user($id_user);
			redirect('users/index');
		}
	}
}