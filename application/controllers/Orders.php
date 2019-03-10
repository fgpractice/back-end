<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	//заказ
	public function order()
	{
		//переменная id торговой точки				
		$id_market = $this->input->post('id_market');
		//переменная id категории при выборе нужной категории товара	
		$category_id = $this->input->post('category_id');
		//переменная название товара из поисковика
		$name_product = $this->input->post('name_product');
		//загрузка модели категория товаров
		$this->load->model('category');
		//отображение в левом меню категория товаров
		$data['category'] = $this->category->select_category();
		//загрузка модели товара
		$this->load->model('product');
		//отображение всех товаров в карточках
		$data['product'] = $this->product->select_products();
		//загрузка модели торговой точки
		$this->load->model('market');
		//отображение всех торговых точек в навигации
		$data['market'] = $this->market->select_markets();
		//отображение существующей id торговой точки в навигационной панели
		$session_id_market = $this->session->userdata('id_market');
		$data['data_market'] = $this->market->select_market($session_id_market);
		//если id маркета в сессии пустая
		 if(empty($session_id_market)){
			//тогда передаем текст
		 	$data['text_market'] = 'Торговая точка';
		}
		//если id маркета в сессии существует
		if(!empty($session_id_market))
		{
			//передаем наименование торговой точки
			$data['text_market'] = $data['data_market']['name_market'];
		}
		//при нажатии на кнопку "Торговая точка"
		if($id_market)
		{	
			//выполняем запрос
			$data['data_market'] = $this->market->select_market($id_market);
			if(empty($data['data_market']))
			{
				$data['text_market'] = 'Торговая точка';
			}
			if(!empty($data['data_market']))
			{
				$data['text_market'] = $data['data_market']['name_market'];
				$array_items = array('id_market' => $data['data_market']['id']);
				$this->session->set_userdata($array_items);		
			}
		}
		//при выборе категории товара по кнопке
		if(!empty($category_id))
		{		
			//заносим переменную и выполняем запрос выбора категорииы
			$data['product'] = $this->product->select_product($category_id);
		}
		//при нажатии на кнопку "Поиск"
		if(!empty($name_product))
		{
		//заносим переменную и выполняем запрос поиска товара
		$data['product'] = $this->product->search($name_product);
		}	
		//при нажатии на кнопку "Добавить заказ"
		if(!empty($_POST['insert_order']))
		{
			$this->load->model('order');
			//id пользователя
			$user_id = $this->session->userdata('id_user');
			//id торговой точки
			$market_id = $this->session->userdata('id_market');
			//добавление переменных системной даты заказа и оплаты
			$date_order = date("Y-m-d");
			$date_payment = date("Y-m-d");
			//добавление записи в таблицу заказ
			$data['order'] = $this->order->insert_order($user_id, $market_id, $date_order, $date_payment);
		}
		$this->load->view('head');
		$this->load->view('navbar_order',$data);
		$this->load->view('main',$data);
		$this->load->view('footer');
	}
}
