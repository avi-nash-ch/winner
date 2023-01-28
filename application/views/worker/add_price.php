<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <?php
            echo form_open_multipart('backend/Products/InsertPrice', ['autocomplete' => false, 'id' => 'add_product'
                ,'method'=>'post'], ['type' => $this->url_encrypt->encode('tbl_product_price')])
            ?>
             <input type="hidden" name="product_id" value="<?= $product_id ?>" >
                <div class="form-group row">
                    <div class="col-md-3">
                    <label for="name">Qty. *</label>
                        <input class="form-control" type="number" Placeholder="Qty."  name="qty" required
                            id="name">
                    </div>
                    <div class="col-md-3">
                    <label for="desc">Purchase Price *</label>
                        <input class="form-control" type="number" Placeholder="Purchase Price" name="purchase_price"
                            id="desc" required>
                    </div>
                    <div class="col-md-2">
                    <label for="sale_price">Sale Price *</label>
                        <input class="form-control" type="number" Placeholder="Sale Price" name="sale_price" id="sale_price" required>
                    </div>
                    <div class="col-md-2" style="padding-top: 27px;">
                <div class="form-group mb-0">
                   
                        <?php
                        echo form_submit('submit', 'Save', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                      
                        ?>
                        <a href="<?= base_url('backend/Products')?>" class="btn btn-secondary waves-effect">Cancel</a>
</div>
                </div>
                </div>
                
                <?php
            echo form_close();
            ?>
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Product Name</th>
                            <th>Qty.</th>
                            <th>Purchase Price</td>
                            <th>Sale Price</td>
                            <th>Added Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($AllProductPrice as $key => $AllProduct) {
                            $i++;
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $AllProduct->product_name ?></td>
                            <td><?= $AllProduct->qty ?></td>
                            <td><?= $AllProduct->purchase_price ?></td>
                            <td><?= $AllProduct->sale_price ?></td>
                            <td><?= date("d-m-Y", strtotime($AllProduct->added_date)) ?></td>
                            <td>
                            <button 
                                    class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit" onclick="editprice('<?= $AllProduct->qty ?>','<?= $AllProduct->purchase_price ?>','<?= $AllProduct->sale_price ?>','<?= $AllProduct->id ?>')"><span
                                        class="fa fa-edit"></span></button> |
                                 <a href="<?= base_url('backend/Products/pricedelete/' . $AllProduct->product_id.'/'.$AllProduct->id) ?>"
                                    class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                    title="Delete"><span class="fa fa-times"></span></a>
                              
                            </td>
                        </tr>
                        <?php }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!-- <h2 class="modal-title">Update Price</h2> -->
      </div>
      <div class="modal-body">
      <?php
            echo form_open_multipart('backend/Products/UpdatePrice', ['autocomplete' => false, 'id' => 'add_product'
                ,'method'=>'post'], ['type' => $this->url_encrypt->encode('tbl_product_price')])
            ?>
             <input type="hidden" name="product_id" value="<?= $product_id ?>" >
             <input type="hidden" name="id" id="price_id" value="" >
                <div class="form-group row">
                    <div class="col-md-3">
                    <label for="name">Qty. *</label>
                        <input class="form-control" type="number" Placeholder="Qty."  name="qty" required
                            id="edit_qty">
                    </div>
                    <div class="col-md-3">
                    <label for="desc">Purchase Price *</label>
                        <input class="form-control" type="number" Placeholder="Purchase Price" name="purchase_price"
                            id="edit_purchase_price" required>
                    </div>
                    <div class="col-md-2">
                    <label for="sale_price">Sale Price *</label>
                        <input class="form-control" type="number" Placeholder="Sale Price" name="sale_price" id="edit_sale_price" required>
                    </div>
                    <div class="col-md-4" style="padding-top: 27px;">
                <div class="form-group mb-0">
                   
                        <?php
                        echo form_submit('submit', 'Save', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                      
                        ?>
                        <a href="<?= base_url('backend/Products')?>" class="btn btn-secondary waves-effect">Cancel</a>
</div>
                </div>
                </div>
                
                <?php
            echo form_close();
            ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <!-- end col -->
</div>
<script>
    function editprice(qty,purchase_price,sale_price,id) {
        $('#edit_purchase_price').val(purchase_price)
        $('#edit_sale_price').val(sale_price)
        $('#edit_qty').val(qty)
        $('#price_id').val(id)
        $('#myModal').modal('show')
        // $('#boot_value').val(x * 80);
    }
    </script>