<?php

    if (isset($_SESSION['authenticated_user'])) {
        echo "<script> location.href = '/' </script>";
    }

?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">


<!-- Mirrored from pixelwibes.com/template/my-task/html/dist/ui-elements/auth-two-step by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Nov 2024 04:39:44 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>:: My-Task:: Two Step</title>
    <link rel="icon" href="../../../public/assets/images/favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <!-- project css file  -->
    <link rel="stylesheet" href="../../../public/assets/css/my-task.style.min.css">
</head>

<body  data-mytask="theme-indigo">

<div id="mytask-layout">

    <!-- main body area -->
    <div class="main p-2 py-3 p-xl-5">
        
        <!-- Body: Body -->
        <div class="body d-flex p-0 p-xl-5">
            <div class="container-xxl">

                <div class="row g-0">
                    <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                        <div style="max-width: 25rem;">
                            <div class="text-center mb-5">
                                 <svg  width="4rem" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                    </svg>
                            </div>
                            <div class="mb-5">
                                <h2 class="color-900 text-center">My-Task Let's Management Better</h2>
                            </div>
                            <!-- Image block -->
                            <div class="">
                                <img src="../../../public/assets/images/login-img.svg" alt="login-img">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                        <div class="w-100 p-3 p-md-5 card border-0 bg-dark text-light" style="max-width: 32rem;">
                            <!-- Form -->
                            <form class="row g-1 p-3 p-md-4" action="/2FA/verify" method="POST">
                                <div class="col-12 text-center mb-1 mb-lg-5">
                                    <img src="../../../public/assets/images/verify.svg" class="w240 mb-4" alt="" />
                                    <h1>Verification</h1>
                                    <span>We sent a verification code to your email. Enter the code from the email in the field below.</span>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <input type="text" maxlength="1" class="form-control form-control-lg text-center" id="otp1" placeholder="-" oninput="moveToNext(this, 'otp2')">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <input type="text" maxlength="1" class="form-control form-control-lg text-center" id="otp2" placeholder="-" oninput="moveToNext(this, 'otp3')">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <input type="text" maxlength="1" class="form-control form-control-lg text-center" id="otp3" placeholder="-" oninput="moveToNext(this, 'otp4')">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <input type="text" maxlength="1" class="form-control form-control-lg text-center" id="otp4" placeholder="-" oninput="combineOTP()">
                                    </div>
                                </div>
                                <div>
                                    <input type="hidden" name="otp" id="result">
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" name="verify" class="btn btn-lg btn-block btn-light lift text-uppercase">Verify my account</button>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <span class="text-muted">Haven't received it? <a href="#" class="text-secondary">Resend a new code.</a></span>
                                </div>
                            </form>
                            <!-- End Form -->
                            
                        </div>
                    </div>
                </div> <!-- End Row -->
                
            </div>
        </div>

    </div>

</div>

<!-- Jquery Core Js -->
<script src="../../../public/assets/bundles/libscripts.bundle.js"></script>
<script src="../../../public/assets/js/page/auth.js"></script>

</body>

<!-- Mirrored from pixelwibes.com/template/my-task/html/dist/ui-elements/auth-two-step by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Nov 2024 04:39:45 GMT -->
</html>