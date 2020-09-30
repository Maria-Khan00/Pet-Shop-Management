<?php
class LoginTest extends \PHPUnit\Framework\TestCase
{
	public function testThatWeCanGetTheEAddress()
	{
		$login = new \App\Models\Login;
		$login->setEAddress('admin');
		$this->assertEquals($login
->getEAddress(), 'admin');
	}
}