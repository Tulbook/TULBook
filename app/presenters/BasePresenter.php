<?php

namespace App\Presenters;

use Nette,
    App\Model;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter {

    /**
     * @var \Nette\Security\Identity
     */
    protected $userIdentity;
    
    public function startup() {
        parent::startup();
        $this->userIdentity = $this->getUser()->identity;
    }

}
