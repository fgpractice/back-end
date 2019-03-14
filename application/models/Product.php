<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

	public function insert_product($name_product, $description, $measure_unit, $photo, $category_id)
	{
		$sql = 'INSERT INTO product(name_product, description, measure_unit, photo, category_id) 
		VALUES ('.$this->db->escape($name_product).', '.$this->db->escape($description).', 
		'.$this->db->escape($measure_unit).', '.$this->db->escape($photo).', '.$this->db->escape_str($category_id).')';
		$query = $this->db->query($sql);
		$this->db->insert_id();
	}
	//поиск по имени товара
	public function search($name_product)
	{		
		$where = " name_product LIKE '%".$this->db->escape_like_str($name_product)."%' ESCAPE '!'";
		$query = $this->db->get_where('product', $where);
		var_dump($where);
		return $query->result_array();
	}
	//выборка по категории
	public function select_product($category_id)
	{
		$category_id = $this->db->escape_str($category_id);
		$query = $this->db->get_where('product', array('category_id' => $category_id));
		return $query->result_array();
	}
	//выборка всех товаров
	public function select_products()
	{
		$query = $this->db->get('product');
		return $query->result_array();
	}
}
