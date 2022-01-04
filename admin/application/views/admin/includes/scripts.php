    <script src="<?php echo base_url('assests/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assests/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url('assests/vendor/chart.js/Chart.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assests/js/sb-admin.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/js/demo/datatables-demo.js'); ?>"></script>
    <script src="<?php echo base_url('assests/js/demo/chart-area-demo.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/ckeditor/ckeditor.js'); ?>"></script>
    <script>
//CK Editor 
CKEDITOR.replace('editor1');
CKEDITOR.replace('editor2')
    </script>
    <script type="text/javascript">
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $('.collapse').collapse({
        toggle: false
    });
    $('#order_detail_table').DataTable();
    $('#InvoiceDetailTable').DataTable();
});
    </script>