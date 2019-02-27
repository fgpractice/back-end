<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		//отображение группы товаров
		$this->load->model('group_product');
		$data['group_product'] = $this->group_product->select_group_products();
		//отображение торговых точек
		$this->load->model('trading');
		$data['trading'] = $this->trading->select_tradings();
		//отображение всех товаров
		$this->load->model('product');
		//поиск товара
		$name_product = ' ';
		$id_group = 0;
		if(!empty($_POST)){
			if(!empty($_POST['id_group'])){
				$id_group = $_POST['id_group'];
			}
			if(!empty($_POST['name_product'])){
				$name_product = $_POST['name_product'];
			}	
		}
		$data['product'] = $this->product->select_product($id_group, $name_product);
		$this->load->model('users');
		if(!empty($_POST)){
			//добавление переменных
			$login = $this->input->post('login');
			$password = $this->input->post('password');
			//проверка логина и пароля		
			$data['user'] = $this->users->select_user($login, $password);
			if(empty($data['user'])){
				$data['message'] = 'Вы ввели неверный логин или пароль!';
			}
			else{
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
		$this->session->unset_userdata('role');
		redirect('');
	}
	//заказ
	public function order()
	{
		//отображение данных в таблице
		$this->load->model('order');
		$data['order'] = $this->order->select_orders();
		if(!empty($_POST))
		{
			//добавление переменных
			$data_order = $this->input->post('data_order');
			$data_payment = $this->input->post('data_payment');
			$id_trading = $this->input->post('id_trading');
			$id_price = $this->input->post('id_price');
			$count_order = $this->input->post('count_order');
			$id_user = $this->input->post('id_user');
			//добавление записи
			$data['order'] = $this->order->insert_order($data_order, $data_payment, $id_trading, $id_price, $count_order, $id_user);
			redirect('home/order');
		}	
		$this->load->view('head');
		$this->load->view('navbar_input');
		$this->load->view('order',$data);
		$this->load->view('footer');
	}
}
