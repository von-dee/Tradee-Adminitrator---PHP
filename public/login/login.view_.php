<!doctype html>
<html lang="en">

<!-- Mirrored from primex.laborasyon.com/demos/vertical/default/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Jul 2021 20:39:09 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Timeline Trust - Client</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="media/media/image/logo_.png"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="media/vendors/bundle.css" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="media/css/app.min.css" type="text/css">
</head>
<body class="form-membership">

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

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<div class="form-wrapper">

    
    <!-- logo -->
    <div id="logo">
        <img class="logo" src="media/media/image/logo.png" alt="image" style="height: 3.5em;">
        <img class="logo-dark" src="media/media/image/logo-dark.html" alt="image">
    </div>
    <!-- ./ logo -->

    <h5>Sign in</h5>

    <!-- form -->
    <form action="index.php?action=index&pg=1" method="post" enctype="application/x-www-form-urlencoded" name="loginForm" id="loginForm" autocomplete="off">
    <?php echo (($msg))?'<div class="errormsg">'.$msg.'</div>':''; ?>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username or email" name="uname" required autofocus>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="pwd" required>
        </div>
        <div class="form-group d-flex justify-content-between">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" checked="" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
            </div>
            <a href="pages-recovery-password.html">Reset password</a>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Sign in</button>       
        <input type="hidden" name="doLogin" id="doLogin" value="systemPingPass" />
        <?php $session->set('1_token', $token);  ?>
        <hr>

        <!-- <hr> -->
        <!-- <p class="text-muted">Don't have an account?</p>
        <a href="pages-register.html" class="btn btn-outline-light btn-sm">Register now!</a> -->

    </form>
    <!-- ./ form -->


</div>

<!-- Plugin scripts -->
<script src="media/vendors/bundle.js"></script>

<!-- App scripts -->
<script src="media/js/app.min.js"></script>
</body>

<!-- Mirrored from primex.laborasyon.com/demos/vertical/default/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Jul 2021 20:39:09 GMT -->
</html>
