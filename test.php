<?php

require_once 'staticaccess.php';

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

var_dump(Members::getUsers(), Members::allUsers());
