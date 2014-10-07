<?php

namespace App\Presenters;

use Nette,
    App\Model,
    Nette\Application\UI;

/**
 * Description of RegistrationPresenter
 *
 * @author Vojtěch Šindler
 * @version 1.0
 */
class RegistrationPresenter extends BasePresenter {

    /**
     * Sign-in form factory.
     * @return Nette\Application\UI\Form
     * @var \App\Model\UserManager @inject 
     */
    public $login;

    public function renderDefault() {
        
    }

    /**
     * Sign-in form factory.
     * @return Nette\Application\UI\Form
     */
    protected function createComponentRegistrationForm() {
        $form = new Nette\Application\UI\Form;

        $form->addText('email', 'Email*')
                ->setType("email")
                ->setRequired('Zadej prosím svůj email')
                ->addRule(UI\Form::EMAIL, "Špatný formát emailu");
        $form->addText('jmeno', 'Jméno*')
                ->setRequired('Zadej své jméno');
        $form->addText('prijmeni', 'Příjmení*')
                ->setRequired('Zadej své příjmení');
        $form->addPassword('heslo', 'Heslo*')
                ->setRequired('Zadej heslo')
                ->addRule(UI\Form::MIN_LENGTH, 'Heslo musí mít alespoň %d znaky', passwordLength);
        $form->addText('prezdivka', 'Přezdívka');
        $form->addText('telefon', 'Telefon')
                ->setType("number")
                ->addRule(UI\Form::LENGTH, 'Číslo musí mít %d znaky', 9)
                ->addRule(UI\Form::NUMERIC, 'Telefoní číslo musí obsahovat pouze číslice');
        $form->addText('vek', 'Věk')
                ->setType("number")
                ->addRule(UI\Form::NUMERIC, 'Věk musí obsahovat pouze číslice');
        $form->addText('mesto', 'Město');
        $form->addText('ulice', 'Ulice');
        $form->addText('cp', 'Číslo popisné');
        $form->addText('tel_cislo', 'Telefon na pokoji*')
                ->setType("number")
                ->setRequired("Nevyplnil jsi číslo kolejního telefonu")
                ->addRule(UI\Form::LENGTH, 'Číslo musí mít %d znaky', 4)
                ->addRule(UI\Form::NUMERIC, 'Věk musí obsahovat pouze číslice');
        $form->addSelect('budova', 'Budova*', array("A" => "A", "B" => "B", "C" => "C", "D" => "D", "E" => "E", "F" => "F"))
                ->setPrompt("Vyber budovu kolejí")
                ->setRequired("Nevyplnil jsi budovu");
        $form->addText('pokoj', 'Pokoj*')
                ->setType("number")
                ->setRequired("Nevyplnil jsi číslo pokoje")
                ->addRule(UI\Form::NUMERIC, 'Číslo pokoje musí obsahovat pouze číslice');
        $form->addText('patro', 'Patro*')
                ->setType("number")
                ->setRequired("Nevyplnil jsi patro")
                ->addRule(UI\Form::NUMERIC, 'Patro musí obsahovat pouze číslice');

        $form->addSubmit('send', 'Zaregistrovat se');
        $form->onSuccess[] = $this->registrationSucceeded;
        return $form;
    }

    public function registrationSucceeded($form, $values) {
        $this->login->save($values);
        $this->flashMessage("Tvůj účet byl vytvořen, můžeš se přihlásit");
        $this->redirect("Homepage:");
    }

}
