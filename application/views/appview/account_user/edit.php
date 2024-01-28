<style>
    /* .holder {
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
    } */


    .user-type-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .user-type-table td {
        border: 1px solid #ccc;
        padding: 12px;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('app/User/update', [
                    'autocomplete' => false, 'id' => 'edit_user', 'method' => 'post'
                ], [
                    'type' => $this->url_encrypt->encode('app_tbl_user'),
                    'id' => $data->id
                ])
                ?>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="user_name">User Name</label>
                        <input class="form-control" type="user_name" value="<?= $data->user_name ?>" Placeholder="User Name" name="user_name" id="user_name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="mobile">Mobile</label>
                        <input class="form-control" type="tel" value="<?= $data->mobile ?>" Placeholder="Mobile" name="mobile" id="mobile" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="email">Email Address</label>
                        <input class="form-control" type="email" value="<?= $data->email ?>" Placeholder="Email" name="email" id="email" required>
                    </div>
                    <div class="col-md-6">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" value="<?= $data->password ?>" Placeholder="Password" name="password" id="password" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="user_type" class="col-md-12">Select Type Of User*</label>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="custom-radio">
                                <input type="radio" id="user_type_radio" name="user_type" value="1" <?= ($data->user_type == 1) ? 'checked' : '' ?>>
                                <label for="user_type_radio"></label>
                                <span class="radio-label">Super User</span>
                            </div>

                            <table class="user-type-table">
                                <tr>
                                    <td>Can view all information in assigned files.</td>
                                </tr>
                                <tr>
                                    <td>Can add, update, or delete any information.</td>
                                </tr>
                                <tr>
                                    <td>Can't add users, but can add, edit, or delete assistants.</td>
                                </tr>
                                <tr>
                                    <td>Can't delete files or contacts.</td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <div class="custom-radio">
                                <input type="radio" id="user_type_radio_2" name="user_type" value="2" <?= ($data->user_type == 2) ? 'checked' : '' ?>>
                                <label for="user_type_radio_2"></label>
                                <span class="radio-label">User</span>
                            </div>

                            <table class="user-type-table">
                                <tr>
                                    <td>Can view information only assigned to this user in assigned files.</td>
                                </tr>
                                <tr>
                                    <td>Can only add or update info. Deletion is not allowed to this type of user.</td>
                                </tr>
                                <tr>
                                    <td>Can't add users, but can add assistants.</td>
                                </tr>
                                <tr>
                                    <td>Can't delete anything.</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <br><br>

                <div class="form-group">
                    <div class="col-md-6 col-12">
                        <div class="row">
                            <div class="col-md-8 col-8">
                                <label for="Select Files to Share">Select Files to Share</label>
                            </div>
                            <div class="col-md-4 col-4">
                                <label for="Full">Full</label>
                            </div>
                        </div>

                        <div class="custom-checkbox">
                            <?php foreach ($AllFiles as $file) :
                                $checked = "";
                                $permission_checked = "";
                                foreach ($UserFiles as $key => $value) {

                                    if ($value->file_id == $file->id) {
                                        $checked = "checked";
                                        if ($value->permission == 1) {
                                            $permission_checked = "checked";
                                        }
                                    }
                                }
                            ?>
                                <div class="row">
                                    <div class="col-md-8 col-8 custom-checkbox">
                                        <input type="checkbox" id="file_<?= $file->id ?>" <?= in_array($file->id, array_column($UserFiles, 'file_id')) ? 'checked' : '' ?> name="files[]" value="<?= $file->id ?>">
                                        <label for="file_<?= $file->id ?>"></label>
                                        <span><?= $file->file_name ?></span>
                                    </div>
                                    <div class="col-md-4 col-4 custom-checkbox">
                                        <input type="checkbox" id="file_permission<?= $file->id ?>" <?= in_array($file->id, array_column($UserFiles, 'file_id')) ? 'checked' : '' ?> name="file_permission[<?= $file->id ?>]" value="1">
                                        <label for="file_<?= $file->id ?>"></label>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-2">
                    <div class="col-md-6">
                        <?php
                        echo form_submit('submit', 'Update', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);

                        ?>
                        <a href="<?= base_url('app/User') ?>" class="btn btn-secondary waves-effect">Back</a>
                    </div>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div><!-- end col -->
    </div>
</div>