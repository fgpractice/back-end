<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		//отображение группы товаров
		$this->load->model('category');
		$data['category'] = $this->category->select_category();
		//отображение торговых точек
		$this->load->model('market');
		$data['market'] = $this->market->select_markets();
		//отображение всех товаров
		$this->load->model('product');
		$data['product'] = $this->product->select_products();
		//загрузка модели пользователя
		$this->load->model('user');		
		$data['message'] = '';
		if(!empty($_POST)){
			//добавление переменных
			$login = $this->input->post('login');
			$password = $this->input->post('password');
			//проверка логина и пароля		
			$data['user'] = $this->user->select_user($login, $password);
			//если логин и пароль неправильные
			if(empty($data['user'])){
				$data['message'] = 'Вы ввели неверный логин или пароль!';
			}
			//если все верно
			else
			{
				$usersdata = array(
					'id_user' => $data['user']['id'],
					'role' => $data['user']['role']
				);
				$this->session->set_userdata($usersdata);
				redirect('');
			}
		}
		$role = $this->session->userdata('role');
		//авторизация		
		if(isset($role)){
			//отображение имени пользователя в навбаре
			$data['data_user'] = $this->user->select_nav_user($this->session->userdata('id_user'));
			$data['text_login'] = $data['data_user']['login'];
			$this->load->view('main',$data);
		}
		else{
			$this->load->view('authorization',$data);	
		}			
	}
	//функция выхода
	public function out(){
		$unset_usersdata = array('id_user', 'role', 'id_market', 'id_order', 'id_order');
		$this->session->unset_userdata($unset_usersdata);
		redirect('');
	}
}
