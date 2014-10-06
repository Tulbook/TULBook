<?php

namespace App\Presenters;

use Nette,
    App\Model;



/**
 * Description of RegistrationPresenter
 *
 * @author Vojta
 */
class RegistrationPresenter extends BasePresenter{
    /**
     * Sign-in form factory.
     * @return Nette\Application\UI\Form
     */
    public function renderDefault(){
        
    }
    
    /**
     * Sign-in form factory.
     * @return Nette\Application\UI\Form
     */
    protected function createComponentRegistrationForm() {
        $form = new Nette\Application\UI\Form;
        $form->addText('email', 'Email')
                ->setRequired('Zadej prosím svůj email.');
        $form->addText('jmeno','Jméno')
                ->setRequired('Zadej své jméno');
        $form->addText('prijmeni','Příjmení')
                ->setRequired('Zadej své příjmení');
        $form->addText('prezdivka','Přezdívka');
        $form->addText('telefon','Mobilní telefon');
        $form->addText('vek','Věk');
        //$form->addText('colleageBuilding','Budova kolejí:');
        $form->addSelect('budova', 'Budova kolejí', array("A"=>"A","B"=>"B","C"=>"C","D"=>"D","E"=>"E","F"=>"F"));
        $form->addText('pokoj','Buňka:');
        $form->addText('tel_cislo','Číslo kolejního telefonu');
        $form->addText('patro','Patro');
        $form->addText('mesto','Město');
        $form->addText('ulice','Ulice');
        $form->addText('cp','Číslo popisné');
        $form->addPassword('heslo', 'Heslo')
                ->setRequired('Zadej prosím heslo.');
        $form->addSubmit('send', 'Přihlásit se');
        $form->onSuccess[] = $this->signInFormSucceeded;
        return $form;
    }

    public function signInFormSucceeded($form, $values) {
        try {
            $this->getUser()->login($values->username, $values->password);
            $this->redirect('Homepage:');
        } catch (Nette\Security\AuthenticationException $e) {
            $form->addError($e->getMessage());
        }
    }
}


