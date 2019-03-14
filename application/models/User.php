<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	//добавление пользователя
	public function insert_user($login, $password, $email, $phone, $device, $name_user)
	{
		//$sql = 'INSERT INTO users(login, password, email, phone, device, first_name, role) VALUES (?,?,?,?,?,?,?)';
		//$query = $this->db->query($sql,array($login, $password, $email, $phone, $device, $first_name, 0));
		$sql = 'INSERT INTO users (login, password, email, phone, device, name_user, role) VALUES ('.$this->db->escape($login).',
		'.$this->db->escape($password).','.$this->db->escape($email).','.$this->db->escape($phone).','.$this->db->escape($device).',
		'.$this->db->escape($name_user).', 0)';
		$query = $this->db->query($sql);
		return $this->db->insert_id();
	}
	//выборка всех пользователей для отображение в таблице
	public function select_users()
	{
		$query = $this->db->get('users');
		return $query->result_array();
	}
	//авторизация (проверка логина и пароля)
	public function select_user($login, $password)
	{
		$query = $this->db->get_where('users', array('login' => $login, 'password' => $password));
		return $query->row_array();
	}
	//выборка одной записи пользователя с помощью id пользователя
	public function select_nav_user($id_user)
	{
		$query = $this->db->get_where('users', array('id' => $id_user));
		return $query->row_array();
	}
	//удаление конкретного пользователя
	public function delete_user($id_user)
	{
		$this->db->delete('users', array('id' => $id_user));
	}
	//изменение конкретного пользователя
	public function update_user($id_user, $login, $password, $email, $phone, $device, $name_user)
	{
		$data = array(
			'login' => $login,
			'password' => $password,
			'email' => $email,
			'phone' => $phone,
			'device' => $device,
			'name_user' => $name_user
		);
		$this->db->where('id', $id_user);
		$this->db->update('users', $data);
	}
}
