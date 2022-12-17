<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#wins">Wins</a></li>
                    <li><a data-toggle="tab" href="#purchase">Purchase</a></li>
                    <li><a data-toggle="tab" href="#reffer">Reffer Earn</a></li>
                    <li><a data-toggle="tab" href="#purchase_reffer">Purchase Reffer</a></li>
                    <li><a data-toggle="tab" href="#welcome_reffer">Welcome Reffer</a></li>
                    <li><a data-toggle="tab" href="#wallet_log">Wallet Log</a></li>
                    <?php if (RUMMY_HISTORY==true) { ?>
                    <li><a data-toggle="tab" href="#rummy_log">Point Rummy Log</a></li>
                    <?php } ?>
                    <?php if (RUMMY_POOL==true) { ?>
                    <li><a data-toggle="tab" href="#pool_log">Pool Rummy Log</a></li>
                    <?php } ?>
                    <?php if (RUMMY_DEAL_HISTORY==true) { ?>
                    <li><a data-toggle="tab" href="#deal_log">Deal Rummy Log</a></li>
                    <?php } ?>
                    <?php if (TEENPATTI==true) { ?>
                    <li><a data-toggle="tab" href="#3patti_log">Teen Patti Log</a></li>
                    <?php } ?>
                    <?php if (DRAGON_TIGER_HISTORY==true) { ?>
                    <li><a data-toggle="tab" href="#dragon_log">Dragon Tiger Log</a></li>
                    <?php } ?>
                    <?php if (ANDER_BAHAR_HISTORY==true) { ?>
                    <li><a data-toggle="tab" href="#ander_log">Ander Bahar Log</a></li>
                    <?php } ?>
                    <?php if (SEVEN_UP_DOWN_HISTORY==true) { ?>
                    <li><a data-toggle="tab" href="#seven_up">Seven Up Log</a></li>
                    <?php } ?>
                    <?php if (COLOR_PREDICTION_HISTORY==true) { ?>
                    <li><a data-toggle="tab" href="#color_prediction">Color Prediction Log</a></li>
                    <?php } ?>
                    <?php if (CAR_ROULETTE_HISTORY==true) { ?>
                    <li><a data-toggle="tab" href="#car_roulette">Car Roulette Log</a></li>
                    <?php } ?>
                    <?php if (ANIMAL_ROULETTE_HISTORY==true) { ?>
                    <li><a data-toggle="tab" href="#animal_roulette">Animal Roulette Log</a></li>
                    <?php } ?>
                    <?php if (JACKPOT_HISTORY==true) { ?>
                    <li><a data-toggle="tab" href="#jackpot">Jackpot Log</a></li>
                    <?php } ?>
                    <?php if (LUDO==true) { ?>
                    <li><a data-toggle="tab" href="#ludoHistory">Ludo Log</a></li>
                    <?php } ?>
                </ul>
                <div class="tab-content">
                    <br>
                    <div id="wins" class="tab-pane fade in active">
                        <table class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Game ID</th>
                                    <th>Amount</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($AllWins as $key => $Game) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $Game->id ?></td>
                                    <td><?= $Game->amount ?></td>
                                    <td><?= date("d-m-Y", strtotime($Game->added_date)) ?></td>
                                </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <div id="purchase" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Plan ID</th>
                                    <th>Coins</th>
                                    <th>Price</th>
                                    <th>Payment Status</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($AllPurchase as $key => $Purchase) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $Purchase->plan_id ?></td>
                                    <td><?= $Purchase->coin ?></td>
                                    <td><?= $Purchase->price ?></td>
                                    <td><?= ($Purchase->payment == 0) ? 'Pending' : 'Done' ?></td>
                                    <td><?= date("d-m-Y", strtotime($Purchase->added_date)) ?></td>
                                </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <div id="reffer" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>User Name</th>
                                    <th>Coins</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($AllReffer as $key => $Reffer) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $Reffer->name ?></td>
                                    <td><?= $Setting->referral_amount?></td>
                                    <td><?= date("d-m-Y", strtotime($Reffer->added_date)) ?></td>
                                </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <div id="purchase_reffer" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>User Name</th>
                                    <th>Coins</th>
                                    <th>Level</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($AllPurchase_Reffer as $key => $Reffer) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $Reffer->name ?></td>
                                    <td><?= $Reffer->coin?></td>
                                    <td><?= $Reffer->level?></td>
                                    <td><?= date("d-m-Y", strtotime($Reffer->added_date)) ?></td>
                                </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <div id="welcome_reffer" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>User Name</th>
                                    <th>Coins</th>
                                    <th>Level</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($AllWelcome_Reffer as $key => $Reffer) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $Reffer->name ?></td>
                                    <td><?= $Reffer->coin?></td>
                                    <td><?= $Reffer->level?></td>
                                    <td><?= date("d-m-Y", strtotime($Reffer->added_date)) ?></td>
                                </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <div id="wallet_log" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Amount</th>
                                    <th>Bonus</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($AllWalletLog as $key => $WalletLog) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $WalletLog->coin?></td>
                                    <td><?= ($WalletLog->bonus)?'Yes':'No'; ?></td>
                                    <td><?= date("d-m-Y H:i:s", strtotime($WalletLog->added_date)) ?></td>
                                </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <?php if (RUMMY_HISTORY==true) { ?>
                    <div id="rummy_log" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Game ID</th>
                                    <th>User Id</th>
                                    <th>Amount</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($RummyLog as $key => $rummy) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $rummy->game_id ?></td>
                                    <td><?= $rummy->user_id ?></td>
                                    <td><?= $rummy->amount ?></td>
                                    <td><?= date("d-m-Y", strtotime($rummy->added_date)) ?></td>
                                </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                    <?php if (RUMMY_POOL==true) { ?>
                    <div id="pool_log" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Game ID</th>
                                    <th>User Id</th>
                                    <th>Amount</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($RummyPool as $key => $pool) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $pool->game_id ?></td>
                                    <td><?= $pool->user_id ?></td>
                                    <td><?= $pool->amount ?></td>
                                    <td><?= date("d-m-Y", strtotime($pool->added_date)) ?></td>
                                </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                    <?php if (RUMMY_DEAL_HISTORY==true) { ?>
                    <div id="deal_log" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Game ID</th>
                                    <th>User Id</th>
                                    <th>Amount</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($RummyDeal as $key => $deal) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $deal->game_id ?></td>
                                    <td><?= $deal->user_id ?></td>
                                    <td><?= $deal->amount ?></td>
                                    <td><?= date("d-m-Y", strtotime($deal->added_date)) ?></td>
                                </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                    <?php if (TEENPATTI==true) { ?>
                    <div id="3patti_log" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Game ID</th>
                                    <th>Invest</th>
                                    <th>Winning Amount</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($TeenPattiLog as $key => $teen) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $teen->game_id ?></td>
                                    <td><?= $teen->invest ?></td>
                                    <td><?= $teen->winning_amount ?></td>
                                    <td><?= date("d-m-Y", strtotime($teen->added_date)) ?></td>
                                </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                    <?php if (DRAGON_TIGER_HISTORY==true) { ?>
                    <div id="dragon_log" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Game ID</th>
                                    <th>User Id</th>
                                    <th>Bet</th>
                                    <th>Amount</th>
                                    <th>Winning Amount</th>
                                    <th>User Amount</th>
                                    <th>Comission Amount</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($DragonWalletAmount as $key => $dragon) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $dragon->dragon_tiger_id ?></td>
                                    <td><?= $dragon->user_id ?></td>
                                    <td><?= $dragon->bet ?></td>
                                    <td><?= $dragon->amount ?></td>
                                    <td><?= $dragon->winning_amount ?></td>
                                    <td><?= $dragon->user_amount ?></td>
                                    <td><?= $dragon->comission_amount ?></td>
                                    <td><?= date("d-m-Y", strtotime($dragon->added_date)) ?></td>
                                </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                    <?php if (ANDER_BAHAR_HISTORY==true) { ?>
                    <div id="ander_log" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Game ID</th>
                                    <th>User Id</th>
                                    <th>Bet</th>
                                    <th>Amount</th>
                                    <th>Winning Amount</th>
                                    <th>User Amount</th>
                                    <th>Comission Amount</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($WalletAmount as $key => $ander_baher) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $ander_baher->ander_baher_id ?></td>
                                    <td><?= $ander_baher->user_id ?></td>
                                    <td><?= $ander_baher->bet ?></td>
                                    <td><?= $ander_baher->amount ?></td>
                                    <td><?= $ander_baher->winning_amount ?></td>
                                    <td><?= $ander_baher->user_amount ?></td>
                                    <td><?= $ander_baher->comission_amount ?></td>
                                    <td><?= date("d-m-Y", strtotime($ander_baher->added_date)) ?></td>
                                </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                    <?php if (SEVEN_UP_DOWN_HISTORY==true) { ?>
                    <div id="seven_up" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Game Id</th>
                                    <th>User Id</th>
                                    <th>Bet</th>
                                    <th>Amount</th>
                                    <th>Winning Amount</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($SevenUpAmount as $key => $seven) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $seven->seven_up_id ?></td>
                                    <td><?= $seven->user_id ?></td>
                                    <td><?= $seven->bet ?></td>
                                    <td><?= $seven->amount ?></td>
                                    <td><?= $seven->winning_amount ?></td>
                                    <td><?= date("d-m-Y", strtotime($seven->added_date)) ?></td>
                                </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                    <?php if (COLOR_PREDICTION_HISTORY==true) { ?>
                    <div id="color_prediction" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Game Id</th>
                                    <th>User Id</th>
                                    <th>Bet</th>
                                    <th>Amount</th>
                                    <th>Winning Amount</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($ColorPrediction as $key => $color) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $color->color_prediction_id ?></td>
                                    <td><?= $color->user_id ?></td>
                                    <td><?= $color->bet ?></td>
                                    <td><?= $color->amount ?></td>
                                    <td><?= $color->winning_amount ?></td>
                                    <td><?= date("d-m-Y", strtotime($color->added_date)) ?></td>
                                </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                    <?php if (CAR_ROULETTE_HISTORY==true) { ?>
                    <div id="car_roulette" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Game Id</th>
                                    <th>User Id</th>
                                    <th>Bet</th>
                                    <th>Amount</th>
                                    <th>Winning Amount</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($CarRoulette as $key => $car) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $car->car_roulette_id ?></td>
                                    <td><?= $car->user_id ?></td>
                                    <td><?= $car->bet ?></td>
                                    <td><?= $car->amount ?></td>
                                    <td><?= $car->winning_amount ?></td>
                                    <td><?= date("d-m-Y", strtotime($car->added_date)) ?></td>
                                </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                    <?php if (ANIMAL_ROULETTE_HISTORY==true) { ?>
                    <div id="animal_roulette" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Game Id</th>
                                    <th>User Id</th>
                                    <th>Bet</th>
                                    <th>Amount</th>
                                    <th>Winning Amount</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($AnimalRoulette as $key => $animal) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $animal->animal_roulette_id ?></td>
                                    <td><?= $animal->user_id ?></td>
                                    <td><?= $animal->bet ?></td>
                                    <td><?= $animal->amount ?></td>
                                    <td><?= $animal->winning_amount ?></td>
                                    <td><?= date("d-m-Y", strtotime($animal->added_date)) ?></td>
                                </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                    <div id="jackpot" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Game ID</th>
                                    <th>User Id</th>
                                    <th>Bet</th>
                                    <th>Amount</th>
                                    <th>Winning Amount</th>
                                    <th>User Amount</th>
                                    <th>Comission Amount</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($Jackpot as $key => $jackpot) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $jackpot->jackpot_id ?></td>
                                    <td><?= $jackpot->user_id ?></td>
                                    <td><?= $jackpot->bet ?></td>
                                    <td><?= $jackpot->amount ?></td>
                                    <td><?= $jackpot->winning_amount ?></td>
                                    <td><?= $jackpot->user_amount ?></td>
                                    <td><?= $jackpot->comission_amount ?></td>
                                    <td><?= date("d-m-Y", strtotime($jackpot->added_date)) ?></td>
                                </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <?php if (LUDO==true) { ?>
                    <div id="ludoHistory" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                <th>Sr. No.</th>
                                    <th>Game ID</th>
                                    <th>User Id</th>
                                    <th>Amount</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($Ludos as $key => $ludo) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $ludo->ludo_table_id ?></td>
                                    <td><?= $ludo->winner_id ?></td>
                                    <td><?= $ludo->amount ?></td>
                                    <td><?= date("d-m-Y", strtotime($ludo->added_date)) ?></td>
                                </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>

<script>
$(document).ready(function() {
    $('.table').dataTable({
        dom: 'Bfrtip',
        "buttons": [
            'excel'
        ]
    });
})
</script>