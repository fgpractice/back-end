<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Model {

	//выборка всех категории
	public function select_category()
	{
		$query = $this->db->get('category');
		return $query->result_array();
	}
	//добавление категории
	public function insert_category($name_category)
	{
		$sql = 'INSERT INTO category (name_category) values ('.$this->db->escape($name_category).')';
		$query = $this->db->query($sql);
		return $this->db->insert_id();
	}
	//изменение конкретной категории
	public function update_category($id_category, $name_category)
	{
		$data = array(
			'name_category' => $name_category,
		);
		$this->db->where('id', $id_category);
		$this->db->update('category', $data);
	}
	//удаление конкретной категории
	public function delete_category($id_category)
	{
		$this->db->delete('category', array('id' => $id_category));
	}
}
