<?php
namespace App\View;
use App\Controller\Rooms;
use Nscc\Core\View\View;
use PokerRoomSessionObj;

$c = new Rooms();
$c->init();
echo View::header("Scrum Poker Board - Rooms");
echo View::bodyOpen();
?>
<style>
    .rooms-list {
        border: 1px solid gray;
        border-radius: 15px;
        padding: 1rem;
    }
</style>
<section>
    <div class="container">
        <div class="row mb-3">
            <div class="col-10">
                <h1>
                    Scrum Poker Rooms
                </h1>
            </div>
            <div class="col-2">
                <a href="/" class="btn btn-secondary">
                    back to home
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <form id="rooms-form" method="post" action="/rooms">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="room_name" name="room_name" placeholder="Room Name">
                        <label for="room_name">Room Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="submit" class="btn btn-primary" name="room_submit" value="create new room">
                    </div>
                </form>

                <?php if (!$c->pokerUser->isUserNameSet()) { ?>
                    <form id="name-form" method="post" action="/rooms">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name">
                            <label for="user_name">User Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="submit" class="btn btn-primary" name="name_submit" value="submit name">
                        </div>
                    </form>
                <?php }
                else {
                    ?>
                        <div>
                            <label>
                                Username: <?= $c->pokerUser->getUserName() ?>
                            </label>

                        </div>
                    <?
                }
                ?>

            </div>


            <?php if ($c->pokerUser->isUserNameSet()) { ?>
            <div class="col-8 rooms-list">
                <div>
                    Available Rooms
                </div>
                <div>
                    <?php
                    /* @var $room PokerRoomObj */
                    foreach ($c->all_rooms as $room) {
                        ?>
                        <div>
                            <a href="/room?id=<?= $room->id ?>">
                                <?= $room->room_name ?>
                            </a>
                        </div>
                        <?
                    }
                    ?>
                </div>
            </div>
            <?php }
            else {
                ?>
                <div class="col-8 rooms-list">
                    <div> please set username first to enter a room</div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<?php
echo View::bodyClose();
echo View::footer();
?>
