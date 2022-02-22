<?php

require './php_logic/config.php';
if(isset($_POST["signup"])){
    $f_name = $_POST["fname"];
    $l_name = $_POST["lname"];
    $email = $_POST["mail"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $password = $_POST["pass"];
    $password1 = $_POST["pass1"];
    $token = "23@tengun";
    if(!empty($f_name) && !empty($l_name) && !empty($email) && !empty($address) && !empty($password) && !empty($password1)){
        $chk_duplicates = mysqli_query($conn, "SELECT * FROM Users WHERE Email='$email'");
        if(mysqli_num_rows($chk_duplicates) > 0){
            header("Location: register.php?error=email_taken");
        }else{
            if($password == $password1){
                // INSERT INTO `Users` (`Id`, `F_Name`, `L_Name`, `Email`, `Gender`, `Address`, `Token`, `Password`) VALUES (NULL, 'o', 'o', 'o@o', 'M', 'k', 'o', 'o');
                $query = "INSERT INTO `Users` (`Id`, `F_Name`, `L_Name`, `Email`, `Gender`, `Address`, `Token`, `Password`) VALUES (NULL, '$f_name', '$l_name', '$email', '$gender', '$address', '$token', '$password')";
                mysqli_query($conn, $query);
                header("Location: register.php?register=success");
            }else{
            header("Location: register.php?error=passwords_mismatch");
            }
        }
    }else{
        header("Location: register.php?error=empty-fields");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Job Portal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only"></span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">Job Portal</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="" class="nav-item nav-link active">Sign Up</a>
                    <a href="index.php" class="nav-item nav-link">Sign In</a>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->
        <!-- Login Form Start -->
        <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 mt-5">
                    <?php if(isset($_GET['register'])):?>
                    <div class="text-center">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">User registration was successfull. Continue to Sign In and experience endless possibilities in Business ecosystem.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    <?php elseif(($_GET['error']) == "email_taken"): ?>
                    <div class="text-center">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">The email you entered is already taken. Register with a different email.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    <?php elseif(($_GET['error']) == "passwords_mismatch"): ?>
                    <div class="text-center">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">The passwords you entered did not match.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
                    <?php elseif(($_GET['error']) == "empty-fields"): ?>
                    <div class="text-center">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">Fill in all fields.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
                <?php endif; ?>
                <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post" action="">
                    <span class="login100-form-title fw-bold">
                        Sign Up to Job Portal
                    </span>

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter first name">
                        <input class="input100" type="text" name="fname" placeholder="First Name">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Please enter last name">
                        <input class="input100" type="text" name="lname" placeholder="Last Name">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Please enter email">
                        <input class="input100" type="text" name="mail" placeholder="Email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Please enter last name">
                        <select class="input100 border-0" name="gender">
                            <option selected disabled="">Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Please enter address">
                        <textarea class="input100" name="address" placeholder="Enter address" style="height: 150px"></textarea>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Please enter password">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Please re-enter password">
                        <input class="input100" type="password" name="pass1" placeholder="Confirm password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn p-t-13 m-b-16">
                        <button class="login100-form-btn" type="submit" name="signup">
                           Sign up
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <!-- Login Form End -->
        <!-- Footer Start -->
        <div class="container-fluid bg-dark justify-content-center text-center text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
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
    </div>
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