<?php

namespace App\Controller;

use Nscc\Core\Controller\AbstractController;
use Nscc\PokerCard\PokerCard;
use Nscc\PokerRoom\PokerRoom;
use Symfony\Component\HttpFoundation\Request;

class Room extends AbstractController
{
    private PokerRoom $pokerRoom;
    public ?object $room;
    public int $roomId;
    public PokerCard $pokerCard;
    public string $selected_card = "";

    public function init (): void {
        try {
            $this->getRoomId();
            $this->pokerRoom = new PokerRoom();
            $this->pokerCard = new PokerCard();
            $this->onSubmit();
            $this->room = $this->pokerRoom->getById($this->roomId);
        }
        catch (\Exception $e) {
            // todo: log $e->getMessage();
            dump("something went wrong" . $e->getMessage() . $e->getTraceAsString());
            exit();
        }
    }

    private function getRoomId (): void {
        $request = Request::createFromGlobals();
        $this->roomId = (int) $request->query->get('id', 0);

        if (empty($this->roomId)) {
            throw new \Exception("room id not set");
        }
    }

    private function onSubmit (): void {
        $request = Request::createFromGlobals();
        $action = $request->get('card_submit');
        $card = $request->get('sel_card');

        if (empty($action) || empty($card)) return;

        $this->selected_card = $this->pokerCard->card_options[$card];

    }
}