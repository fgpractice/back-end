<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

	public function insert_product($name_product, $description, $measure_unit, $photo, $id_group)
	{
		$sql = 'INSERT INTO product(name_product, description, measure_unit, photo, id_group) VALUES (?,?,?,?,?)';
		$query = $this->db->query($name_product, $description, $measure_unit, $photo, $id_group);
		$this->db->insert_id();
	}
	public function select_product($id_group, $name_product)
	{
		$sql = 'SELECT id_product, name_product, description, measure_unit, photo, id_group FROM product WHERE 1 = 1 ';
		if($id_group != 0){
			$sql.= ' and id_group ='.$id_group;
		}
		if (!empty($name_product)) {
			$sql.= " and name_product LIKE '%".$name_product."%'";
		}
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
