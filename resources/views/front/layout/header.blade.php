<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>Html Framework</title>
<meta name="description" content="," />

<link rel="icon" type="icon/png" href="{{ asset('front/images/favicon.png') }}">

<link href="{{ asset('front/css/reset.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('front/css/ace-responsive-menu.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('front/css/animate.4.1.1.css') }}" rel="stylesheet" type="text/css" />

<!---fonts-->
<link href="{{ asset('front/css/fontawesome.7.0.1.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<!-- slider -->
<link href="{{ asset('front/plugins/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('front/plugins/owl-carousel/owl.theme.default.min.css') }}" rel="stylesheet">

<link href="{{ asset('front/plugins/venobox/venobox.min.css') }}" rel="stylesheet" type="text/css" media="screen" />

<!-- Bootstrap Core CSS -->
<link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
<!--Datepicker-->
<link href="{{ asset('admin/assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

<!-- Select Search -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/selects_search/select2.min.css') }}">

<link href="{{ asset('front/css/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('front/css/responsive.css') }}" rel="stylesheet" type="text/css" />

<!-- <script src="js/jquery.3.7.1.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</head>

<body>

<header>
    <div class="waves_shape header_waves_top" aria-hidden="true" data-negative="false"> 
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
            <path class="waves_color_fill" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
            <path class="waves_color_fill" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
            <path class="waves_color_fill" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
        </svg>
    </div>

    <div class="container">
        <div class="inner_container">
             <nav>
                <!-- Menu Toggle btn-->
                <div class="menu-toggle">
                    <!-- <h3>Menu</h3> -->
                    <button type="button" id="menu-btn">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Responsive Menu Structure-->
                <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
                <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
                    <li>
                        <a href="{{ route('home') }}">
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about_us') }}">
                            <span>About us</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('service') }}">
                            <span>Service</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blogs') }}">
                            <span>Blog</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact_us') }}">
                            <span>Contact us</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="logo">
                <a href="{{ route('home') }}"><img src="{{ asset('front/images/logo.png') }}" alt="" /></a>
            </div>
            <div class="left_side">
                <div class="call_icon">
                    <a href="tel:+123-456-7890">
                        <span class="icon"><i class="fa-solid fa-headset"></i></span>
                        <span class="txt">+123-456-7890</span>
                    </a>
                </div>
                <div class="get_appointment">
                    <a href="#" class="request_callback">GET APPOINTMENT</a>
                </div>
            </div>
        </div>
    </div>
    <div class="waves_shape header_waves_bottom" aria-hidden="true" data-negative="false">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
            <path class="waves_color_fill" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
            <path class="waves_color_fill" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
            <path class="waves_color_fill" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
        </svg>
    </div>
</header>
<!-- End of Responsive Menu -->

<div id="main">