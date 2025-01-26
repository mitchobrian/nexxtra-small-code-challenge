<?php

include __DIR__ . '/vendor/autoload.php';

use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\ErrorHandler\ErrorHandler;
use Symfony\Component\ErrorHandler\DebugClassLoader;
use Nscc\PokerRoom\Migration\Migration as PokerRoomMigration;
use Nscc\PokerRoomSession\Migration\Migration as PokerRoomSessionMigration;

///////////////////////////////////////////////////////////////
/// DEBUG
Debug::enable();

///////////////////////////////////////////////////////////////
/// MIGRATION
///
new PokerRoomMigration()->migrate();
new PokerRoomSessionMigration()->migrate();

///////////////////////////////////////////////////////////////
/// SESSION
///
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

///////////////////////////////////////////////////////////////
/// ROUTES
///
\App\Routes\Routes::initRoutes();

exit();
?>
