<?php

namespace App\Presenters;

use Nette,
    App\Model;

/**
 * Sign in/out presenters.
 */
class SignPresenter extends BasePresenter {

    public function renderDefault(){
        
    }
    
    /**
     * Sign-in form factory.
     * @return Nette\Application\UI\Form
     */
    protected function createComponentSignInForm() {
        $form = new Nette\Application\UI\Form;
        $form->addText('email', 'Email')
                ->setRequired('Zadej prosím svůj email.');
        $form->addPassword('heslo', 'Heslo')
                ->setRequired('Zadej prosím heslo.');
        $form->addSubmit('send', 'Přihlásit se');
        $form->onSuccess[] = $this->signInFormSucceeded;
        return $form;
    }

    public function signInFormSucceeded($form, $values) {
        try {
            $this->getUser()->login($values->email, $values->heslo);
            $this->redirect('Homepage:');
        } catch (Nette\Security\AuthenticationException $e) {
            $form->addError($e->getMessage());
        }
    }

    public function actionOut() {
        $this->getUser()->logout();
        $this->flashMessage('You have been signed out.');
        $this->redirect('in');
    }

}
