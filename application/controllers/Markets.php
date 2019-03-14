<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Markets extends CI_Controller {

	//торговая точка
	public function market(){
		//отображение данных в таблице
		$this->load->model('market');
		$data['market'] = $this->market->select_markets();
		//отображение меню
		$this->load->model('category');
		$data['category'] = $this->category->select_category();
		$id_market = $this->input->post('id_market');
		//загружаем модель пользователя
		$this->load->model('user');
		//отображение имени пользователя в навбаре
		$data['data_user'] = $this->user->select_nav_user($this->session->userdata('id_user'));
		$data['text_login'] = $data['data_user']['login'];
		//при нажатии на кнопку "Добавить" (добавление торговой точки в мод. окне)
		if($this->input->post('insert_market'))
		{
			//добавление переменных
			$type_market = $this->input->post('type_market');
			$name_market = $this->input->post('name_market');
			$name_owner = $this->input->post('name_owner');
			$contact = $this->input->post('contact');
			$address_market = $this->input->post('address_market');
			$bank_info = $this->input->post('bank_info');
			//получение id из сессии
			$user_id = $this->session->userdata('id_user');
			//добавление записи
			$data['market'] = $this->market->insert_market($type_market, $name_market, $name_owner, $contact, $address_market, $bank_info, $user_id);
			redirect('markets/market');
		}
		//при нажатии на кнопку "Изменить" в таблице
		if($this->input->post('update_market'))
		{
			//изменение конкретной торговой точки
			$data['market'] = $this->market->update_market($id_market, $type_market, $name_market, $name_owner, $contact, $address_market, $bank_info);
			redirect('markets/market');
		}
		//при нажатии на кнопку "Удалить" в таблице
		if($this->input->post('delete_market'))
		{
			$data['market'] = $this->market->delete_market($id_market);
			redirect('markets/market');
		}	
		$this->load->view('market',$data);
	}
}
