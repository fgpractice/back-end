<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model {

	public function insert_user($login, $password, $email, $phone, $device, $first_name)
	{
		$sql = 'INSERT INTO users(login, password, email, phone, device, first_name) VALUES (?,?,?,?,?,?)';
		$query = $this->db->query($sql,array($login, $password, $email, $phone, $device, $first_name));
		return $this->db->insert_id();
	}
}
