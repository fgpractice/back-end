<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function insert_user($login, $password, $email, $phone, $device, $name_user)
	{
		//$sql = 'INSERT INTO users(login, password, email, phone, device, first_name, role) VALUES (?,?,?,?,?,?,?)';
		//$query = $this->db->query($sql,array($login, $password, $email, $phone, $device, $first_name, 0));
		$sql = 'INSERT INTO user (login, password, email, phone, device, name_user, role) VALUES ('.$this->db->escape($login).',
		'.$this->db->escape($password).','.$this->db->escape($email).','.$this->db->escape($phone).','.$this->db->escape($device).',
		'.$this->db->escape($name_user).', 0)';
		$query = $this->db->query($sql);
		return $this->db->insert_id();
	}
	public function select_users()
	{
		$query = $this->db->get('user');
		return $query->result_array();
	}
	public function select_user($login, $password)
	{
		//$sql = 'SELECT * FROM user WHERE login =? and password = ?';
		//$login = $this->db->escape($login);
		//$password = $this->db->escape($password);
		// $query = $this->db->get('user');
		// $this->db->where('login', $login);
		// $this->db->where('password', $password);
		$query = $this->db->get_where('user', array('login' => $login, 'password' => $password));
		return $query->row_array();
	}
}
