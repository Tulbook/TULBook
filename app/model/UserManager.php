<?php

namespace App\Model;

use Nette,
    Nette\Utils\Strings,
    Nette\Security\Passwords;

/**
 * @author Vladimír Antoš
 * @version 1.0
 */
class UserManager extends ModelContainer implements \Nette\Security\IAuthenticator {

    /**
     *
     * @var ApartmentModel
     */
    private $apartment;

    public function __construct(\Nette\Database\Context $db, \App\Model\ApartmentModel $apartment) {
        parent::__construct($db);
        $this->apartment = $apartment;
    }

    public function authenticate(array $credentials) {
        
    }

    public function createUser(array $data) {
        
    }

    public function getAllUsers() {
        
    }

    public function getUser($id) {
        
    }

    public function save(\Nette\Utils\ArrayHash $data) {
        $pole = array_slice((array) $data, 0, 11);
        $pole = array_key_rename($pole, 'tel_cislo', 'id_byt');
        $pole["id_uzivatel"] = $this->createId('uzivatele', 'id_uzivatel');
        $pole["heslo"] = \Nette\Security\Passwords::hash($pole["heslo"]);

        if (!$this->apartment->isExist($pole["id_byt"]))
            $this->apartment->save (array_slice((array) $data, 10, 4));
           
        $this->database->table("uzivatele")->insert($pole);
    }

}
