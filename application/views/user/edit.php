<style>
    .holder {
        height: 120px;
        width: 120px;
        border: 2px solid black;
    }

    img {
        max-width: 36px;
        max-height: 36px;
        min-width: 36px;
        min-height: 36px;
    }

    input[type="file"] {
        margin-top: 5px;
    }

    .heading {
        font-family: Montserrat;
        font-size: 45px;
        color: green;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/Users/update', [
                    'autocomplete' => false, 'id' => 'edit_user', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('user'),'id'=> $Userr->id])
                ?>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="first_name">First Name</label>
                        <input class="form-control" type="text" Placeholder="First Name" name="first_name" id="first_name" value="<?= $Userr->first_name ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="last_name">Last Name</label>
                        <input class="form-control" type="text" Placeholder="Last Name" name="last_name" id="last_name" value="<?= $Userr->last_name ?>"  required >
                    </div>
                    <div class="col-md-4">
                        <label for="mobile">Mobile</label>
                        <input class="form-control" type="text" Placeholder="Mobile" name="mobile" id="mobile" value="<?= $Userr->mobile ?>">
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-6">
                        <label for="email">Email Address</label>
                        <input class="form-control" type="email" Placeholder="Email" name="email" id="email" value="<?= $Userr->email ?>" required >
                    </div>
                    <div class="col-md-6">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" Placeholder="Password" name="password" id="password" value="<?= $Userr->password ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" required>
                            <option value="" selected>-Select Status-</option>
                            <?php
                            $statusOptions = [
                                1 => 'Free user',
                                2 => 'Active Paid',
                                3 => 'Social user',
                                4 => 'Demo user'
                            ];
                            foreach ($statusOptions as $id => $option) :
                                if($id == $Userr->status  ){
                                    $selected = 'selected';
                                }else{
                                    $selected= '';
                                }
                            ?>
                                <option value="<?= $id ?>"  <?= $selected ?>><?= $option ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="expiry_date">Expiry Date</label>
                        <input class="form-control" type="date" name="expiry_date" id="expiry_date" value="<?= $Userr->expiry_date ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="product_count">Product Count</label>
                        <select class="form-control select2" name="product_count" required>
                            <option value="">-Select Product Count-</option>
                            <?php for ($i = 1; $i <= 100; $i++) :
                                if($i == $Userr->product_count  ){
                                    $selected = 'selected';
                                }else{
                                    $selected= '';
                                } ?>
                                <option value="<?= $i ?>" <?= $selected ?>><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>


            </div>
            <div class="form-group mb-2">
                <div class="col-md-6">
                    <?php
                    echo form_submit('submit', 'Update', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                    ?>
                    <a href="<?= base_url('backend/Users') ?>" class="btn btn-secondary waves-effect">Cancel</a>
                </div>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
    </div><!-- end col -->
</div>