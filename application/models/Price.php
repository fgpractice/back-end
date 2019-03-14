<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Price extends CI_Model {

	//выборка всех прайс-листов
	public function select_price()
	{
		$query = $this->db->get('price_list');
		return $query->result_array();
	}
	//выборка всех прайс-листов с конкретным id товара
	public function select_price_product($product_id)
	{
		$sql = 'SELECT price_list.id, price, product_id, supplier FROM price_list, product WHERE price_list.product_id = product.id and product_id = ?';
		$query = $this->db->query($sql, array ($product_id));
		return $query->result_array();
	}
	//добавление прайс-листа
	public function insert_price($price, $product_id, $supplier)
	{
		$sql = 'INSERT INTO price_list (price, product_id, supplier) VALUES ('.$this->db->escape($price).',
		'.$this->db->escape($product_id).','.$this->db->escape($supplier).')';
		$query = $this->db->query($sql);
		return $this->db->insert_id();
	}
	//удаление конкретного прайс-листа
	public function delete_price($id_price)
	{
		$this->db->delete('price_list', array('id' => $id_price));
	}
	//изменение конкретного прайс-листа
	public function update_price($id_price, $product_id, $price, $supplier)
	{
		$data = array(
			'product_id' => $product_id,
			'price' => $price,
			'supplier' => $supplier,
		);
		$this->db->where('id', $id_price);
		$this->db->update('price_list', $data);
	}	
}
