<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Model {

	public function insert_order()
	{
		$sql = 'INSERT INTO orders (data_order, id_trading, id_price, count_order) VALUES (?,?,?,?)';
		$query = $this->db->query($sql);
		return $this->db->insert_id();
	}
}
