<?php

namespace App\Model;

use Nette,
    Nette\Utils\Strings,
    Nette\Security\Passwords;

/**
 * Model pro práci s uživateli
 * @author Vladimír Antoš
 * @version 1.0
 */
class UserManager extends ModelContainer implements \Nette\Security\IAuthenticator {

    /**
     * @var ApartmentModel
     */
    private $apartment;

    /**
     * @param \Nette\Database\Context $db
     * @param \App\Model\ApartmentModel $apartment
     */
    public function __construct(\Nette\Database\Context $db, \App\Model\ApartmentModel $apartment) {
        parent::__construct($db);
        $this->apartment = $apartment;
    }

    public function authenticate(array $credentials) {
        list($email, $password) = $credentials;
        $data = $this->database->table("uzivatele")->where("email", $email)->fetch();
        if (!$row) {
            throw new Nette\Security\AuthenticationException('Tento email není v databázi.', self::IDENTITY_NOT_FOUND);
        } elseif (!Passwords::verify($password, $row["heslo"])) {
            throw new Nette\Security\AuthenticationException('Zadal jsi špatné heslo.', self::INVALID_CREDENTIAL);
        } elseif (Passwords::needsRehash($row["heslo"])) {
            $row->update(array(
                "heslo" => Passwords::hash($password),
            ));
        }
        $arr = $row->toArray();
        unset($arr["heslo"]);
        return new Nette\Security\Identity($row["id_uzivatel"], null, $arr);
    }

    public function getAllUsers() {
        
    }

    public function getUser($id) {
        
    }

    /**
     * Vytvoří uživatele a pokoj ve kterém bydlí.
     * @param \Nette\Utils\ArrayHash $data
     */
    public function save(\Nette\Utils\ArrayHash $data) {
        $pole = array_slice((array) $data, 0, 11);
        $pole = array_key_rename($pole, 'tel_cislo', 'id_byt');
        $pole["id_uzivatel"] = $this->createId('uzivatele', 'id_uzivatel');
        $pole["heslo"] = \Nette\Security\Passwords::hash($pole["heslo"]);

        if (!$this->apartment->exist($pole["id_byt"]))
            $this->apartment->save(array_slice((array) $data, 10, 4));
        $this->database->table("uzivatele")->insert($pole);
    }

}
