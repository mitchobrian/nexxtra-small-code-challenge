<?php

namespace App\Controller;

use Nscc\Core\Controller\AbstractController;
use Nscc\PokerRoom\PokerRoom;
use Symfony\Component\HttpFoundation\Request;

class Rooms extends AbstractController
{

    private PokerRoom $pokerRoom;

    public array $all_rooms = [];

    public function init () {
        try {
            $this->pokerRoom = new PokerRoom();
            $this->onSubmit();
            $this->all_rooms = $this->pokerRoom->getAll();
        }
        catch (\Exception $e) {
            // todo: log $e->getMessage();
            dump("something went wrong" . $e->getMessage() . $e->getTraceAsString());
            exit();
        }
    }

    private function onSubmit (): void {
        $request = Request::createFromGlobals();
        $action = $request->get('room_submit');
        $room_name = $request->get('room_name');

        if (empty($action) || empty($room_name)) return;

        $this->pokerRoom->insert([
            'room_name' => $room_name
        ]);
    }

    private function getAllRooms () {
        return $this->pokerRoom->getAll();
    }


}