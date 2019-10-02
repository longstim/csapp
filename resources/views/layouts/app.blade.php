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

    <!-- Custom CSS -->
    {!! Html::style('asset/css/sb-admin.css') !!}

    <!-- Morris Charts CSS -->
    {!! Html::style('asset/css/plugins/morris.css') !!}

    <!-- Custom Fonts -->
    {!! Html::style('asset/font-awesome/css/font-awesome.min.css') !!}


    <!-- Datatable CSS -->
    {!! Html::style('asset/datatable/css/dataTables.bootstrap.min.css') !!}

    <style type="text/css">
        #footer {
            position: fixed;
            width: 100%;
            bottom: 0px;
            padding-top: 30px;
            padding-bottom: 30px;
            color: #fff;
            background: #222;
        }

        .navbar-inverse
        {
            border-color: #222;
        }

         .navbar-brand
        {
            padding-top: 25px;
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

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                <font color="#fff">{{ config('app.name', 'Laravel') }}</font>
                </a>
            </div>
             <ul class="nav navbar-right top-nav">
                 @if (Auth::guest())
                    <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="{{ url('/register') }}"> <span class="glyphicon glyphicon-user"></span> Register</a></li>
                @else

                  <li><a href="{{ url('/home') }}"><span class="glyphicon glyphicon-home"></span> Home</a></li> 
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="glyphicon glyphicon-user"></span>&nbsp{{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}" 
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           <span class="glyphicon glyphicon-log-out"></span> Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                @endif       
            </ul>
              
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
            @if(Auth::user()->role=='admin')
                @if(!empty($checkernav))
                    @if($checkernav==1)
                        <li class="active">
                            <a href="{{ url('/home') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ url('/dokumen') }}"><i class="fa fa-fw fa-file-text"></i> Dokumen</a>
                        </li>
                        <li>
                            <a href="{{ url('/kategori') }}"><i class="fa fa-fw fa-cog"></i> Pengaturan</a>
                        </li>
                    @elseif($checkernav==2)
                       <li>
                            <a href="{{ url('/home') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li  class="active">
                            <a href="{{ url('/dokumen') }}"><i class="fa fa-fw fa-file-text"></i> Dokumen</a>
                        </li>
                        <li>
                            <a href="{{ url('/kategori') }}"><i class="fa fa-fw fa-cog"></i> Pengaturan</a>
                        </li>
                    @elseif($checkernav==3)
                       <li>
                            <a href="{{ url('/home') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ url('/dokumen') }}"><i class="fa fa-fw fa-file-text"></i> Dokumen</a>
                        </li>
                        <li class="active">
                            <a href="{{ url('/kategori') }}"><i class="fa fa-fw fa-cog"></i> Pengaturan</a>
                        </li>
                    @endif
                @else
                <li>
                        <a href="{{ url('/home') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ url('/dokumen') }}"><i class="fa fa-fw fa-file-text"></i> Dokumen</a>
                    </li>
                    <li>
                        <a href="{{ url('/kategori') }}"><i class="fa fa-fw fa-file-text-o"></i> Pengaturan</a>
                    </li>
                @endif
            @endif
                    <!--<li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->   
        </div>
        <!-- /#page-wrapper -->
    </div>


    <!-- Scripts -->

    <!-- jQuery -->
    {!! Html::script('asset/js/jquery.js') !!}

    <!-- jQuery UI-->
    {!! Html::script('asset/js/jquery-ui/jquery-ui.min.js') !!}

    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('asset/js/bootstrap.min.js') !!}

    <!-- Bootstrap Filestyle JavaScript -->
    {!! Html::script('asset/js/bootstrap-filestyle.js') !!}

    <!-- Bootstrap Moment JavaScript -->
    {!! Html::script('asset/js/moment.js') !!}

    <!-- Datatable jQuery -->
    {!! Html::script('asset/datatable/js/jquery.dataTables.min.js') !!}

    <!-- Morris Charts JavaScript -->
    {!! Html::script('asset/js/plugins/morris/raphael.min.js') !!}
    {!! Html::script('asset/js/plugins/morris/morris.min.js') !!}
    {!! Html::script('asset/js/plugins/morris/morris-data.js') !!}
</body>
</html>
