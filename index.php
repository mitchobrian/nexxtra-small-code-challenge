<?php

include __DIR__ . '/vendor/autoload.php';

use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\ErrorHandler\ErrorHandler;
use Symfony\Component\ErrorHandler\DebugClassLoader;
use \Nscc\PokerUser\Migration\Migration as PokerUserMigration;
use Nscc\PokerRoom\Migration\Migration as PokerRoomMigration;

///////////////////////////////////////////////////////////////
/// DEBUG
Debug::enable();

///////////////////////////////////////////////////////////////
/// MIGRATION
///
new PokerUserMigration()->migrate();
new PokerRoomMigration()->migrate();

///////////////////////////////////////////////////////////////
/// ROUTES
///
\App\Routes\Routes::initRoutes();

exit();
?>
