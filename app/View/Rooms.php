<?php
namespace App\View;
use App\Controller\Rooms;
use Nscc\Core\View\View;
$c = new Rooms();
$c->init();
echo View::header("Scrum Poker Board - Rooms");
echo View::bodyOpen();
?>
<style>

</style>
<section>
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <h1>
                    Scrum Poker Rooms
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form id="rooms-form" method="post" action="/rooms">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="room_name" name="room_name" placeholder="Room Name">
                        <label for="room_name">Room Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="submit" name="room_submit" value="create new room">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
echo View::bodyClose();
echo View::footer();
?>
