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
		$this->load->view('order',$data);
	}
	//модальное окно передачи id товара
	public function modal()
	{
		$this->load->model('price');
		$id_product = $this->input->post('id_product');
		$data['price'] = $this->price->select_price_product($id_product);
		$insert_modal='
		<div class="form-group">
			<label for="insertId_price">Прайс:</label>
						<select required id="insertId_price" name="id_price" class="form-control rachet" onchange="rachet_sum()">';

	foreach ($data['price'] as $item){
		  $insert_modal .= '<option value = "'.$item['id'].'">'.$item['price'].'</option>';
	}	
		$insert_modal .= '</select>
		</div>
		<div class="form-group">
			<label for="insertTotal_count">Количество:</label>
			<input  type="hidden" value="'.$id_product.'" name="id_product"> 
			<input id="insertTotal_count" name="total_count" class="form-control rachet" type="number" placeholder="Введите кол-во" value="1" onchange="rachet_sum()">
		</div>
		<div class="form-group">
			<label for="insertTotal_amount">Сумма:</label>
			<input id="insertTotal_amount" name="total_amount" class="form-control" type="text" value="" disabled>
		</div>

            <div class="modal-footer">
			  <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
			  <input type="submit" name="insert_order_product" value="Заказать" class="btn btn-primary">
			</div>
			</div>';
	echo $insert_modal;
	}
	//создание заказа
	public function create()
	{
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
			$usersdata = array(
				'id_order' => $data['order']
			);
			$this->session->set_userdata($usersdata);
			redirect('orders/index');
		}
	}
	//добавить заказ по товарам
	public function insert()
	{
		//при нажатии на кнопку "Заказать"
		if($this->input->post('insert_order_product'))
		{
			$this->load->model('order_product');
			//id заказа берем из сессии
			$order_id = $this->session->userdata('id_order');
			//id товара
			$product_id = $this->input->post('id_product');
			//добавление переменных
			$price_list_id = $this->input->post('id_price');
			$total_count = $this->input->post('total_count');
			$total_amount = $this->input->post('total_amount');
			//добавление записи в таблицу заказ
			$data['order_product'] = $this->order_product->insert_order_product($order_id, $product_id, $price_list_id, $total_count, $total_amount);
			redirect('orders/index');
		}		
	}
}
