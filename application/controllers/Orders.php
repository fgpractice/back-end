<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	// public function nav_market()
	// {
	// 	//загрузка модели торговой точки
	// 	$this->load->model('market');
	// 	//отображение всех торговых точек в навигации
	// 	$data['market'] = $this->market->select_markets();	
	// 	if(empty($id_market)){
	// 		$data['text_market'] = 'Торговая точка';
	//    }
	//    if(!empty($_POST))
	//    {		   
	// 	   $id_market = $this->input->post('id_market');
	// 	   $data['data_market'] = $this->market->select_market($id_market);		
	// 	   $data['text_market'] = $data['data_market']['name_market'];
	//    }	   	
	// }

	//заказ
	public function order()
	{
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
		//если id маркета пустой
		 if(empty($id_market)){
			//тогда передаем текст
		 	$data['text_market'] = 'Торговая точка';
		}
		//при нажатии на кнопку
		if(!empty($_POST))
		{			
			$id_market = $this->input->post('id_market');
			$data['data_market'] = $this->market->select_market($id_market);		
			$data['text_market'] = $data['data_market']['name_market'];
			//redirect('orders/order');
			//создание переменных
			//переменная id категории при выборе нужной категории товара
			$category_id = $this->input->post('category_id');
			//переменная название товара из поисковика
			$name_product = $this->input->post('name_product');
			//заносим переменные и выполняем запрос выборки товаров определенной категории или названия товара
			//$data['product'] = $this->product->select_product($category_id, $name_product);
			
			// $id_market = $this->input->post('id');
			// if(empty($data['market'])){
				
			// }
			// if(!empty($data['market']))
			// {
			// 	$data['market'] = $this->market->select_market($id_market);
			// 	redirect('home/order');
			// }

			// //добавление переменных
			$data_order = date("Y-m-d");
			$data_payment = date("Y-m-d");
			// $data_order = $this->input->post('data_order');
			// $data_payment = $this->input->post('data_payment');
			// $id_trading = $this->input->post('id_trading');
			// $id_price = $this->input->post('id_price');
			// $count_order = $this->input->post('count_order');
			// $id_user = $this->input->post('id_user');
			// //добавление записи
			// $data['order'] = $this->order->insert_order($data_order, $data_payment, $id_trading, $id_price, $count_order, $id_user);
			
			
			// redirect('home/order');
		}	
		$this->load->view('head');
		$this->load->view('navbar_input',$data);
		$this->load->view('main',$data);
		$this->load->view('footer');
	}
}
