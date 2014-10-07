<?php

namespace App;

use Nette,
    Nette\Application\Routers\RouteList,
    Nette\Application\Routers\Route,
    Nette\Application\Routers\SimpleRouter;

/**
 * Router factory.
 */
class RouterFactory {

    /**
     * @return \Nette\Application\IRouter
     */
    public function createRouter() {
        $router = new RouteList();
          $router[] = new Route('<presenter>/<action>[/<id>]', array(
            'presenter' => array(
                Route::VALUE => 'Homepage',
                Route::FILTER_TABLE => array(
                    "prihlaseni" => "Sign",
                    "registrace" => "Registration",
                ),
            ),
            'action' => 'default',
            'id' => NULL,
        ));
        return $router;
    }

}
