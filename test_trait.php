<?php

require_once 'staticaccess_trait.php';

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

var_dump(Members::getUsers(), Members::allUsers());
