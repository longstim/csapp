<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!-- Bootstrap Core CSS -->
    {!! Html::style('asset/css/bootstrap.min.css') !!}
     <!-- Bootstrap Core CSS -->

    <!-- Custom CSS -->
    {!! Html::style('asset/css/sb-admin.css') !!}

    <!-- Morris Charts CSS -->
    {!! Html::style('asset/css/plugins/morris.css') !!}

    <!-- Custom Fonts -->
    {!! Html::style('asset/font-awesome/css/font-awesome.min.css') !!}

    <style type="text/css">
             .navbar-inverse
            {
                border-color: #222;
            }

            .navbar
            {
                min-height: 70px;
            }


    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
         <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand" href="{{ url('/') }}">
                    <font color="#fff"><img src="asset/logobim.png" width="43px"> Selamat Datang di Balai Riset dan Standardisasi Industri Medan</font>
                    </a>
            </div>
             <ul class="nav navbar-right top-nav">
                 <!--@if (Auth::guest())
                    <li><a href="{{ url('/login') }}" ><span class="glyphicon glyphicon-log-in"></span>  Login</a></li>
                    <!--<li><a href="{{ url('/register') }}"> <span class="glyphicon glyphicon-user"></span> Register</a></li>-->
               <!-- @else
                    <li><a href="{{ url('/home') }}" "><span class="glyphicon glyphicon-home"></span>  Home</a></li>
                @endif
                 -->
            </ul>
            <!-- /.navbar-collapse -->
        </nav>



        <!-- /#page-wrapper -->
     @yield('content')

    <!-- Scripts -->

    <!-- jQuery -->
    {!! Html::script('asset/js/jquery.js') !!}

    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('asset/js/bootstrap.min.js') !!}

    <!-- Morris Charts JavaScript -->
    {!! Html::script('asset/js/plugins/morris/raphael.min.js') !!}
    {!! Html::script('asset/js/plugins/morris/morris.min.js') !!}
    {!! Html::script('asset/js/plugins/morris/morris-data.js') !!}
</body>
</html>
