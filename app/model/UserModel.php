<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserModel
 *
 * @author Vojta
 */
namespace App\Model;
use Nette,
	Nette\Utils\Strings,
	Nette\Security\Passwords;
class UserModel implements \Nette\Security\IAuthenticator {
     private $Database;
    
    public function __construct(\Nette\Database\Context $database) {
        $this->Database = $database;
    }
    
    public function save($email,$passwd) {
        
        $this->Database->table("uzivatele")->insert(array("Email"=>$email,"Password"=> \Nette\Security\Passwords::hash($passwd)));
    }

    public function authenticate(array $credentials) {
        list($username, $password) = $credentials;
        
        $row = $this->Database->table("login")->where("Email", $username)->fetch();

		if (!$row) {
			throw new Nette\Security\AuthenticationException('The username is incorrect.', self::IDENTITY_NOT_FOUND);

		} elseif (!Passwords::verify($password, $row["Password"])) {
			throw new Nette\Security\AuthenticationException('The password is incorrect.', self::INVALID_CREDENTIAL);

		} elseif (Passwords::needsRehash($row["Password"])) {
			$row->update(array(
				"Password" => Passwords::hash($password),
			));
		}

		$arr = $row->toArray();
		unset($arr["Password"]);
                //bdump($arr);
		return new Nette\Security\Identity($row["ID"], null, $arr);
	}

 
}

?>
