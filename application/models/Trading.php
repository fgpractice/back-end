<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trading extends CI_Model {

	public function select_trading($id_trading)
	{
		$sql = 'SELECT id_trading, type_trading, name_trading, fio, contact, address_trading, bank_account FROM trading WHERE id_trading = ?';
		$query = $this->db->query($sql,array($id_trading));
		return $query->row_array();
	}
	public function select_tradings()
	{
		$query = $this->db->get('trading');
		return $query->result_array();
	}
	public function insert_trading($type_trading, $name_trading, $name_owner, $contact, $address_trading, $bank_account, $user_id)
	{
		$sql = 'INSERT INTO trading (type_trading, name_trading, name_owner, contact, address_trading, bank_account, user_id) 
		VALUES('.$this->db->escape($type_trading).', '.$this->db->escape($name_trading).', '.$this->db->escape($name_owner).',
		'.$this->db->escape($contact).', '.$this->db->escape($address_trading).', '.$this->db->escape($bank_account).',
		'.$this->db->escape($user_id).')';
		$query = $this->db->query($sql);
		return $this->db->insert_id();
	}
}
