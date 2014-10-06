<?php

namespace App\Model;

/**
 * Společná třída pro všechny modely.
 * @author Vladimír Antoš
 * @version 1.0
 */
abstract class ModelContainer extends \Nette\Object{
    
    /** @var \Nette\Database\Context */
    protected $database;
    
    public function __construct(\Nette\Database\Context $db) {
        $this->database = $db;
    }
}
