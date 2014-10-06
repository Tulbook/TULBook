<?php

namespace App\Model;

/**
 * @author Vladimír Antoš
 * @version 1.0
 */
class UserManager extends ModelContainer implements \Nette\Security\IAuthenticator{
    
    public function __construct(\Nette\Database\Context $db) {
        parent::__construct($db);
    }
    
    public function authenticate(array $credentials) {
        
    }

    public function createUser(){
        
    }
    
    public function getAllUsers(){
        
    }
    
    public function getUser($id){
        
    }
}
