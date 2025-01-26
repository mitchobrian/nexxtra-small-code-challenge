<?php


namespace Nscc\PokerUser;

class PokerUser
{

    private $session_key = "user_name";

    public function isUserNameSet (): bool {
        return !empty($_SESSION[$this->session_key]);
    }

    public function getUserName (): string {
        return $_SESSION[$this->session_key];
    }

    public function setUserName (string $user_name): void {
        $_SESSION[$this->session_key] = $user_name;
    }

}

