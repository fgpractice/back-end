<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	//заказ
	public function index()
	{
		//переменная id торговой точки				
		$id_market = $this->input->post('id_market');
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
		//загрузка модели пользователя
		$this->load->model('user');
		//отображение имени пользователя в навбаре
		$data['data_user'] = $this->user->select_nav_user($this->session->userdata('id_user'));
		$data['text_login'] = $data['data_user']['login'];

		//отображение прайс-листа с конкретным id товара
		$id_product = $this->input->post('id_product');
		//загрузка модели прайса
		$this->load->model('price');
		if($id_product)
		{
			$data['price'] = $this->price->select_price_product($id_product);

		}	

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
		//при нажатии на кнопку "Сделать заказ"
		if($this->input->post('insert_order'))
		{
			$this->load->model('order');
			//id пользователя берем из сессии
			$user_id = $this->session->userdata('id_user');
			//id торговой точки
			$market_id = $this->session->userdata('id_market');
			//добавление переменных системной даты заказа и оплаты
			$date_order = date("Y-m-d");
			$date_payment = date("Y-m-d");
			//добавление записи в таблицу заказ
			$data['order'] = $this->order->insert_order($user_id, $market_id, $date_order, $date_payment);
		}
		$this->load->view('order',$data);
	}

	public function create()
	{
		var_dump($_POST);
		$this->load->model('price');
		$data['price'] = $this->price->select_price_product($this->input->post('id_product'));
		$insert_modal='
		<div class="form-group">
			<label for="insertId_price">Прайс:</label>
						<select required id="insertId_price" name="id_price" class="form-control">';

	foreach ($data['price'] as $item){
		  $insert_modal .= '<option value = "'.$item['id'].'">'.$item['price'].'</option>';
	}	
					   $insert_modal .= '</select>
		</div>
		<div class="form-group">
			<label for="insertTotal_count">Количество:</label>
			<input id="insertTotal_count" name="total_count" class="form-control" type="number" placeholder="Введите кол-во" value="1">
		</div>
		<div class="form-group">
			<label for="insertTotal_amount">Сумма:</label>
			<input id="insertTotal_amount" name="total_amount" class="form-control" type="text" disabled>
		</div>';
	//echo $insert_modal;
	}
}
