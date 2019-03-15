<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sorder extends CI_Controller {

	//заказ
	public function index()
	{
		//загружаем модель пользователя
		$this->load->model('user');
		//отображение имени пользователя в навбаре
		$data['data_user'] = $this->user->select_nav_user($this->session->userdata('id_user'));
		$data['text_login'] = $data['data_user']['login'];
        //загрузка модели
        $this->load->model('order');
        //просмотр данных в таблице
        $data['order'] = $this->order->select_orders();
		$this->load->view('view_order',$data);
	}
}
