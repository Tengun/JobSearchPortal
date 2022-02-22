<?php

require './php_logic/config.php';
if(!empty($_SESSION["id"])){

}else{
    header("Location: index.php");
  }

?>

<?php
if(isset($_POST["jpost"])){
    $employer = $_POST["employer"];
    $category = $_POST["category"];
    $mode = $_POST["mode"];
    $jname = $_POST["jname"];
    $dline = $_POST["dline"];
    $pay = $_POST["pay"];
    $units = $_POST["units"];
    $empnum = $_POST["empnum"];
    $location = $_POST["location"];
    $now = date("Y/m/d");
    $date = $now;
    $position = $_POST["position"];
    $payment_mode = $_POST["pay_mode"];
    $desc = $_POST["desc"];
    $resp = $_POST["resp"];
    $qualifications = $_POST["qualifications"];
    $contact_email = $_POST['contact_email'];
    $contact_phone = $_POST['contact_phone'];

    // !empty($employer) || !empty($jname) || !empty($position) || !empty($pay) || !empty($empnum) || !empty($location) || !empty($description) || !empty($responsibilities) || !empty($qualifications

    if(!empty($employer) && !empty($jname) && !empty($position) && !empty($pay) && !empty($empnum) && !empty($location) && !empty($desc) && !empty($resp) && !empty($qualifications)){
    // $query = "INSERT INTO `Jobs` (`Id`, `Name`, `Location`, `Mode`, `Date_Line`, `Publish_Date`, `Pay`, `Payment_Mode`, `Units`, `Category`, `Employee_Number`, `Employer`, `Position`, `Description`, `Responsibilities`, `Qualifiacations`) VALUES (NULL, '$jname', '$location', '$mode', '$dline', '$date', '$pay', $payment_mode, '$units', '$category', '$empnum', '$employer', '$position', '$desc', '$resp', '$qualifications')";
    $query = "INSERT INTO `Jobs` (`Id`, `Name`, `Location`, `Mode`, `Date_Line`, `Publish_Date`, `Contact_Email`, `Contact_Phone`, `Pay`, `Payment_Mode`, `Units`, `Category`, `Employee_Number`, `Employer`, `Position`, `Description`, `Responsibilities`, `Qualifiacations`) VALUES (NULL, '$jname', '$location', '$mode', '$dline', '$date', '$contact_email', '$contact_phone', '$pay', '$payment_mode', '$units', '$category', '$empnum', '$employer', '$position', '$desc', '$resp', '$qualifications');";
    mysqli_query($conn, $query);
    header("Location: postjob.php?success=success");
    }else{
        header("Location: postjob.php?error=empty_fields");
    }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Job Post</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/login/css/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/login/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
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
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-light p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary logo">Job Portal</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="home.php" class="nav-item nav-link">Home</a>
                    <a href="" class="nav-item nav-link active">Post Job</a>
                </div>
                <a href="logout.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Logout</a>
            </div>
        </nav>
        <!-- Navbar End -->
        <!-- Login Form Start -->
        <div class="container mt-5">
                            <h4 class="mb-4 text-primary logo">Post A Job</h4>
                           <?php if(isset($_GET['success'])):?>
                    <div class="text-center">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">Job posting was successfull. Individuals all over the world using Job Portal will be able to see your vacancy notification.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    <?php elseif(isset($_GET['error'])): ?>
                        <div class="text-center">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">Failed! Provide necessary data to all fields to successfully post a job.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php endif; ?>
                            <form method="post" action="">
                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" name="employer" class="form-control" placeholder="Company Name">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" name="jname" class="form-control" placeholder="Job Name">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" name="position" class="form-control" placeholder="What position do you hold to the mentioned company?">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <select class=" form-control" name="mode">
                                            <option selected disabled>Job Mode</option>
                                            <option value="Full Time">Full Time</option>
                                            <option value="Contract">Contract</option>
                                            <option value="Part Time">Part Time</option>
                                            <option value="Negotiable">Negotiable</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="email" name="contact_email" class="form-control" placeholder="Contact Email">
                                    </div><div class="col-12 col-sm-6">
                                        <input type="text" name="contact_phone" class="form-control" placeholder="Contact Phone">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" name="empnum" class="form-control" placeholder="Vacancy">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <select class=" form-control" name="category">
                                            <option selected disabled>Category</option>
                                            <?php 
                                            $result = mysqli_query($conn, "SELECT * FROM `Category`");
                                            $counter = mysqli_num_rows($result);
                                            ?>
                                            <?php if(mysqli_num_rows($result) == 0): ?>
                                            <option disabled>No categories available </option>
                                            <?php else: ?>
                                            <?php $i = 0; ?>
                                            <?php while($i < $counter): ?>
                                            <?php $row = mysqli_fetch_assoc($result); ?>
                                            <?php $cat = $row["Name"]; ?>
                                            <option value='<?php echo $cat; ?>'><?php echo $cat; ?></option>
                                            <?php $i++; ?>
                                            <?php endwhile; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" name="pay" class="form-control" placeholder="Job Pay">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <select class=" form-control" name="units">
                                            <option selected disabled>Units</option>
                                            <option value="US">US Dollar</option>
                                            <option value="ZWD">Zimbabwe Dollar</option>
                                            <option value="Rand">Rand</option>
                                            <option value="Pula">Pula</option>
                                            <option value="Negotiable">Negotiable</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <select class=" form-control" name="pay_mode">
                                            <option selected disabled>Payment Mode</option>
                                            <option value="Negotiable">Per Day</option>
                                            <option value="Negotiable">Per Week</option>
                                            <option value="Negotiable">Per Month</option>
                                            <option value="Negotiable">Per Year</option>
                                            <option value="Negotiable">Negotiable</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input class="form-control" type="date" name="dline"> 
                                    </div>
                                    <div class="col-6">
                                        <textarea class="form-control" name="location" rows="5" placeholder="Job Location"></textarea>
                                    </div>
                                    <div class="col-6">
                                        <textarea class="form-control" name="desc" rows="5" placeholder="Job Description"></textarea>
                                    </div>
                                    <div class="col-6">
                                        <textarea class="form-control" name="resp" rows="5" placeholder="Job Responsibilities"></textarea>
                                    </div>
                                    <div class="col-6">
                                        <textarea class="form-control" name="qualifications" rows="5" placeholder="Job Qualifications"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit" name="jpost">Post Job</button>
                                    </div>
                                </div>
                            </form>
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

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>