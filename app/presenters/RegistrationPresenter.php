<?php

namespace App\Presenters;

use Nette,
    App\Model,
    Nette\Application\UI;

/**
 * Description of RegistrationPresenter
 *
 * @author Vojta
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

        $form->addText('email', 'Email')
                ->setRequired('Zadej prosím svůj email.');
        $form->addText('jmeno', 'Jméno')
                ->setRequired('Zadej své jméno');
        $form->addText('prijmeni', 'Příjmení')
                ->setRequired('Zadej své příjmení');
        $form->addPassword('heslo', 'Heslo:')
                ->setRequired('Zadej heslo')
                ->addRule(UI\Form::MIN_LENGTH, 'Heslo musí mít alespoň %d znaky', passwordLength);
        $form->addText('prezdivka', 'Přezdívka');
        $form->addText('telefon', 'Mobilní telefon')
                ->addRule(UI\Form::LENGTH, 'Číslo musí mít %d znaky', 9)
                ->addRule(UI\Form::NUMERIC, 'Číslo musí obsahovat pouze číslice');
        $form->addText('vek', 'Věk');
        $form->addText('mesto', 'Město');
        $form->addText('ulice', 'Ulice');
        $form->addText('cp', 'Číslo popisné');
        $form->addText('tel_cislo', 'Číslo kolejního telefonu')
                ->addRule(UI\Form::LENGTH, 'Číslo musí mít %d znaky', 4)
                ->addRule(UI\Form::PATTERN, 'Musí obsahovat číslici', '.*[0-9].*');
        $form->addSelect('budova', 'Budova kolejí', array("A" => "A", "B" => "B", "C" => "C", "D" => "D", "E" => "E", "F" => "F"));
        $form->addText('pokoj', 'Pokoj:');
        $form->addText('patro', 'Patro');

        $form->addSubmit('send', 'Zaregistrovat se');
        $form->onSuccess[] = $this->loginSucceeded;
        return $form;
    }

    public function loginSucceeded($form, $values) {
        $this->login->save($values);
        $this->flashMessage("Zaregistrováno");
        $this->redirect("this");
    }

}
