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
	public function search($name_product)
	{		
		$where = " name_product LIKE '%".$this->db->escape_like_str($name_product)."%' ESCAPE '!'";
		$query = $this->db->get_where('product', $where);
		return $query->result_array();
	}
	public function select_product($category_id)
	{
		$category_id = $this->db->escape_str($category_id);
		$query = $this->db->get_where('product', array('category_id' => $category_id));
		return $query->result_array();
	}
	// public function select_product($id_category, $name_product)
	// {
		//$query = $this->db->get('product');
		//$sql = 'SELECT id_product, name_product, description, measure_unit, photo, id_group FROM product';
		//if($id_group != 0){
			//$this->db->where('id_group',$id_group);
			//$sql.= ' and id_group ='.$id_group;
		//}
		//if (!empty($name_product)) {
			//$where = " name_product LIKE '%".$this->db->escape_like_str()."%' ESCAPE '!'";
			//$this->db->where($where);
			//$sql = "SELECT id FROM table WHERE column LIKE '%" .
    		//	$this->db->escape_like_str($search)."%' ESCAPE '!'";
			//$sql.= " and name_product LIKE '%".$name_product."%'";
		//}
	// 	$category_id = $this->db->escape('category_id');
	// 	$name_product = $this->db->escape('name_product');
	// 	$query = $this->db->get('product');

	// 	if($category_id != 0){
	// 		$this->db->where('category_id',$category_id);
	// 	}
	// 	if(!empty($name_product)){
	// 		//$where = "name_product LIKE '%".$this->db->escape_like_str($name_product)."%' ESCAPE '!'";
	// 		//$this->db->where($where);
	// 	}

	// 	// $this->db->where('category_id',$category_id);
	// 	// $this->db->where('name_product',$name_product);
	// 	return $query->result_array();
	// }
	public function select_products()
	{
		$query = $this->db->get('product');
		return $query->result_array();
	}
}
