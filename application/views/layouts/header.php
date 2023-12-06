<!DOCTYPE html>
<html>
    <head>
        <base href="<?php echo base_url(); ?>">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Star Rating</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
        <link href="https://fonts.googleapis.com/css2?family=Artegra&family=Russo+One&display=swap" rel="stylesheet">
        <link href="<?php echo base_url('public/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <!-- Vendor CSS Files -->
        <link href="<?php echo base_url('public/theme/onepage/vendor/aos/aos.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/theme/onepage/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/theme/onepage/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/theme/onepage/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/theme/onepage/vendor/glightbox/css/glightbox.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/theme/onepage/vendor/remixicon/remixicon.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/theme/onepage/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">
        <!-- Template Main CSS File -->
        <link href="<?php echo base_url('public/theme/onepage/css/style.css'); ?>" rel="stylesheet">

        <!-- Data table css -->
		<link href="<?php echo base_url('public/plugin/datatable/css/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet" />
		<link href="<?php echo base_url('public/plugin/datatable/css/buttons.bootstrap4.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('public/plugin/datatable/responsive.bootstrap4.min.css'); ?>" rel="stylesheet" />

        <link href="<?php echo base_url('public/plugin/select2/select2.min.css'); ?>" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">

        <style>
            body {
                font-family: 'Russo One', sans-serif;
            }

            .rating {
                display: inline-block;
                font-size: 0;
            }

            .star {
                font-size: 3rem;
                color: #ccc;
                cursor: pointer;
                transition: color 0.3s;
                display: inline-block;
                margin-right: 5px;
            }

            .star:hover,
            .star.active {
                color: #ffcc00; /* Change the color to your desired hover color */
            }

            .star2 {
                font-size: 3rem;
                color: #ccc;
                cursor: pointer;
                transition: color 0.3s;
                display: inline-block;
                margin-right: 5px;
            }

            .star2:hover,
            .star2.active {
                color: #ffcc00; /* Change the color to your desired hover color */
            }

            .background-container {
                width: 100%; /* Adjust as needed */
                height: 100vh; /* Adjust as needed */
                background-image: url('landingpage.svg');
                background-size: cover; /* You can use 'cover', 'contain', or other values */
                background-repeat: no-repeat; /* Prevent the image from repeating */
                background-position: center center; /* Center the image horizontally and vertically */
            }

            .bg-cyan {
                background-color: #009CAD;
                color: #fff;
            }

            .btn-pill-cyan {
                background-color: #00a3b5;
                border: none;
                color: #fff;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                margin: 4px 2px;
                cursor: pointer;
                border-radius: 22px;
            }

            .btn-pill-success {
                background-color: #00a3b5;
                border: none;
                color: #fff;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                margin: 4px 2px;
                cursor: pointer;
                border-radius: 22px;
            }

            .btn-pill-orange {
                background-color: #00a3b5;
                border: none;
                color: #fff;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                margin: 4px 2px;
                cursor: pointer;
                border-radius: 22px;
            }

            /* .card-body {
                margin: 0;
                padding: 0;
                background-image: url('landingpage.png');
                background-size: 100% 100%;
                background-position: center center;
            }

            @media (max-width: 768px) {
                .card-body {
                    margin: 0;
                    padding: 0;
                    background-image: url('landingpage.png');
                    background-size: 100% 100%;
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    overflow-y: hidden;
                    background-position: center center;
                }
            } */

            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                font-size: 3.5rem;
                }
            }

            #navbar li a:hover{
                font-size: 18px;
                text-decoration: underline;
                color: #ffa959;
            }

            .artegra-font {
                font-family: 'Artegra', sans-serif;
            }

            /* Apply Russo One font to headings with class "russo-font" */
            .russo-font {
                font-family: 'Russo One', sans-serif;
            }

            #main {
                font-family: 'Artegra', sans-serif;
            }

            .btn-social {
                background-color: #009CAD;
                color: #fff;
                border-style: solid;
                border-color: #00425F;
                border-width: 0px 0px 9px 0px;
                border-radius: 20px 20px 20px 20px;
            }

            .btn-social:hover {
                background-color: #e76f44;
                border-style: solid;
                border-color: #00425F;
                border-width: 0px 0px 9px 0px;
                border-radius: 20px 20px 20px 20px;
            }

            .card {
                background-color: #009CAD;
                color: #fff;
                border-style: solid;
                border-color: #00425F;
                border-width: 0px 0px 9px 0px;
                border-radius: 20px 20px 20px 20px;
            }

            /* .card:hover {
                color: #e76f44;
            } */

            .card button, .card a, button {
                background-color: #002838;
                color: #fff;
            }

            .card button:hover, .card a:hover, button:hover {
                background-color: #ffd530;
                color: #0a0a0a;
                transition: 0.3s;
            }

            .btn-pill-cyan {
                background-color: #00a3b5;
                border-style: solid;
                border-color: #00425F;
            }

            .btn-pill-success {
                background-color: #28a745;
                border-style: solid;
                border-color: #00425F;
            }

            .btn-pill-orange {
                background-color: #E76F44;
                border-style: solid;
                border-color: #00425F;
            }

            .btn-pill-cyan:hover {
                background-color: #e76f44;
                border-style: solid;
                border-color: #00425F;
            }

            .swal-overlay {
                background-color: rgba(43, 165, 137, 0.45);
            }

            .swal-footer {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .bs-canvas-overlay {
                opacity: 0.85;
                z-index: 1100;
            }
            
            .bs-canvas {
                top: 0;
                z-index: 1110;
                overflow-x: hidden;
                overflow-y: auto;
                width: 330px;
                transition: margin .4s ease-out;
                -webkit-transition: margin .4s ease-out;
                -moz-transition: margin .4s ease-out;
                -ms-transition: margin .4s ease-out;
            }
            
            .bs-canvas-left {
                left: 0;
                margin-left: -330px;
            }
            
            .bs-canvas-right {
                right: 0;
                margin-right: -330px;
            }

            .select2-container {
                z-index: 1055 !important; /* Adjust the value as needed */
            }
        </style>
        <!-- <link href="public/css/dashboard.css" rel="stylesheet"> -->
    </head>
<body>

    <header id="header" class="fixed-top border-bottom-0">
        <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="page/rating" style="color: #ffa959;">OctoPro</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
            <?php if ($this->ion_auth->logged_in()) { ?>
                <li><a class="nav-link scrollto active" href="page">Home</a></li>
                <li><a class="nav-link scrollto" href="page/report">Report</a></li>
                <li><a class="nav-link scrollto" href="page/send_follow_up_email_view">Email Migration</a></li>
                <li class="dropdown"><a href="#"><span>Configuration<i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a class="nav-link scrollto" href="configuration/email_configuration">Auto Mail Process</a></li>
                        <li><a class="nav-link scrollto" href="configuration/sms_configuration">Auto SMS Process</a></li>
                        <li><a class="nav-link scrollto" href="configuration/customer_list">List of Clients</a></li>
                        <li><a class="nav-link scrollto" href="page/list_of_refer">List of Referral</a></li>
                        <li><a class="nav-link scrollto" href="reward">List of Reward</a></li>
                        <li><a class="nav-link scrollto" href="configuration/rating_list">Rating Configuration</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Pages View<i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a class="nav-link scrollto" href="page/rating">Review Page</a></li>
                        <li><a class="nav-link scrollto" href="page/thank_you">Thank You Page</a></li>
                        <li><a class="nav-link scrollto" href="page/mailing">Mailing Page</a></li>
                        <li><a class="nav-link scrollto" href="page/redirects">Social Media Review Page</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="page/rating"><span><?php echo $this->session->userdata('identity'); ?></span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                    <li><a href="#">Profile</a></li>
                    <li><a href="auth/change_password">Change Password</a></li>
                    <li><a href="setting">Settings</a></li>
                    <li><a href="auth/logout">Logout</a></li>
                    </ul>
                </li>
            <?php } else { ?>
                <li><a class="nav-link scrollto active" href="page/send_request_for_referral_and_reward_view">Referrals and Rewards</a></li>
                <li><a class="nav-link scrollto active" href="auth/login">Sign In</a></li>
            <?php } ?>
            <!-- <li><a class="nav-link scrollto o" href="#portfolio">Portfolio</a></li>
            <li><a class="nav-link scrollto" href="#team">Team</a></li>
            <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
            <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                    </ul>
                </li>
                <li><a href="#">Drop Down 2</a></li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
                </ul>
            </li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li><a class="getstarted scrollto" href="#about">Get Started</a></li> -->
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- <div class="container-fluid">
        <div class="row"> -->
            <!-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="page/rating">
                        <span data-feather="home"></span>
                        Review <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="page/send_follow_up_email_view">
                        <span data-feather="file"></span>
                        Email Migration
                        </a>
                    </li>
                    </ul>
                </div>
            </nav> -->