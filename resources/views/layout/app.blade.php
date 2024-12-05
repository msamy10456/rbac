@php $gs=gs() @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Jobie : jobie Job Portal Admin  Bootstrap 5 Template" />
    <meta property="og:title" content="Jobie : jobie Job Portal Admin  Bootstrap 5 Template" />
    <meta property="og:description" content="Jobie : Job Portal  Admin  Bootstrap 5 Template" />
    <meta property="og:image" content="https://jobie.dexignzone.com/xhtml/social-image.png" />
    <meta name="format-detection" content="telephone=no">
    <title>{{ $gs?->title }}</title>
    <link rel="icon" type="image/x-icon" href="{{ $gs?->logo }}">
    @yield('cssBefore')
    <link href="{{ asset('front/') }}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="{{ asset('front/') }}/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/') }}/vendor/chartist/css/chartist.min.css">
    <!-- Vectormap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/toastr.min.css') }}">
    <link href="{{ asset('front/') }}/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="{{ asset('front/') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('front/') }}/vendor/select2/css/select2.min.css">
    <link href="{{ asset('front/') }}/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <link href="{{ asset('front/') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('front/') }}/css/profile-image.css" rel="stylesheet">
    @yield('css')

</head>

<body>
    {{-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> --}}
    <div id="main-wrapper">
        <div class="nav-header">
            <a href="{{ route('admin.dashboard') }}" class="brand-logo" style="justify-content: center;">
                <img src="{{ $gs?->logo }}" width="100px" />
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                @yield('title', 'no title')
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a href="{{ route('admin.dashboard') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-television"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    @can('employee')
                    <li class="has-menu"><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-networking"></i>
                        <span class="nav-text">Employee</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('admin.employee.index') }}">All employees</a></li>
                        <li><a href="{{ route('admin.employee.create') }}">Add new employee</a></li>
                    </ul>
                </li>
                    @endcan
                    @can('admin')
                    <li class="has-menu"><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-networking"></i>
                            <span class="nav-text">Managers</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.manager.index') }}">All manager</a></li>
                            <li><a href="{{ route('admin.manager.create') }}">Add new manager</a></li>
                            <li><a href="{{ route('admin.role.index') }}">Roles</a></li>
                            <li><a href="{{ route('admin.role.create') }}">Add new roles</a></li>
                        </ul>
                    </li>
                    @endcan
                    @can('task')
                    <li class="has-menu"><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-networking"></i>
                            <span class="nav-text">Tasks</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.task.index') }}">All tasks</a></li>
                            <li><a href="{{ route('admin.task.create') }}">Add new task</a></li>
                        </ul>
                    </li>
                    @endcan
                    @can('settings')
                    <li><a href="{{ route('admin.generalsettings') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-settings-2"></i>
                            <span class="nav-text">Settings</span>
                        </a>
                    </li>
                    @endcan

                    <li><a href="{{ route('admin.logout') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-settings-2"></i>
                            <span class="nav-text">Logout</span>
                        </a>
                    </li>



                </ul>
            </div>
        </div>

        <div class="content-body">
            <div class="container-fluid">
                <!-- Add Project -->
                {{-- <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Form</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Validation</a></li>
                    </ol>
                </div> --}}
                @yield('body')
            </div>
        </div>
        <script src="{{ asset('front/') }}/vendor/global/global.min.js"></script>
        <script src="{{ asset('front/') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="{{ asset('front/') }}/vendor/select2/js/select2.full.min.js"></script>
        <script src="{{ asset('front/') }}/js/plugins-init/select2-init.js"></script>
        <script src="{{ asset('front/') }}/vendor/chart.js/Chart.bundle.min.js"></script>
        <script src="{{ asset('front/') }}/vendor/owl-carousel/owl.carousel.js"></script>
        <script src="{{ asset('front/') }}/vendor/peity/jquery.peity.min.js"></script>
        <script src="{{ asset('front/') }}/js/dashboard/dashboard-1.js"></script>
        <script src="{{ asset('front/') }}/js/custom.min.js"></script>
        <script src="{{ asset('front/') }}/js/deznav-init.js"></script>
        <script src="{{ asset('front/') }}/js/profile-image.js"></script>
        <script src="{{ asset('front/') }}/vendor/jquery-validation/jquery.validate.min.js"></script>
        <script src="{{ asset('front/') }}/js/plugins-init/jquery.validate-init.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
        <!-- Toastr -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


        <script>
            function carouselReview() {
                /*  testimonial one function by = owl.carousel.js */
                function checkDirection() {
                    var htmlClassName = document.getElementsByTagName('html')[0].getAttribute('class');
                    if (htmlClassName == 'rtl') {
                        return true;
                    } else {
                        return false;

                    }
                }
                jQuery('.testimonial-one').owlCarousel({
                    loop: true,
                    autoplay: true,
                    margin: 15,
                    nav: false,
                    rtl: true,
                    dots: false,
                    left: true,

                    navText: ['', ''],
                    responsive: {
                        0: {
                            items: 1
                        },
                        800: {
                            items: 2
                        },
                        991: {
                            items: 2
                        },

                        1200: {
                            items: 2
                        },
                        1600: {
                            items: 2
                        }
                    }
                })
                jQuery('.testimonial-two').owlCarousel({
                    loop: true,
                    autoplay: true,
                    margin: 15,
                    rtl: true,
                    nav: false,
                    dots: true,
                    left: true,
                    navText: ['', ''],
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        991: {
                            items: 3
                        },

                        1200: {
                            items: 3
                        },
                        1600: {
                            items: 4
                        }
                    }
                })
            }
            jQuery(window).on('load', function() {
                setTimeout(function() {
                    carouselReview();
                }, 1000);
            });
        </script>
        @yield('js')
        @include('addions.alert')
</body>

</html>
