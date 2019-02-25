<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model {

	public function insert_user($login, $password, $email, $phone, $device, $first_name)
	{
		//$sql = 'INSERT INTO users(login, password, email, phone, device, first_name, role) VALUES (?,?,?,?,?,?,?)';
		//$query = $this->db->query($sql,array($login, $password, $email, $phone, $device, $first_name, 0));
		$sql = 'INSERT INTO users(login, password, email, phone, device, first_name, role) VALUES ('.$this->db->escape($login).',
		'.$this->db->escape($password).','.$this->db->escape($email).','.$this->db->escape($phone).','.$this->db->escape($device).',
		'.$this->db->escape($first_name).', 0)';
		$query = $this->db->query($sql);
		return $this->db->insert_id();
	}
	public function select_users()
	{
		$sql = 'SELECT id_user, login, password, first_name, email, phone, device, role FROM users';
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function select_user($login, $password)
	{
		$sql = 'SELECT id_user, login, password, first_name, email, phone, device, role FROM users WHERE login =? and password = ?';
		$query = $this->db->query($sql, array($login, $password));
		return $query->row_array();
	}
}
