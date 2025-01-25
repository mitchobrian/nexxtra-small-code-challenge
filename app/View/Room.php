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
                <?php if (!empty($c->selected_card)) {
                    ?>
                    <div>
                        You have selected the card <?= $c->selected_card ?>
                    </div>
                    <div>
                        Waiting for other users ... (polling mode via js)
                    </div>
                    <?php
                }
                else {
                    ?>
                    <form id="rooms-form" method="post" action="/room?id=<?= $c->roomId ?>">
                        choose a card
                        <div class="form-floating mb-3">
                            <select class="form-select" id="sel_card" name="sel_card" aria-label="Select Card">
                                <?php
                                foreach ($c->pokerCard->card_options as $index => $card) {
                                    ?>
                                    <option value="<?= $index ?>"><?= $card ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <label for="sel_card">Select Card</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="submit" class="btn btn-primary" name="card_submit" value="submit card">
                        </div>
                    </form>
                    <?php
                }
                ?>
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
