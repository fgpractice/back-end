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
		$sql = 'SELECT id_trading, type_trading, name_trading, fio, contact, address_trading, bank_account FROM trading';
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function insert_trading($type_trading, $name_trading, $fio, $contact, $address_trading, $bank_account)
	{
		$sql = 'INSERT INTO trading (type_trading, name_trading, fio, contact, address_trading, bank_account) VALUES(?,?,?,?,?,?)';
		$query = $this->db->query($sql, array($type_trading, $name_trading, $fio, $contact, $address_trading, $bank_account));
		return $this->db->insert_id();
	}
}
