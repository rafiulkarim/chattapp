<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
<!--    <link rel="icon" type="image/png" href="{{ url('public/assets/img/favicon.ico')}}">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>{{$title}}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>


    <!-- Bootstrap core CSS     -->
    <link href="{{ url('public/assets/css/bootstrap.min.css')}}" rel="stylesheet"/>

    <!-- Animation library for notifications   -->
    <link href="{{ url('public/assets/css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ url('public/assets/css/light-bootstrap-dashboard.css')}}?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ url('public/assets/css/demo.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{url('public/css/front/style.css')}}">


    <!--     Fonts and icons     -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ url('public/assets/css/pe-icon-7-stroke.css')}}" rel="stylesheet"/>
    @yield('header_script')

</head>
<body>

<div class="wrapper">
<div class="sidebar" data-color="purple" data-image="{{ url('public/assets/img/sidebar-5.jpg')}}">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{url('/dashboard')}}" class="simple-text">
                {{Auth::user()->name}}
            </a>
        </div>

        <ul class="nav">
            
            <li class="active">
                <a href="{{url('/dashboard')}}">
                    <i class="pe-7s-graph"></i>

                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{url('/dashboard/users')}}">
                    <i class="pe-7s-user"></i>

                    <p>Users</p>
                </a>
            </li>
            <li>
                <a href="{{route('timeline')}}">
                    <i class="pe-7s-timer"></i>

                    <p>Timeline</p>
                </a>
            </li>
            <li>
                <a href="{{route('people')}}">
                    <i class="pe-7s-user"></i>

                    <p>People You May Know</p>
                </a>
            </li>
            <li>
                <a href="{{route('friend_request')}}">
                    <i class="pe-7s-user"></i>
                    <p>Friend Request</p>
                </a>
            </li>
            <li>
                <a href="{{route('people_list')}}">
                    <i class="pe-7s-user"></i>
                    <p>Friend List</p>
                </a>
            </li>
            <li>
                <a href="{{route('home')}}" target="_black">
                    <i class="pe-7s-user"></i>

                    <p>Chat with Friends</p>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="main-panel">
<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Notifications</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-dashboard"></i>

                        <p class="hidden-lg hidden-md">Dashboard</p>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-globe"></i>
                        <b class="caret hidden-sm hidden-xs"></b>
                        <span class="notification hidden-sm hidden-xs">5</span>

                        <p class="hidden-lg hidden-md">
                            5 Notifications
                            <b class="caret"></b>
                        </p>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Notification 1</a></li>
                        <li><a href="#">Notification 2</a></li>
                        <li><a href="#">Notification 3</a></li>
                        <li><a href="#">Notification 4</a></li>
                        <li><a href="#">Another notification</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-search"></i>

                        <p class="hidden-lg hidden-md">Search</p>
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="">
                        <p>My Profile</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('logout')}}">
                        <p>Log out</p>
                    </a>
                </li>
                <li class="separator hidden-lg hidden-md"></li>
            </ul>
        </div>
    </div>
</nav>


<div class="content">
    @yield('container')
</div>


<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="#">
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
            </ul>
        </nav>
        <p class="copyright pull-right">
            &copy;
            <script>document.write(new Date().getFullYear())</script>
            <a href="#">Creative Tim</a>
        </p>
    </div>
</footer>

    @yield('footer_script')

</div>
</div>


</body>

<!--   Core JS Files   -->
<script src="{{ url('public/assets/js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{ url('public/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="{{ url('public/assets/js/chartist.min.js')}}"></script>

<!--  Notifications Plugin    -->
<script src="{{ url('public/assets/js/bootstrap-notify.js')}}"></script>

<!--<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{ url('public/assets/js/light-bootstrap-dashboard.js')}}?v=1.4.0"></script>

<script src="{{ url('public/assets/js/demo.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.1/socket.io.min.js"></script>

@yield('footer_script')

</html>
