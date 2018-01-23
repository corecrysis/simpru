<footer class="main-footer">
    <strong>Copyright &copy; 2016-{{ Carbon\carbon::now()->year }} Developer SIMPRU</strong>

    <!--<script src="{{ asset('/admin-lte/plugins/jQuery/jquery.min.js') }}"></script>-->
    
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset('/admin-lte/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('/admin-lte/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    {{--<script src="{{ asset('/admin-lte/plugins/moment/min/moment-with-locales.min.js') }}"></script>--}}
    {{--<script src="{{ asset('/admin-lte/plugins/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>--}}
    <script src="{{ asset('/admin-lte/plugins/moment/min/moment-with-locales.min.js') }}"></script>
{{--    <script src="{{ asset('/admin-lte/bootstrap/js/bootstrap.datetimepicker.js') }}"></script>--}}
    <script src="{{ asset('/admin-lte/plugins/chartjs/chart.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/admin-lte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <!-- Morris.js charts -->
    <script src="{{ asset('/admin-lte/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('/admin-lte/plugins/morris/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('/admin-lte/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('/admin-lte/plugins/knob/jquery.knob.js') }}"></script>
    <!-- daterangepicker -->

    <script src="{{ asset('/admin-lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
{{--    <script src="{{ asset('/admin-lte/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>--}}

    <script src="{{ asset('/admin-lte/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('/admin-lte/plugins/fastclick/fastclick.js') }}"></script>
    <!-- CK Editor -->
    <script src="{{ asset('/admin-lte/plugins/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libs/jquery-qtip/jquery.qtip.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/admin-lte/dist/js/adminlte.min.js') }}"></script>
    @yield('script')
</footer>