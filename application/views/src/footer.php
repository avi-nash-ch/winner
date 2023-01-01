   <!-- content -->
   <footer class="footer">© <?= date("Y").' '. PROJECT_NAME ?> <span class="d-none d-sm-inline-block">- Crafted with <i
               class="mdi mdi-heart text-danger"></i> by Webtech</span>.</footer>
   </div>
   <!-- ============================================================== -->
   <!-- End Right content here -->
   <!-- ============================================================== -->
   </div>
   <!-- END wrapper -->
   <!-- jQuery  -->

   <script src="<?= base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
   <script src="<?= base_url('assets/js/metisMenu.min.js')?>"></script>
   <script src="<?= base_url('assets/js/jquery.slimscroll.js')?>"></script>
   <script src="<?= base_url('assets/js/waves.min.js')?>"></script>

   <script src="<?= base_url('assets/js/jquery.validate.min.js')?>"></script>
   <!-- Required datatable js -->
   <script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap4.min.js')?>"></script>
   <!-- Buttons examples -->
   <script src="<?= base_url('assets/plugins/datatables/dataTables.buttons.min.js')?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/buttons.bootstrap4.min.js')?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/jszip.min.js')?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/pdfmake.min.js')?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/vfs_fonts.js')?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/buttons.html5.min.js')?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/buttons.print.min.js')?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/buttons.colVis.min.js')?>"></script>
   <!-- Responsive examples -->
   <script src="<?= base_url('assets/plugins/datatables/dataTables.responsive.min.js')?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/responsive.bootstrap4.min.js')?>"></script>
   <!-- Datatable init js -->
   <script src="<?= base_url('assets/plugins/datatables/datatables.init.js')?>"></script>
   <!-- App js -->
   <script src="<?= base_url('assets/js/bootstrap-datepicker.min.js')?>"></script>
   <script src="<?= base_url('assets/js/app.js')?>"></script>
   <script src="<?= base_url('assets/js/custom/validation.js')?>"></script>
   </body>

   </html>

   <script>
      $(document).ready(function () {
       onScan.attachTo(document, {
    suffixKeyCodes: [], // enter-key expected at the end of a scan
    reactToPaste: false, // Compatibility to built-in scanners in paste-mode (as opposed to keyboard-mode)
    onScan: function (sCode, iQty) {
      $('#space_number').val('');
      $("textarea[name='notes']").val('');
      if (!sCode.startsWith('ANSI')) {
        jQuery.ajax({
          type: 'POST',
          data: {
            barcode: sCode,
            type: btoa(3),
            scanfrom: btoa(1),
          },
          url: BASE_URL + 'guard/GuardPortal/scan_barcode',
          success: function (data) {
            var j_data = JSON.parse(data);
            // console.log(j_data);
            $('#save_process').val('');
           
          },
        });
      }
    },
    onKeyDetect: function (iKeyCode) {
      // output all potentially relevant key events - great for debugging!
      // console.log("Pressed: " + iKeyCode);
    },
    keyCodeMapper: function (oEvent) {
      //if (oEvent.which == 13) {
      //return "/";
      //}
      return onScan.decodeKeyEvent(oEvent);
    },
  });
});

   </script>