<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from tradee.vercel.app/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Sep 2021 08:45:48 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tradee</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="media/images/favicon.png">
    <!-- Custom Stylesheet -->


    <link rel="stylesheet" href="media/css/style.css">
    <script src="media/vendor/jquery/jquery.min.js"></script>
    <script src="public/root.script.js"></script>
</head>

<body class="dashboard">

    <div id="preloader"><i>.</i><i>.</i><i>.</i></div>

    <div id="main-wrapper">


        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="header-content">
                            <div class="header-left">
                                <div class="brand-logo">
                                    <a href="index.html">
                                        <img src="media/images/logo.png" alt="">
                                    </a>
                                </div>
                                <div class="search">
                                    <form action="#">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search Here">
                                            <span class="input-group-text"><i class="icofont-search"></i></span>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="header-right">
                                <div class="dark-light-toggle" onclick="themeToggle()">
                                    <span class="dark"><i class="icofont-moon"></i></span>
                                    <span class="light"><i class="icofont-sun-alt"></i></span>
                                </div>
                                <div class="notification dropdown">
                                    <div class="notify-bell" data-toggle="dropdown">
                                        <span><i class="icofont-alarm"></i></span>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right notification-list">
                                        <h4>Announcements</h4>
                                        <div class="lists">
                                            <a href="#" class="">
                                                <div class="d-flex align-items-center">
                                                    <span class="mr-3 icon success"><i class="icofont-check"></i></span>
                                                    <div>
                                                        <p>Account created successfully</p>
                                                        <span>2020-11-04 12:00:23</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="">
                                                <div class="d-flex align-items-center">
                                                    <span class="mr-3 icon fail"><i class="icofont-close"></i></span>
                                                    <div>
                                                        <p>2FA verification failed</p>
                                                        <span>2020-11-04 12:00:23</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="">
                                                <div class="d-flex align-items-center">
                                                    <span class="mr-3 icon success"><i class="icofont-check"></i></span>
                                                    <div>
                                                        <p>Device confirmation completed</p>
                                                        <span>2020-11-04 12:00:23</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="">
                                                <div class="d-flex align-items-center">
                                                    <span class="mr-3 icon pending"><i
                                                            class="icofont-warning"></i></span>
                                                    <div>
                                                        <p>Phone verification pending</p>
                                                        <span>2020-11-04 12:00:23</span>
                                                    </div>
                                                </div>
                                            </a>

                                            <a href="settings-activity.html">More <i
                                                    class="icofont-simple-right"></i></a>

                                        </div>
                                    </div>
                                </div>

                                <div class="profile_log dropdown">
                                    <div class="user" data-toggle="dropdown">
                                        <span class="thumb"><img src="media/images/profile/2.png" alt=""></span>
                                        <span class="arrow"><i class="icofont-angle-down"></i></span>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="user-email">
                                            <div class="user">
                                                <span class="thumb"><img src="media/images/profile/2.png" alt=""></span>
                                                <div class="user-info">
                                                    <h5>Jannatul Maowa</h5>
                                                    <span>Tradee.inc@gmail.com</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="user-balance">
                                            <div class="available">
                                                <p>Available</p>
                                                <span>0.00 BTC</span>
                                            </div>
                                            <div class="total">
                                                <p>Total</p>
                                                <span>0.00 USD</span>
                                            </div>
                                        </div>
                                        <a href="profile.html" class="dropdown-item">
                                            <i class="icofont-ui-user"></i>Profile
                                        </a>
                                        <a href="accounts.html" class="dropdown-item">
                                            <i class="icofont-wallet"></i>Wallet
                                        </a>
                                        <a href="settings-profile.html" class="dropdown-item">
                                            <i class="icofont-ui-settings"></i> Setting
                                        </a>
                                        <a href="settings-activity.html" class="dropdown-item">
                                            <i class="icofont-history"></i> Activity
                                        </a>
                                        <a href="lock.html" class="dropdown-item">
                                            <i class="icofont-lock"></i>Lock
                                        </a>
                                        <a href="signin.html" class="dropdown-item logout">
                                            <i class="icofont-logout"></i> Logout
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>