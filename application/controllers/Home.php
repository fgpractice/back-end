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
			$data['users'] = $this->users->select_user($_POST['login'], $_POST['password']);
			if(empty($data['users'])){
				$data['message'] = 'Вы ввели неверный логин или пароль!';
			}
			else{
				$usersdata = array(
					'id_user' => $data['users']['id_user'],
					'role' => $data['users']['role']
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
	public function main(){
		
		//осмотр главной страницы
		//$this->load->view('main',$data);
		//осмотр добавления продукта
		//$this->load->view('product',$data);
		//осмотр добавления прайса
		//$this->load->view('price',$data);
		//осмотр добавления торговой точки
		//$this->load->view('trading',$data);
	}
	//функция выхода
	public function out(){
		$this->session->unset_userdata('role');
		redirect('');
	}
	//торговая точка
	public function trading(){
		//отображение данных в таблице
		$this->load->model('trading');
		$data['trading'] = $this->trading->select_tradings();
		//добавление торговой точки
		if(!empty($_POST)){
			$data['trading'] = $this->trading->insert_trading($_POST['type_trading'], $_POST['name_trading'], $_POST['fio'], $_POST['contact'], $_POST['address_trading'], $_POST['bank_account']);
		}	
		$this->load->view('head');
		$this->load->view('navbar_input');
		$this->load->view('trading',$data);
		$this->load->view('footer');
	}
	//группа товара
	public function group_product()
	{
		//отображение данных в таблице
		$this->load->model('group_product');
		$data['group_product'] = $this->group_product->select_group_products();
		//добавление группы товара
		if(!empty($_POST)){
			$data['group_product'] = $this->group_product->insert_group_product($_POST['name_product']);
		}
		$this->load->view('head');
		$this->load->view('navbar_input');
		$this->load->view('group_product',$data);
		$this->load->view('footer');
	}
	//прайс
	public function price()
	{
		//отображение данных в таблице
		$this->load->model('price');
		$data['price'] = $this->price->select_price();
		//добавление прайса
		if(!empty($_POST)){
			$data['price'] = $this->price->insert_price($_POST['price'], $_POST['id_product'], $_POST['supplier']);
		}
		$this->load->view('head');
		$this->load->view('navbar_input');
		$this->load->view('price',$data);
		$this->load->view('footer');
	}
	//товар
	public function product()
	{
		//отображение данных в таблице
		$this->load->model('product');
		$data['product'] = $this->product->select_product();
		//отображение группы товара в выпадающем списке
		$this->load->model('group_product');
		$data['group_product'] = $this->group_product->select_group_products();
		//добавление продукта
		if(!empty($_POST)){
			$data['product'] = $this->product->insert_product($_POST['name_product'], $_POST['description'], $_POST['measure_unit'], $_POST['photo'], $_POST['id_group']);
		}
		$this->load->view('head');
		$this->load->view('navbar_input');
		$this->load->view('product',$data);
		$this->load->view('footer');
	}
	//заказ
	public function order()
	{
		
		$this->load->view('head');
		$this->load->view('navbar_input');
		$this->load->view('order',$data);
		$this->load->view('footer');
	}
}
