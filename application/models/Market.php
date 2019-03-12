<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Market extends CI_Model {

	//выборка одной записи торговой точки для отображения в навбаре
	public function select_market($id_market)
	{
		//$id_market = $this->db->escape_str($id_market);
		//$query = $this->db->get('market');
		// $this->db->where('id', $id_market);
		$query = $this->db->get_where('market', array('id' => $id_market));
		return $query->row_array();
	}
	//выборка всех торговых точек
	public function select_markets()
	{
		$query = $this->db->get('market');
		return $query->result_array();
	}
	//добавление торговой точки
	public function insert_market($type_market, $name_market, $name_owner, $contact, $address_market, $bank_info, $user_id)
	{
		$sql = 'INSERT INTO market (type_market, name_market, name_owner, contact, address_market, bank_info, user_id) 
		VALUES('.$this->db->escape($type_market).', '.$this->db->escape($name_market).', '.$this->db->escape($name_owner).',
		'.$this->db->escape($contact).', '.$this->db->escape($address_market).', '.$this->db->escape($bank_info).',
		'.$this->db->escape($user_id).')';
		$query = $this->db->query($sql);
		return $this->db->insert_id();
	}
		//удаление конкретной торг. точки
		public function delete_market($id_market)
		{
			$this->db->delete('market', array('id' => $id_market));
		}
		//изменение конкретной торг. точки
		public function update_market($id_market, $type_market, $name_market, $name_owner, $contact, $address_market, $bank_info)
		{
			$data = array(
				'type_market' => $type_market,
				'name_market' => $name_market,
				'name_owner' => $name_owner,
				'contact' => $contact,
				'address_market' => $address_market,
				'bank_info' => $bank_info
			);
			$this->db->where('id', $id_market);
			$this->db->update('market', $data);
		}
}
