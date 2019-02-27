<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Model {

	public function select_category()
	{
		$query = $this->db->get('category');
		return $query->result_array();
	}
	public function insert_category($name_category)
	{
		//$data = array(
		//	'name_group' => $this->db->escape($name_group)
		//);
		$sql = 'INSERT INTO category (name_category) values ('.$this->db->escape($name_category).')';
		$query = $this->db->query($sql);
		//$this->db->insert('group_product',$data);
		return $this->db->insert_id();
	}
}
