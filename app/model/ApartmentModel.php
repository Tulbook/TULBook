<?php

namespace App\Model;

/**
 * @author Vojtěch Šindler
 * @version 1.0
 */
class ApartmentModel extends ModelContainer {

    /**
     * @param \Nette\Database\Context $db
     */
    public function __construct(\Nette\Database\Context $db) {
        parent::__construct($db);
    }

    /**
     * Kontroluje na základě telefoního čísla jestli je pokoj už v databázi.
     * @param int $tel_cislo
     * @return bool
     */
    public function exist($phone) {
        return $this->database->table('byty')->where("tel_cislo", $phone)->count() == 1;
    }

    /**
     * @param array $data
     */
    public function save($data) {
        $this->database->table("byty")->insert($data);
    }

}

?>
