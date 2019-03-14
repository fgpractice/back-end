<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Model {

    //добавление заказа
	public function insert_order($user_id, $market_id, $date_order, $date_payment)
	{
		$sql = 'INSERT INTO orders (user_id, market_id, date_order, date_payment) 
        VALUES ('.$this->db->escape($user_id).', '.$this->db->escape($market_id).', '.$this->db->escape($date_order).', 
        '.$this->db->escape($date_payment).')';
        $query = $this->db->query($sql);
		return $this->db->insert_id();
    }
    //выборка всех заказов
    public function select_orders()
    {
        $query = $this->db->get('order');
        return $query->result_array();
    }
    //удаление одной записи заказа
    public function delete_order($id_order)
    {
        $sql = 'DELETE FROM order WHERE id='.$id_order;
        $query = $this->db->query($sql);
    }
}
