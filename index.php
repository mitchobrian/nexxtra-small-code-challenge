<?php

include __DIR__ . '/vendor/autoload.php';


use \Nscc\PokerUser\Migration\Migration as PokerUserMigration;
use Nscc\PokerRoom\Migration\Migration as PokerRoomMigration;
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
