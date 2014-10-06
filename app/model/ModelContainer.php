<?php

namespace App\Model;

/**
 * Společná třída pro všechny modely.
 * @author Vladimír Antoš
 * @version 1.0
 */
abstract class ModelContainer extends \Nette\Object {

    /** @var \Nette\Database\Context */
    protected $database;

    public function __construct(\Nette\Database\Context $db) {
        $this->database = $db;
    }

    protected function createId($table, $columnId) {
        $id = null;
        do {
            $id = \Nette\Utils\Strings::random(idLength,'0-9');
        } while ($this->database->table($table)->where($columnId, $id)->count() == 1);
        return (int) $id;
    }

}
