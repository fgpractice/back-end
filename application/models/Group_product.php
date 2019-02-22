<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_Product extends CI_Model {

	public function select_group_products()
	{
		$sql = 'SELECT id_group, name_group FROM group_product';
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function insert_group_product($name_group)
	{
		$sql = 'INSERT INTO group_product(name_group) values (?)';
		$query = $this->db->query($sql, array($name_group));
		return $this->db->insert_id();
	}
}
