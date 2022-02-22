<?php

require './php_logic/config.php';
if(isset($_POST["signin"])){
    $email = $_POST["email"];
    $password = $_POST["pass"];
    if(!empty($email) && !empty($password)){
        $result = mysqli_query($conn, "SELECT * FROM `Users` WHERE `Email` = '$email' AND `Password` = '$password'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
            $_SESSION["id"] = $row["Id"];
            $_SESSION["email"] = $row["Email"];
            header("Location: home.php");
        }else{
            header("Location: index.php?error=failed");
        }
    }else{
        header("Location: index.php?error=empty-fields");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Job Portal Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/login/css/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/login/css/vendor/animate/animate.css"> 
    <link rel="stylesheet" type="text/css" href="css/login/css/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="css/login/css/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="css/login/css/vendor/select2/select2.min.css"> 
    <link rel="stylesheet" type="text/css" href="css/login/css/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="css/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="css/login/css/main.css">

    <!-- Google Web Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
     -->
    <!-- Icon Font Stylesheet -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"> -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="bg-white">
    <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">Job Portal</h1>
            </a>
            <!-- <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="" class="nav-item nav-link active">Sign In</a>
                    <a href="about.php" class="nav-item nav-link">About Us</a>
                </div>
                <!-- <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job</a> -->
            </div>
        </nav>
        <!-- Navbar End -->
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                 <?php if($_GET['error'] == "empty-fields"):?>
                    <div class="text-center">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">Fill in all fields.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    <?php elseif($_GET['error'] == "failed"):?>
                    <div class="text-center">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorect email or password.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php endif; ?>
                <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method=post>
                    <span class="login100-form-title fw-bold">
                        Sign In to Job Portal
                    </span>

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email">
                        <input class="input100" type="email" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Please enter password">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                    </div>

                   <!--  <div class="text-right p-t-13 p-b-23">
                        <span class="txt1">
                            Forgot
                        </span>

                        <a href="#" class="txt2">
                            Username / Password?
                        </a>
                    </div> -->

                    <div class="container-login100-form-btn">
                        <button type="submit" name="signin" class="login100-form-btn">
                            Sign in
                        </button>
                    </div>

                    <div class="flex-col-c p-t-40 p-b-40">
                        <span class="txt1 p-b-9">
                            Don’t have an account?
                        </span>

                        <a href="register.php" class="txt3">
                            Sign up now
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <!-- Footer Start -->
        <div class="container-fluid bg-dark justify-content-center text-center text-white-50 footer pt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="copyright">
                    <div class="">
                        <div class="text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="" href="#">Job Portal, All Right Reserved. <br/>
                            Developed By Gwese, Mangobe, Tenga, Hove, Mangarani</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    
    <script src="css/login/css/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="css/login/css/vendor/animsition/js/animsition.min.js"></script>
    <script src="css/login/css/vendor/bootstrap/js/popper.js"></script>
    <script src="css/login/css/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="css/login/css/vendor/select2/select2.min.js"></script>
    <script src="css/login/css/vendor/daterangepicker/moment.min.js"></script>
    <script src="css/login/css/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="css/login/css/vendor/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script>

</body>
</html>