<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function registration(){
		//загрузка модели
		$this->load->model('user');
		$data['user'] = $this->user->select_users();
		if(!empty($_POST))
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
		$this->load->view('head');
		$this->load->view('navbar_input');
		$this->load->view('registration', $data);
		$this->load->view('footer');
    }
}