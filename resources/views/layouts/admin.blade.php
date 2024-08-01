<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/auth/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/auth/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('assets/auth/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/auth/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/auth/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('assets/auth/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="{{ asset('assets/auth/css/style.css') }}" />
    <!-- FAVICON -->
    <link href="{{ asset('assets/auth/images/favicon.png') }}" rel="shortcut icon" />
    <script src="{{ asset('assets/auth/plugins/nprogress/nprogress.js') }}"></script>
    @yield('styles')
</head>

<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
        NProgress.configure({ showSpinner: false });
        NProgress.start();
    </script>
    <div id="toaster"></div>

    <div class="wrapper">
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <div class="app-brand">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('assets/auth/images/logo.png') }}" alt="Mono">
                        <span class="brand-name">Admin Dashboard</span>
                    </a>
                </div>
                <div class="sidebar-left" data-simplebar style="height: 100%;">
                    <ul class="nav sidebar-inner" id="sidebar-menu">

                        <li class="active">
                            <a class="sidenav-item-link" href="{{ route('admin.dashboard') }}">
                                <i class="mdi mdi-briefcase-account-outline"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>

                        <li class="section-title">
                            Management
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('admin.categories') }}">
                                <i class="fa-solid fa-tasks"></i>
                                <span class="nav-text">Categories</span>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('admin.tags') }}">
                                <i class="fa-solid fa-tags"></i>
                                <span class="nav-text">Tags</span>
                            </a>
                        </li>

                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#posts" aria-expanded="false" aria-controls="posts">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <span class="nav-text">Posts</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="posts" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('admin.post.create') }}">
                                            <span class="nav-text">Create Post</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('admin.post.index') }}">
                                            <span class="nav-text">All Posts</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>

                    
                    </ul>
                </div>
            </div>
        </aside>

        <div class="page-wrapper">
            <header class="main-header" id="header">
                <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>

                    <span class="page-title">Admin Dashboard</span>

                    <div class="navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user-menu">
                                <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <img src="{{ asset('assets/auth/images/user/user-xs-01.jpg') }}" class="user-image rounded-circle" alt="User Image" />
                                    <span class="d-none d-lg-inline-block">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-link-item" href="{{route('admin.dashboard')}}">
                                            <i class="mdi mdi-account-outline"></i>
                                            <span class="nav-text">My Profile</span>
                                        </a>
                                    </li>

                                    <li class="dropdown-footer">
                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                                            @csrf
                                            <a href="{{ route('admin.logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"
                                                id="logut-button" class="dropdown-link-item"> <i class="mdi mdi-logout"></i> Log Out </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>


            <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
            @yield('content')



                   <!-- Footer -->
                   <footer class="footer mt-auto">
                    <div class="copyright bg-white">
                        <p>
                            &copy; <span id="copy-year"></span> Copyright Mono Dashboard Bootstrap Template by <a
                                class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
                        </p>
                    </div>
                    <script>
                        var d = new Date();
                        var year = d.getFullYear();
                        document.getElementById("copy-year").innerHTML = year;
                    </script>
                </footer>
            </div>
        </div>
    
        <script src="{{ asset('assets/auth/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/auth/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/auth/plugins/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/auth/plugins/charts/Chart.min.js') }}"></script>
        <script src="{{ asset('assets/auth/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
        <script src="{{ asset('assets/auth/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
        <script src="{{ asset('assets/auth/plugins/daterangepicker/moment.min.js') }}"></script>
        <script src="{{ asset('assets/auth/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('assets/auth/plugins/toaster/toastr.min.js') }}"></script>
        <script src="{{ asset('assets/auth/js/mono.js') }}"></script>
        <script src="{{ asset('assets/auth/js/chart.js') }}"></script>
        <script src="{{ asset('assets/auth/js/map.js') }}"></script>
        <script src="{{ asset('assets/auth/js/custom.js') }}"></script>
        <script>
            NProgress.done();
        </script>

        @yield('scripts')
    </body>
    
    </html>
    