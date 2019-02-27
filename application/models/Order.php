<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Model {

	public function insert_order($data_order, $data_payment, $id_trading, $id_price, $count_order, $id_user)
	{
		$sql = 'INSERT INTO orders (data_order, data_payment, id_trading, id_price, count_order, id_user) 
        VALUES ('.$this->db->escape($data_order).', '.$this->db->escape($data_payment).', '.$this->db->escape($id_trading).', 
        '.$this->db->escape($id_price).', '.$this->db->escape($count_order).', '.$this->db->escape($id_user).')';
		$query = $this->db->query($sql);
		return $this->db->insert_id();
    }
    public function select_orders()
    {
        $query = $this->db->get('orders');
        return $query->result_array();
    }
}
