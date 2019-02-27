<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Markets extends CI_Controller {

	//торговая точка
	public function market(){
		//отображение данных в таблице
		$this->load->model('market');
		$data['market'] = $this->market->select_markets();
		//добавление торговой точки
		if(!empty($_POST)){
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
		$this->load->view('head');
		$this->load->view('navbar_input');
		$this->load->view('market',$data);
		$this->load->view('footer');
	}
}
