<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function registration(){
		//загрузка модели
		$this->load->model('user');
		$data['user'] = $this->user->select_users();
		//id пользователя из таблицы
		$id_user = $this->input->post('id_user');
		//отображение имени пользователя в навбаре
		$data['data_user'] = $this->user->select_nav_user($this->session->userdata('id_user'));
		$data['text_login'] = $data['data_user']['login'];
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
			redirect('users/registration');
		}
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
			redirect('user/registration');
		}
		//при нажатии на кнопку "Удалить"
		if($this->input->post('delete_user'))
		{
			//удаление конкретного пользователя
			$data['user'] = $this->user->delete_user($id_user);
			redirect('users/registration');
		}
		$this->load->view('registration', $data);
    }
}