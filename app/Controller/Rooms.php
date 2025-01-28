<?php

namespace App\Controller;

use Nscc\Core\Controller\AbstractController;
use Nscc\PokerRoom\PokerRoom;
use Nscc\PokerUser\PokerUser;
use Symfony\Component\HttpFoundation\Request;

class Rooms extends AbstractController
{

    private PokerRoom $pokerRoom;
    public Pokeruser $pokerUser;

    public array $all_rooms = [];

    public function init () {
        try {
            $this->pokerRoom = new PokerRoom();
            $this->pokerUser = new PokerUser();
            $this->onSubmitRoom();
            $this->onSubmitName();
            $this->all_rooms = $this->pokerRoom->getAll();
        }
        catch (\Exception $e) {
            // todo: log $e->getMessage();
            //dump("something went wrong" . $e->getMessage() . $e->getTraceAsString());
            exit();
        }
    }

    private function onSubmitRoom (): void {
        $request = Request::createFromGlobals();
        $action = $request->get('room_submit');
        $room_name = $request->get('room_name');

        if (empty($action) || empty($room_name)) return;

        $this->pokerRoom->insert([
            'room_name' => $room_name
        ]);
    }

    private function onSubmitName (): void {
        $request = Request::createFromGlobals();
        $action = $request->get('name_submit');
        $name = $request->get('user_name');

        if (empty($action) || empty($name)) return;


        if (!$this->pokerUser->isUserNameSet()) {
            $this->pokerUser->setUserName($name);
        }

    }


}