<div class="row">
    <div class="col-xl-3 col-md-6">
        <a href="<?= base_url('backend/Workers')?>">
            <div class="card bg_dasbord_box mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4"><img src="<?= base_url("assets/images/coin.png") ?>"
                                alt=""></div>
                        <h5 class="font-14 text-uppercase mt-0 text-white-50">Workers</h5>
                        <h4 class="font-500"><?= count($Products) ?></h4>
                        <!-- <div class="mini-stat-label bg-success">
                                    <p class="mb-0">+ 12%</p>
                                 </div>  -->
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- <div class="col-xl-3 col-md-6">
        <a href="<?= base_url('backend/Reports')?>">
            <div class="card bg_dasbord_box mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4"><img src="<?= base_url("assets/images/coin.png") ?>"
                                alt=""></div>
                        <h5 class="font-14 text-uppercase mt-0 text-white-50">Todays Sale</h5>
                        <h4 class="font-500"><?= $TodaysSale->total ?></h4>
                       
                    </div>
                </div>
            </div>
        </a>
    </div> -->

  

    <!-- end row -->
</div>
<!-- container-fluid -->
</div>
<script>
function ChangeStatus(status) {
    jQuery.ajax({
        url: "<?= base_url('backend/setting/ChangeJackpotStatus') ?>",
        type: "POST",
        data: {
            'status': status
        },
        success: function(data) {
            if (data) {
                alert('Successfully Change status');
            }
            location.reload();
        }
    });
}

function ChangeRummyBotStatus(status) {
    jQuery.ajax({
        url: "<?= base_url('backend/setting/ChangeRummyBotStatus') ?>",
        type: "POST",
        data: {
            'status': status
        },
        success: function(data) {
            if (data) {
                alert('Successfully Change status');
            }
            location.reload();
        }
    });
}

function ChangeTeenpattiBotStatus(status) {
    jQuery.ajax({
        url: "<?= base_url('backend/setting/ChangeTeenpattiBotStatus') ?>",
        type: "POST",
        data: {
            'status': status
        },
        success: function(data) {
            if (data) {
                alert('Successfully Change status');
            }
            location.reload();
        }
    });
}
</script>