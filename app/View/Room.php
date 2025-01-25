<?php
namespace App\View;
use App\Controller\Room;
use Nscc\Core\View\View;

$c = new Room();
$c->init();
echo View::header("Scrum Poker Board - Room");
echo View::bodyOpen();
?>
<style>

</style>
<section>
    <div class="container">

        <div class="row mb-3">
            <div class="col-10">
                <h1>
                    Scrum Poker Board Room: <?= $c->room->room_name ?>
                </h1>
            </div>
            <div class="col-2">
                <a href="/rooms" class="btn btn-secondary">
                    back to rooms
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">

            </div>
            <div class="col-6">

            </div>
        </div>
    </div>
</section>
<?php
echo View::bodyClose();
echo View::footer();
?>
