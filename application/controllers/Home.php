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
	public function registration(){
		//загрузка модели
		$this->load->model('users');
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
			redirect('home/registration');
		}
		$this->load->view('head');
		$this->load->view('navbar_input');
		$this->load->view('registration', $data);
		$this->load->view('footer');
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
			//добавление переменных
			$type_trading = $this->input->post('type_trading');
			$name_trading = $this->input->post('name_trading');
			$fio = $this->input->post('fio');
			$contact = $this->input->post('contact');
			$address_trading = $this->input->post('address_trading');
			$bank_account = $this->input->post('bank_account');
			$data['trading'] = $this->trading->insert_trading($type_trading, $name_trading, $fio, $contact, $address_trading, $bank_account);
			redirect('home/trading');
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
			//добавление переменной ввода названия группы
			$name_group = $this->input->post('name_group');
			//выполнить добавление
			$data['group_product'] = $this->group_product->insert_group_product($name_group);
			redirect('home/group_product');
		}
		$this->load->view('head');
		$this->load->view('navbar_input');
		$this->load->view('group_product',$data);
		$this->load->view('footer');
	}
	//прайс
	public function price()
	{
		//отображение данных в выпадающем меню
		$this->load->model('product');
		$data['product'] = $this->product->select_products();
		//отображение данных в таблице
		$this->load->model('price');
		$data['price'] = $this->price->select_price();
		//добавление прайса
		if(!empty($_POST)){
			//добавление переменных
			$price = $this->input->post('price');
			$id_product = $this->input->post('id_product');
			$supplier = $this->input->post('supplier');
			$data['price'] = $this->price->insert_price($price, $id_product, $supplier);
			redirect('home/price');
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
		$data['product'] = $this->product->select_products();
		//отображение группы товара в выпадающем списке
		$this->load->model('group_product');
		$data['group_product'] = $this->group_product->select_group_products();
		//добавление продукта
		if(!empty($_POST)){
			//добавление переменной
			$name_product = $this->input->post('name_product');
			$description = $this->input->post('description');
			$measure_unit = $this->input->post('measure_unit');
			$photo = $this->input->post('photo');
			$id_group = $this->input->post('id_group');
			//добавление записи
			$data['product'] = $this->product->insert_product($name_product, $description, $measure_unit, $photo, $id_group);
			redirect('home/product');
		}
		$this->load->view('head');
		$this->load->view('navbar_input');
		$this->load->view('product',$data);
		$this->load->view('footer');
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
