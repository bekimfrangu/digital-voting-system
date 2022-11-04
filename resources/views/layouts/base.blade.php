<!doctype html>
<html class="no-js" lang="en">
<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SDV - Sistemi Digjital i Votimit</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{asset('admin/vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{asset('admin/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{asset('admin/vendors/selectFX/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{asset('admin/vendors/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">


    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    @livewireStyles
</head>

<body >
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{url('home')}}">SDV</a>
                <!-- <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a> -->
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                 @if(Route::has('login'))
                    @auth
                        @if(Auth::user()->status === 'admin')
                                <li class="active">
                                    <a href="{{url('/dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Ballina</a>
                                </li>
                               
                                <h3 class="menu-title">Menaxhimi</h3>
                                <li>
                                    <a href="{{url('/regions')}}"> <i class="menu-icon ti ti-map"></i>Rajonet</a>
                                </li>

                                <li>
                                    <a href="{{url('/municipalities')}}"> <i class="menu-icon fa fa-building-o"></i>Komunat</a>
                                </li>

                               
                                <li>
                                    <a href="{{url('/numbers')}}"> <i class="menu-icon ti-layout-grid3-alt"></i>Numrat</a>
                                </li>
                                <li>
                                    <a href="{{url('/subjects')}}"> <i class="menu-icon fa fa-home"></i>Subjektet</a>
                                </li>

                                <li>
                                    <a href="{{url('/positions')}}"> <i class="menu-icon ti ti-briefcase"></i>Pozitat</a>
                                </li>
                                
                                <li>
                                    <a href="{{url('/election-types')}}"> <i class="menu-icon ti ti-menu"></i>Lloji i Zgjedhjeve</a>
                                </li>

                                <li>
                                    <a href="{{url('/elections')}}"> <i class="menu-icon ti ti-check-box"></i>Zgjedhjet</a>
                                </li>

                               
                                <li>
                                    <a href="{{url('/voters')}}"> <i class="menu-icon fa fa-users"></i>Votuesit</a>
                                </li>

                                <li>
                                    <a href="{{url('/candidates')}}"> <i class="menu-icon ti ti-user"></i>Kandidatet</a>
                                </li>

                               

                                <h3 class="menu-title">Shfaqe</h3>
                                <li>
                                    <a href="{{route('candidateList')}}"> <i class="menu-icon ti-view-list"></i>Lista e Kandidateve</a>
                                </li>

                                <li>
                                    <a href="{{url('/votes')}}"> <i class="menu-icon ti-view-list"></i>Lista e Votuesve</a>
                                </li>
                        @else
                             <li class="active">
                                    <a href="{{url('/home')}}"> <i class="menu-icon ti ti-check-box"></i>Voto</a>
                             </li>

                        @endif
                    @endauth
                @endif
                </ul>
                
            </div><!-- /.navbar-collapse -->
            <!-- <footer>
                <div class="text-center m-2" style="color:#4d4d4d">
                    Copyright © 2022 All Rights Reserved
                </div>
            </footer> -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
         @if(Route::has('login'))
                    @auth
        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <p class="text-bold mt-2">{{Auth::user()->fullname}}</p>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('log-out').submit();" ><i class="fa fa-power-off"></i> Dilni</a>
                        </div>
                        <form id="log-out" method="post" action="{{route('logout')}}">
                            @csrf
                        </form>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
        @endauth
        @else
        @endif
      @yield('content')
    
    </div><!-- /#right-panel -->
    <!-- Right Panel -->

    <script src="{{asset('admin/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{asset('admin/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{asset('admin/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('admin/assets/js/main.js') }}"></script>


    <script src="{{asset('admin/vendors/chart.js/dist/Chart.bundle.min.js') }}"></script>
    <script src="{{asset('admin/assets/js/dashboard.js') }}"></script>
    <script src="{{asset('admin/assets/js/widgets.js') }}"></script>
    <script src="{{asset('admin/vendors/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{asset('admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{asset('admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>

    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{asset('admin/assets/js/init-scripts/data-table/datatables-init.js') }}"></script>
    <script src="{{asset('admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--  Chart js -->

    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

 <!-- Count selected checkboxes    -->
    <script type="text/javascript"> 
      $(document).ready(function() {
        $("input[name='candidate_id[]']").change(function() {
            var maxAllowed = 5;
            var cnt = $("input[name='candidate_id[]']:checked").length;
            if(cnt > maxAllowed)
            {
                $(this).prop("checked","");
                alert('You can select max 5 candidates.');
            }
        });
      });
    </script>

    @livewireScripts

</body>

</html>
