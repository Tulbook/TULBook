<?php

namespace App\Model;

/**
 * Description of apartmentModel
 *
 * @author Vojta
 */
class ApartmentModel extends ModelContainer {

    public function __construct(\Nette\Database\Context $db) {
        parent::__construct($db);
    }

    public function isExist ($tel_cislo)
    {
        return $this->database->table('byty')->where("tel_cislo", $tel_cislo)->count() == 1;
    }
    public function save ($data)
    {
        $this->database->table("byty")->insert($data);
    }
}

?>
