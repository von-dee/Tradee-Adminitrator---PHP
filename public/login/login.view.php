<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from tradee.vercel.app/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Sep 2021 08:46:09 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tradee</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="media/images/favicon.png">
    <!-- Custom Stylesheet -->


    <link rel="stylesheet" href="media/css/style.css">
</head>

<body class="@@dashboard">

    <?php if(isset($attempt_in)){?>
        <div class="alert-danger">
            <?php
                if($attempt_in < 3){
                    $msg =  'Invalid user name or password.';
                }else if($attempt_in =='11'){
                    $msg = 'Invalid Code entered.';
                }else if($attempt_in =='120'){
                    $msg = 'Suspended account.';
                }else if($attempt_in =='140'){
                    $msg = 'Locked. Wait for 5min and try again.';
                }else if($attempt_in =='110'){
                    $msg = 'User account locked.';
                }
            ?>   
        </div>
    <?php }  $token= generateFormToken(); ?>


    <div id="preloader"><i>.</i><i>.</i><i>.</i></div>

    <div id="main-wrapper">
        <div class="authincation section-padding">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-xl-5 col-md-6">
                        <div class="mini-logo text-center my-4">
                            <a href="intro.html"><img src="media/images/logo.png" alt=""></a>
                            <h4 class="card-title mt-3">Sign in to Tradee</h4>
                        </div>
                        <div class="auth-form card">
                            <div class="card-body">
                                <form class="signin_validate row g-3" action="index.php?action=index&pg=1" method="post" enctype="application/x-www-form-urlencoded" name="loginForm" id="loginForm" autocomplete="off">
                                    
                                    <?php echo (($msg))?'<div class="errormsg">'.$msg.'</div>':''; ?>

                                    <div class="col-12">
                                        <input type="email" class="form-control" placeholder="hello@example.com"
                                            name="uname">
                                    </div>
                                    <div class="col-12">
                                        <input type="password" class="form-control" placeholder="Password"
                                            name="pwd">
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Remember
                                                me</label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="reset.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                        
                                        <input type="hidden" name="doLogin" id="doLogin" value="systemPingPass" />
                                        <?php $session->set('1_token', $token);  ?>
                                    </div>
                                </form>
                                <p class="mt-3 mb-0">Don't have an account? <a class="text-primary"
                                        href="signup.html">Sign
                                        up</a></p>
                            </div>

                        </div>
                        <div class="privacy-link">
                            <a href="signup.html">Have an issue with 2-factor
                                authentication?</a>
                            <br />
                            <a href="signup.html">Privacy Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="media/vendor/jquery/jquery.min.js"></script>
    <script src="media/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="media/js/scripts.js"></script>


</body>


<!-- Mirrored from tradee.vercel.app/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Sep 2021 08:46:10 GMT -->

</html>