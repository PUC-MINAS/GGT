<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>@yield('title') | GGT</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- CSS Files -->
    <!--<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />-->

    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{URL::asset('assets/css/light-bootstrap-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">

    <style>
        div.sidebar-wrapper div.logo a.simple-text{
            font-size: 40px;
            font-weight: 900;
        }

        .navbar .navbar-nav .nav-item .nav-link .icon-fuj{
            line-height: 18px;
        }

        .fuj{
            margin-left: 15px;
        }
    </style>

</head>
<body>
	<div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="../assets/img/sidebar-4.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="" class="simple-text">
                        FUJ
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">
                            <i class="fas fa-home"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{url('tarefas')}}">
                            <i class="fas fa-clipboard"></i>
                            <p>Tarefas</p>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{url('cadastro')}}">
                            <i class="fas fa-users"></i>
                            <p>Usuários</p>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{url('premio')}}">
                            <i class="fas fa-trophy"></i>
                            <p>Premios</p>
                        </a>
                    </li>

										@if(Auth::user()->tipoUsuario()->titulo == "Diretor Executivo")

										<li>
                        <a class="nav-link" href="{{url('leaderboard')}}">
														<i class="fas fa-align-left"></i>
                            <p>Tabela Produtividade</p>
                        </a>
                    </li>

										@endif

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class=" container-fluid  ">
                    <a class="navbar-brand" href=""> @yield('title') </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <!--<li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-chart-pie-35"></i>
                                    <span class="d-lg-none">Home</span>
                                </a>
                            </li>-->
                            <!--<li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-planet"></i>
                                    <span class="notification">5</span>
                                    <span class="d-lg-none">Notification</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Notification 1</a>
                                    <a class="dropdown-item" href="#">Notification 2</a>
                                    <a class="dropdown-item" href="#">Notification 3</a>
                                    <a class="dropdown-item" href="#">Notification 4</a>
                                    <a class="dropdown-item" href="#">Another notification</a>
                                </ul>
                            </li>-->
                            <!--<li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Search</span>
                                </a>
                            </li>-->
						</ul>

						<ul class="navbar-nav ml-auto">

                            @if(Auth::user()->tipoUsuario()->titulo != "Diretor Executivo")
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fas fa-coins icon-fuj"></i>
                                    <span class="fuj">{{Auth::user()->pontos}}</span>

                                </a>

                            </li>
                            @endif
							@guest
                            <li class="nav-item">
                                <a class="nav-link" href="/login">
                                    <span class="no-icon">Login</span>
                                </a>
                            </li>

							@else
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->nome }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                            </form>
                                    </div>
                            </li>
							@endguest
						</ul>

                            <!--<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">Configurações</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </li>-->



                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">

                    @yield('conteudo')

            </div>
            <footer class="footer">
                <div class="container">
                    <nav>
                        <ul class="footer-menu">
                            <!--
                            <li>
                                <a href="index">
                                    Home
                                </a>
                            </li>


                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        -->
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            GGT | Gamificação de Gerenciamento de tarefas
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>


</body>

<!--   Core JS Files   -->
<script src="{{ URL::asset('assets/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>

<script src="{{URL::asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{URL::asset('assets/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Google Maps Plugin    -->
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
<!--  Chartist Plugin  -->
<script src="{{URL::asset('assets/js/plugins/chartist.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{URL::asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{URL::asset('assets/js/light-bootstrap-dashboard.js?v=2.0.1')}}" type="text/javascript"></script>

<!--scripts adicionais -->

@yield('scripts')

</html>
