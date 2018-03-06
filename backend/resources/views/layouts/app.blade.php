
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>SB Admin - Start Bootstrap Template</title>
   <!-- Bootstrap core CSS-->
   <link href="{{url('css/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
   <!-- Custom fonts for this template-->
   <link href="{{url('css/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
   <!-- Page level plugin CSS-->
   <link href="{{url('css/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
   <!-- Custom styles for this template-->
   <link href="{{url('css/css/sb-admin.css')}}" rel="stylesheet">
   
   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
        
    <div class="container">
       

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
              
                    <li class="nav-item dropdown">
                       
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
               
            </ul>
        </div>
    </div>


<main class="py-4">
    @yield('content')
</main>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{url('css/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('css/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{url('css/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{url('css/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{url('css/vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{url('css/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{url('css/js/sb-admin.min.js')}}"></script>
    <!-- Custom scripts for this page-->
    <script src="{{url('css/js/sb-admin-datatables.min.js')}}"></script>
    <script src="{{url('css/js/sb-admin-charts.min.js')}}"></script>
  </div>
</body>

</html>