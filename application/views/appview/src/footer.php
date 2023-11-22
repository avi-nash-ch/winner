   <!-- content -->
   <footer class="footer">© <?= date("Y") . ' ' . PROJECT_NAME ?>
     <span class="d-none d-sm-inline-block">- Crafted with <i class="mdi mdi-heart text-danger"></i> by NextGen</span>.
   </footer>
   </div>
   <!-- ============================================================== -->
   <!-- End Right content here -->
   <!-- ============================================================== -->
   </div>
   <!-- END wrapper -->
   <!-- jQuery  -->

   <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
   <script src="<?= base_url('assets/js/metisMenu.min.js') ?>"></script>
   <script src="<?= base_url('assets/js/jquery.slimscroll.js') ?>"></script>
   <script src="<?= base_url('assets/js/waves.min.js') ?>"></script>

   <script src="<?= base_url('assets/js/jquery.validate.min.js') ?>"></script>
   <!-- Required datatable js -->
   <script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap4.min.js') ?>"></script>
   <!-- Buttons examples -->
   <script src="<?= base_url('assets/plugins/datatables/dataTables.buttons.min.js') ?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/buttons.bootstrap4.min.js') ?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/jszip.min.js') ?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/pdfmake.min.js') ?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/vfs_fonts.js') ?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/buttons.html5.min.js') ?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/buttons.print.min.js') ?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/buttons.colVis.min.js') ?>"></script>
   <!-- Responsive examples -->
   <script src="<?= base_url('assets/plugins/datatables/dataTables.responsive.min.js') ?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/responsive.bootstrap4.min.js') ?>"></script>
   <!-- Datatable init js -->
   <script src="<?= base_url('assets/plugins/datatables/datatables.init.js') ?>"></script>
   <!-- App js -->
   <script src="<?= base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
   <script src="<?= base_url('assets/js/app.js') ?>"></script>
   <script src="<?= base_url('assets/js/select2.min.js') ?>"></script>
   <script src="<?= base_url('assets/js/custom/validation.js') ?>"></script>

   </body>

   </html>

   <script>
     $(document).ready(function() {
       $('#item_desc0').select2();
     });


     <?php
      $option = "";
      $Products = getAllProduct();
      foreach ($Products as $key => $value) {
        $option .= "<option value=\"" . $value->id . "\" data-price=\"" . $value->price_sale . "\">" . htmlentities($value->name) . "</option>";
      }
      ?>

     $(document).on('click', '.add_more_button', function(e) {
       e.preventDefault();
       // function addOtherCharges() {
       //  event.preventDefault();
       var id = $('#count_item').val();
       var newField = parseInt(id) + 1;
       $('#count_item').val(newField);
       var option = $('#item_desc0').html()
       var fieldToAdd = '<div class="row items_row" id="oc_field-' + newField + '"><div class="mb-3 col-lg-6"><label for="item_desc' + newField + '">Product Name *</label><select class="form-control select2" name="item_desc[]" id="item_desc' + newField + '" required><option value="">Select Product</option><?= $option ?></select></div><div class="mb-3 col-lg-2"><label for="qty">Qty. *</label><input class="form-control" onchange="setPrice(this,' + newField + ')" type="number" min="0" Placeholder="Qty." name="qty[]" id="qty' + newField + '" required></div>';
       fieldToAdd += '<div class="mb-3 col-lg-2"><label for="price' + newField + '">Price *</label><input class="form-control" type="number" Placeholder="Price" min="0" name="price[]" readonly id="price' + newField + '" required></div>';
       fieldToAdd += ' <div class="input-field col s1 pdr_0 white_space" style="margin-top: 28px;"><button class="btn btn-danger remove_item" id="remove-oc-1">Remove</button></div>';
       fieldToAdd += '</div>';
       $(this).closest('.items_row').after(fieldToAdd);
       setTimeout(() => {
         // console.log(newField)
         $('#item_desc' + newField).select2();
         // $('#item_desc'+id).select2().val(null).trigger("change");
       }, 100);
       // $('#item_desc'+newField).va


       // $('#item_desc'+newField).select2("destroy");





     })

     $(document).on('click', '.remove_item', function(e) {
       e.preventDefault();
       var length = $('.items_row').length;
       if (length > 1) {
         $(this).closest('.items_row').remove();
         // CalculateOtherCharges();
       }
       return false;
     });


     function setPrice($this, id) {
       var price = $('#item_desc' + id).find(':selected').data('price')
       var qty = $($this).val()
       if (qty != '') {
         var w = price * qty
         $('#price' + id).val(w.toFixed(2))
       } else {
         $('#price' + id).val('')
       }
     }

     function generateBill() {
       jQuery.ajax({
         type: 'POST',
         data: $('#add_bill').serialize(),
         url: '<?= base_url('backend/Dashboard/generateBill') ?>',
         dataType: 'json',
         beforeSend: function() {},
         success: function(data) {
           if (data.response == true) {
             toastr.success('Order confirmed')
             location.reload();
             // printJS('<?= base_url() ?>' + data.file_name, 'pdf');
           } else {
             toastr.error('Something went wrong.')
           }

         },
         error: function(e) {},
       });
     }
   </script>