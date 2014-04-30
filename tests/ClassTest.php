<?php

require '../staticaccess.php';

class MembersStaticAccessTest extends PHPUnit_Framework_TestCase
{
    public function testGetUsers()
    {
        $this->assertEquals(array('Pichler', 'Steiner', 'Bauer', 'Huber'), Members::getUsers());
    }

    public function testAllUsers()
    {
        $this->assertEquals(array('Pichler', 'Steiner', 'Bauer', 'Huber'), Members::allUsers());
    }

    public function testGetInstance()
    {
        $this->assertInstanceOf('Members', Members::getInstance());
    }

    public function testUserCount()
    {
        $this->assertCount(4, Members::getUsers());
    }
}

class Members extends StaticAccess {

    protected static $instance;

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