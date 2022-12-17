<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
            echo form_open_multipart('backend/Products/update', ['autocomplete' => false, 'id' => 'edit_product'
                ,'method'=>'post'], ['type' => $this->url_encrypt->encode('tbl_product'),
                'id'=> $Product->id])
                ?>
             
             <div class="form-group row">
             <div class="col-md-2">
             <label for="name">Product Type *</label>
                       <select class="form-control" name="type">
                        <option value="">Select Type</option>
                        <option value="1" <?= ($Product->type==1)?'selected':''?>>Book</option>
                        <option value="2" <?= ($Product->type==2)?'selected':''?>>Pen</option>
                       </select>
                    </div>
                    <div class="col-md-2">
                    <label for="name">Product Name *</label>
                        <input class="form-control" type="text"  name="name" value="<?= $Product->name ?>" required
                            id="name">
                    </div>
                    <div class="col-md-2">
                    <label for="qty">Qty. *</label>
                        <input class="form-control" type="number" Placeholder="Price" value="<?= $Product->qty ?>"  name="qty" required
                            id="prcie">
                    </div>
                    <div class="col-md-2">
                    <label for="price">Purchase Price Per Piece *</label>
                        <input class="form-control" type="text" Placeholder="Price" value="<?= $Product->purchase_price ?>"  name="purchase_price" required
                            id="prcie">
                    </div>
                    <div class="col-md-2">
                    <label for="price">Sale Price Per Piece *</label>
                        <input class="form-control" type="text" Placeholder="Price" value="<?= $Product->price_sale ?>"  name="sale_price" required
                            id="prcie">
                    </div>
                </div>
                <div class="form-group row">
                <div class="col-md-2">
                    <label for="qr_code">Qr Code *</label>
                        <input class="form-control" type="text" Placeholder="Qr Code" value="<?= $Product->qr_code ?>"  name="qr_code" required
                            id="qr_code">
                    </div>
                    <div class="col-md-6">
                    <label for="desc">Description</label>
                        <input class="form-control" type="text"  name="desc" value="<?= $Product->description ?>" id="desc">
                    </div>
                    <div class="col-md-4">
                    <label for="url">You Tube Url</label>
                        <input class="form-control" type="text" value="<?= $Product->url ?>" Placeholder="You Tube Url" name="url"
                            id="url">
                    </div>
                </div>
                <div class="form-group row">
                   
                    <div class="col-md-2">
                    <label for="image">Image *</label>
                        <input class="form-control" type="file" name="product_image" id="image" required>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Update', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                       
                        ?>
                         <a href="<?= base_url('backend/Products')?>" class="btn btn-secondary waves-effect">Cancel</a>
                    </div>
                </div>
                <?php
            echo form_close();
            ?>
            </div>
        </div><!-- end col -->
    </div>
    <script>
    function updateValue(x) {
        $('#point_value').val(x * 80);
    }
    </script>