<?php

namespace App\Controller;

use Nscc\Core\Controller\AbstractController;
use Nscc\PokerRoom\PokerRoom;
use Symfony\Component\HttpFoundation\Request;

class Room extends AbstractController
{
    private PokerRoom $pokerRoom;
    public ?object $room;
    public int $roomId;

    public function init () {
        try {
            $this->getRoomId();
            $this->pokerRoom = new PokerRoom();
            $this->room = $this->pokerRoom->getById($this->roomId);
            dump($this->room);
        }
        catch (\Exception $e) {
            // todo: log $e->getMessage();
            dump("something went wrong" . $e->getMessage() . $e->getTraceAsString());
            exit();
        }
    }

    private function getRoomId () {
        $request = Request::createFromGlobals();
        $this->roomId = (int) $request->query->get('id', 0);

        if (empty($this->roomId)) {
            throw new \Exception("room id not set");
        }

    }
}