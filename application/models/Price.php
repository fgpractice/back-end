<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Price extends CI_Model {

	public function select_price()
	{
		$query = $this->db->get('price_list');
		return $query->result_array();
	}
	public function select_price_product($id_product)
	{
		$sql = 'SELECT id_price, price, id_product, supplier FROM price_list, product WHERE price.id_product = product.id_product and id_product = ? ';
		$query = $this->db->query($sql, array ($id_product));
		return $query->result_array();
	}
	public function insert_price($price, $id_product, $supplier)
	{
		$sql = 'INSERT INTO price_list (price, id_product, supplier) VALUES ('.$this->db->escape($price).','.$this->db->escape($id_product).','.$this->db->escape($supplier).')';
		$query = $this->db->query($sql);
		return $this->db->insert_id();
	}
}
