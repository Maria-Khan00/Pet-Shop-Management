<?php
namespace App\Models;
class Login
{
	public $e_address;
	public function setEAddress($eAddress)
	{
		$this->e_address= $eAddress;
	}
	public function getEAddress()
	{
		return 'admin00';
	}
}
