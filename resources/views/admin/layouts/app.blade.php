<!DOCTYPE html>
 
  <html lang="{{ app()->getLocale() }}">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Micronet Services</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
      <meta http-equiv="Content-type" content="text/html; charset=utf-8">
      <meta content="" name="description"/>
      <meta content="" name="author"/>
      <!-- <link rel="shortcut icon" type="image/png" href="{{ asset('public/admin/dist/img/avatar.png') }}"/>
      <link rel="shortcut icon" type="image/png" href="{{ asset('public/admin/dist/img/avatar.png') }}"/> -->
      <link href="{{ asset('public/images/b-icon.png') }}" rel="shortcut icon" type="image/png" />
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/fontawesome-free/css/all.min.css') }}">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Tempusdominus Bbootstrap 4 -->
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
      <!-- DataTables -->
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
      <!-- icheck bootstrap -->
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{ asset('public/admin/dist/css/adminlte.min.css') }}">
      <!-- JQVMap -->
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/jqvmap/jqvmap.min.css') }}">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/daterangepicker/daterangepicker.css') }}">
      <!-- summernote -->
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/summernote/summernote-bs4.css') }}">
      <!-- Custom CSS -->
      <link rel="stylesheet" href="{{ asset('public/admin/css/custom.css') }}">
      <!-- Google Font: Source Sans Pro -->
      <!-- Toastr -->
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/toastr/toastr.min.css') }}">
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
      <!-- flag-icon-css -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
  </head>
  
  <!-- /.login-box -->  
  @yield('content')
      
      @if(Auth::user())
        
        <!-- jQuery -->
        <script src="{{ asset('public/admin/plugins/jquery/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('public/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        
        <script type="text/javascript">
          $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('public/admin/dist/js/adminlte.min.js') }}"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('public/admin/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('public/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('public/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <!-- Summernote -->
        <script src="{{ asset('public/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('public/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        {{-- <script src="{{ asset('public/admin/dist/js/adminlte.js') }}"></script> --}}
        
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('public/admin/dist/js/demo.js') }}"></script>
        <script src="{{ asset('public/admin/plugins/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('public/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script> 
        <!-- Toastr -->
        <script src="{{ asset('public/admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('public/admin/plugins/toastr/toastr.min.js') }}"></script>
        <!-- SweetAlert2 -->
       
        @if(session('success'))
          <script type="text/javascript">
            $(document).Toasts('create', {
              class: 'bg-success', 
              title: 'Success',
              body: '{!! session("success") !!}'
            });
          </script>
        @endif
        @if(session('error'))
           <script type="text/javascript">
            $(document).Toasts('create', {
              class: 'bg-danger', 
              title: 'Error',
              body: '{!! session("error") !!}'
            });
          </script>
        @endif 
      @else
        <!-- jQuery -->
        <script src="{{ asset('public/admin/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        {{-- Include JS if user is Authorized --}}
      @endif

      @yield('script')
        <script type="text/javascript" src="{{ asset('public/admin/js/common-function.js') }}?v={{ time() }}"></script>
  </body>
</html>