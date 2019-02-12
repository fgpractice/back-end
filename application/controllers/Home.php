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
		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('main',$data);
		//осмотр добавления продукта
		//$this->load->view('product',$data);
		//осмотр добавления прайса
		//$this->load->view('price',$data);
		//осмотр добавления торговой точки
		//$this->load->view('trading',$data);
		$this->load->view('footer');
	}
}
