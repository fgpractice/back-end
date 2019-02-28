<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Market extends CI_Model {

	public function select_market($id_market)
	{
		$query = $this->db->get('market');
		$this->db->where('id',$id_market);
		return $query->row_array();
	}
	public function select_markets()
	{
		$query = $this->db->get('market');
		return $query->result_array();
	}
	public function insert_market($type_market, $name_market, $name_owner, $contact, $address_market, $bank_info, $user_id)
	{
		$sql = 'INSERT INTO market (type_market, name_market, name_owner, contact, address_market, bank_info, user_id) 
		VALUES('.$this->db->escape($type_market).', '.$this->db->escape($name_market).', '.$this->db->escape($name_owner).',
		'.$this->db->escape($contact).', '.$this->db->escape($address_market).', '.$this->db->escape($bank_info).',
		'.$this->db->escape($user_id).')';
		$query = $this->db->query($sql);
		return $this->db->insert_id();
	}
}
