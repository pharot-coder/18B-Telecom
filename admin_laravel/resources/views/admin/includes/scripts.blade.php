 <!-- Core -->
 <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
 <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
 <!-- Optional JS -->
 <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
 <script src="{{ asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
 <!-- Argon JS -->
 <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
 <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

 <script>
     $(document).ready(function() {
         $('#example').DataTable();
         $('#orderdetail_table').DataTable();

     });
 </script>

 <script>
     CKEDITOR.replace('editor1');
     CKEDITOR.replace('editor2');
 </script>
