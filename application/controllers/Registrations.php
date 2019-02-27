<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrations extends CI_Controller {

	public function registration(){
		//загрузка модели
		$this->load->model('users');
		$data['users'] = $this->users->select_users();
		if(!empty($_POST))
		{
			//добавление входных значений
			$login = $this->input->post('login');
			$password = $this->input->post('password');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$device = $this->input->post('device');
			$first_name = $this->input->post('first_name');
			//добавление пользователя
			$data['users'] = $this->users->insert_user($login, $password, $email, $phone, $device, $first_name);
			redirect('registrations/registration');
		}
		$this->load->view('head');
		$this->load->view('navbar_input');
		$this->load->view('registration', $data);
		$this->load->view('footer');
    }
}