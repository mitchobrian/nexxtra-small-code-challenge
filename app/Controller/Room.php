<?php

namespace App\Controller;

use Nscc\Core\Controller\AbstractController;
use Nscc\PokerCard\PokerCard;
use Nscc\PokerRoom\PokerRoom;
use Nscc\PokerUser\PokerUser;
use Nscc\PokerRoomSession\PokerRoomSession;
use Nscc\PokerRoomSession\PokerRoomSessionObj;
use Symfony\Component\HttpFoundation\Request;

class Room extends AbstractController
{
    private PokerRoom $pokerRoom;
    private PokerRoomSession $pokerRoomSession;
    public PokerUser $pokerUser;
    public PokerCard $pokerCard;
    public ?object $room;
    public int $roomId;
    public array $sessionData = [];
    public ?object $sessionDataFromUser;
    public string $selected_card = "";


    public function init (): void {
        try {
            $this->pokerRoom = new PokerRoom();
            $this->pokerUser = new PokerUser();
            $this->pokerRoomSession = new PokerRoomSession();
            $this->pokerCard = new PokerCard();

            $this->getRoomId();
            $this->getRoom();
            $this->onEnterRoom();
            $this->onSubmit();


        }
        catch (\Exception $e) {
            // todo: log $e->getMessage();
            dump("something went wrong" . $e->getMessage() . $e->getTraceAsString());
            exit();
        }
    }

    private function getRoom (): void {
        $this->room = $this->pokerRoom->getById($this->roomId);
    }

    private function onEnterRoom (): void {

        $this->sessionDataFromUser = $this->pokerRoomSession->getByRoomIdAndUserName(
            $this->roomId,
            $this->pokerUser->getUsername()
        );

        if (empty($this->sessionDataFromUser)) {
            $this->insertNewPokerSession();
        }
        else {
            $this->selected_card = $this->sessionDataFromUser->card_index;
        }

        $this->sessionData = $this->pokerRoomSession->getAllByRoomId($this->roomId);
    }

    private function insertNewPokerSession (): void {
        $input = [
            'poker_room_id' => $this->roomId,
            'user_name' => $this->pokerUser->getUsername()
        ];
        $this->pokerRoomSession->insert($input);
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

        $this->selected_card = $card;

        $this->pokerRoomSession->updateCardIndex(
            $this->selected_card,
            $this->sessionDataFromUser->id
        );

        header('Location: Refresh:0');

    }
}