<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_Product extends CI_Model {

	public function select_group_products()
	{
		$query = $this->db->get('category');
		return $query->result_array();
	}
	public function insert_group_product($name_category)
	{
		//$data = array(
		//	'name_group' => $this->db->escape($name_group)
		//);
		$sql = 'INSERT INTO group_product(name_category) values ('.$this->db->escape($name_category).')';
		$query = $this->db->query($sql);
		//$this->db->insert('group_product',$data);
		return $this->db->insert_id();
	}
}
