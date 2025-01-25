<?php
namespace App\View;
use App\Controller\Home;
use Nscc\Core\View\View;
$c = new Home();
echo View::header("Scrum Poker Board - Room");
echo View::bodyOpen();
?>
<style>

</style>
<section>
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <h1>
                    Scrum Poker Board
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a href="" class="btn btn-primary">
                    lets go to the rooms !
                </a>
            </div>
            <div class="col-6">
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
            </div>
        </div>
    </div>
</section>
<?php
echo View::bodyClose();
echo View::footer();
?>
