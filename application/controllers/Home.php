<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// public function __construct()
	// {
	// 	parent::__construct();	 
	// }
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
		//поиск товара
		// $name_product = ' ';
		// $category_id = 0;
		// if(!empty($_POST)){
		// 	if(!empty($_POST['category_id'])){
		// 		$category_id = $_POST['category_id'];
		// 	}
		// 	if(!empty($_POST['name_product'])){
		// 		$name_product = $_POST['name_product'];
		// 	}	
		// }
		//$data['product'] = $this->product->select_product($category_id, $name_product);

		$this->load->model('user');
		
		$data['message'] = '';
		if(!empty($_POST)){
			//добавление переменных
			$login = $this->input->post('login');
			$password = $this->input->post('password');
			//проверка логина и пароля		
			$data['user'] = $this->user->select_user($login, $password);
			if(empty($data['user'])){
				$data['message'] = 'Вы ввели неверный логин или пароль!';
			}
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
		$data['message'] = '';
		//авторизация	
		$this->load->view('head');		
		if(isset($role)){
			$this->load->view('navbar_input');
			$this->load->view('main',$data);
		}
		else{
			$this->load->view('navbar');
			$this->load->view('authorization',$data);	
		}			
		$this->load->view('footer');
	}
	//функция выхода
	public function out(){
		$unset_usersdata = array('id_user', 'role', 'id_market');
		// $this->session->unset_userdata('id_user');
		// $this->session->unset_userdata('role');
		$this->session->unset_userdata($unset_usersdata);
		redirect('');
	}
}
