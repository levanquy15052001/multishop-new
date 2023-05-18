      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{asset('admin_master/vendors/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{asset('admin_master/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('admin_master/vendors/fastclick/lib/fastclick.js')}}"></script>
  <!-- NProgress -->
  <script src="{{asset('admin_master/vendors/nprogress/nprogress.js')}}"></script>
  <!-- Chart.js -->
  <script src="{{asset('admin_master/vendors/Chart.js/dist/Chart.min.js')}}"></script>
  <!-- gauge.js -->
  <script src="{{asset('admin_master/vendors/gauge.js/dist/gauge.min.js')}}"></script>
  <!-- bootstrap-progressbar -->
  <script src="{{asset('admin_master/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
  <!-- iCheck -->
  <script src="{{asset('admin_master/vendors/iCheck/icheck.min.js')}}"></script>
  <!-- Skycons -->
  <script src="{{asset('admin_master/vendors/skycons/skycons.js')}}"></script>
  <!-- Flot -->
  <script src="{{asset('admin_master/vendors/Flot/jquery.flot.js')}}"></script>
  <script src="{{asset('admin_master/vendors/Flot/jquery.flot.pie.js')}}"></script>
  <script src="{{asset('admin_master/vendors/Flot/jquery.flot.time.js')}}"></script>
  <script src="{{asset('admin_master/vendors/Flot/jquery.flot.stack.js')}}"></script>
  <script src="{{asset('admin_master/vendors/Flot/jquery.flot.resize.js')}}"></script>
  <!-- Flot plugins -->
  <script src="{{asset('admin_master/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
  <script src="{{asset('admin_master/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
  <script src="{{asset('admin_master/vendors/flot.curvedlines/curvedLines.js')}}"></script>
  <!-- DateJS -->
  <script src="{{asset('admin_master/vendors/DateJS/build/date.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{asset('admin_master/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
  <script src="{{asset('admin_master/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
  <script src="{{asset('admin_master/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="{{asset('admin_master/vendors/moment/min/moment.min.js')}}"></script>
  <script src="{{asset('admin_master/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script src="{{asset('template/js/sweetalert.min.js')}}"></script>
  <!-- Custom Theme Scripts -->
  <script src="{{asset('admin_master/build/js/custom.min.js')}}"></script>
  <script src="{{asset('admin_master/js/fontawesome.min.js')}}"></script>
  <script src="{{asset('js/jquery.validate.js')}}"></script>
  
  {{-- <script src="{{asset('js/jquery.js')}}"></script> --}}
  @stack('script_admin')
  @php
    $success='';
    if(session()->has('success'))
    {
        $success = session()->get('success');
    }

    $waring='';
    if(session()->has('waring'))
    {
        $waring = session()->get('waring');
    }
   
@endphp
<script>
   var success = @json($success);
   var waring = @json($waring);
   if(success!='')
   {
    swal("Good job!", success, "success");
   }

   if(waring!='')
   {
    swal("Warning!", waring, "warning");
   }

   $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "{{ route('sum_order') }}",
        type : 'GET',
        success : function(result){
            $('.sum_order').html(result);
        }
    });

    $('.svg-inline--fa').remove();
</script>
  
</body>
</html>