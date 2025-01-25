<?php

namespace App\Controller;

use Nscc\Core\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class Rooms extends AbstractController
{

    public function init () {
        $this->onSubmit();
    }

    private function onSubmit () {
        $request = Request::createFromGlobals();
        $action = $request->get('action');
        $all  = $request->request->all();
        dump($all);
    }


}