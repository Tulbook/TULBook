<?php

namespace App\Controls;
use Nette\Application\UI;

/**
 * Komponenta pro přihlašování pomocí facebooku.
 * @author Vladimír Antoš
 * @version 1.0
 */
class FacebookLoginControl extends UI\Control{
    
    /**
     * @var \Illagrenan\Facebook\FacebookConnect
     */
    private $facebookConnect;
    
    public function __construct(\Illagrenan\Facebook\FacebookConnect $facebook) {
        $this->facebookConnect = $facebook;
    }
    
    public function render(){
           if ($this->facebookConnect->isLoggedIn() === FALSE) {
            // Volitelně můžeme změnit URL, na kterou bude uživatel z Facebooku navrácen
            // Přijímá buď nette zápis odkazů nebo absolutní URL
            $this->facebookConnect->setRedirectUri("Homepage:default");
            // Přihlásíme ho přesměrováním na Login_URL
            $this->facebookConnect->login();
        } else { // Uživatel je přihlášený v aplikaci
            /* @var $user Illagrenan\Facebook\FacebookUser */
            $user = $this->facebookConnect->getFacebookUser();
            $this->template->user = $user;
        }
        $this->template->render(__DIR__ . "/fblogin.latte");
    }
    
    public function handleFacebookLogin() {
        $this->facebookConnect->login();
    }

}
