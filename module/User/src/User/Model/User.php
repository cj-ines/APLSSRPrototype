<?php
namespace User\Model;

class User
{
	public $id;
	public $username;
	public $password;
	public $firstname;
	public $lastname;
	public $email;
	public $status;
	public $type;
	
	public function exchangeArray($data) 
	{
		$this->id     = (isset($data['id'])) ? $data['id'] : null;
		$this->username = (isset($data['username'])) ? $data['username'] : null;
		$this->password = (isset($data['password'])) ? $data['password'] : null;
		$this->firstname = (isset($data['firstname'])) ? $data['firstname'] : null;
		$this->lastname = (isset($data['lastname']))? $data['lastname'] : null;
		$this->email = (isset($data['email']))? $data['email'] : null;
		$this->status = (isset($data['status']))? $data['status'] : null;
		$this->type = (isset($data['type']))? $data['type'] : null;
	}

	public function getUserById($id)
	{

	}
}