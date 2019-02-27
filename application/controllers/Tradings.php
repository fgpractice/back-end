<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tradings extends CI_Controller {

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
			$name_owner = $this->input->post('name_owner');
			$contact = $this->input->post('contact');
			$address_trading = $this->input->post('address_trading');
			$bank_account = $this->input->post('bank_account');
			//получение id из сессии
			$user_id = $this->session->userdata('id_user');
			//добавление записи
			$data['trading'] = $this->trading->insert_trading($type_trading, $name_trading, $name_owner, $contact, $address_trading, $bank_account, $user_id);
			redirect('tradings/trading');
		}	
		$this->load->view('head');
		$this->load->view('navbar_input');
		$this->load->view('trading',$data);
		$this->load->view('footer');
	}
}
