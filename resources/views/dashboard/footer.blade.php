<footer class="main-footer">
    <strong>Copyright &copy; 2024  </strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block" id="logout-button">
      
        <a class="btn btn-dark" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
 {{-- Google Form  START --}}
 <script>
  document.getElementById('logout-button').addEventListener('click', function(event) {
      event.preventDefault();

      var userRole = {{ Auth::user()->role }}; 

        if (userRole == 2) {
          var userConfirmed = confirm("Would you like to participate in satisfaction survey regarding the UIMS?");
          
          if (userConfirmed) {
              // Redirect to the Google Form survey
              window.location.href = '{{ url("/survey") }}';
          } else {
              // Submit the logout form
              document.getElementById('logout-form').submit();
          }
      } else {
          // Submit the logout form for non-students
          document.getElementById('logout-form').submit();
      }
  });
</script>
{{-- Google Form END --}}
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js ')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js ')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js ')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js ')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js ')}}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

{{-- Data Table --}}
<script src={{ asset('datatable/datatables.js')}}></script>

@stack('dataTable')