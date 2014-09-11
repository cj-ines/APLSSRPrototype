<?php
namespace User\Model;

class UserDetail
{
	public $user_id;
	public $detail_name;
	public $detail_value;

	public function exchangeArray()
	{
		$this->user_id     	 = (isset($data['user_id'])) ? $data['user_id'] : null;
		$this->detail_name   = (isset($data['detail_name'])) ? $data['detail_name'] : null;
		$this->detail_value  = (isset($data['detail_value'])) ? $data['detail_value'] : null;
	}
}