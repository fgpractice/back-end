<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_product extends CI_Model {

	public function insert_order_product($order_id, $product_id, $price_list_id, $total_count)
	{
		$sql = 'INSERT INTO order_product (order_id, product_id, price_list_id, total_count, total_amount) 
        VALUES ('.$this->db->escape($order_id).', '.$this->db->escape($product_id).', '.$this->db->escape($price_list_id).', 
        '.$this->db->escape($total_count).', 0)';// '.$this->db->escape($total_amount).')';
		$query = $this->db->query($sql);
		return $this->db->insert_id();
    }
    public function select_order_product()
    {
        $query = $this->db->get('order_product');
        return $query->result_array();
    }
}
