<?php

require '../staticaccess_trait.php';

class MembersStaticAccessTest extends \PHPUnit_Framework_TestCase {

	public function testGetUsers()
	{
		$this->assertEquals(array('Pichler', 'Steiner', 'Bauer', 'Huber'), Members::getUsers());
	}

	public function testAllUsers()
	{
		$this->assertEquals(array('Pichler', 'Steiner', 'Bauer', 'Huber'), Members::getUsers());
	}
}

class Members {

    use StaticAccessTrait;

    public $users = array('Pichler', 'Steiner', 'Bauer', 'Huber');

    public function staticGetUsers()
    {
        return $this->users;
    }

    public function staticAllUsers()
    {
        return $this->getUsers();
    }

}