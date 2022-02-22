<?php

require './php_logic/config.php';
if(!empty($_SESSION["id"])){

}else{
    header("Location: index.php");
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Job Details</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

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
                <span class="sr-only">Loading...</span>
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
                    <a href="home.php" class="nav-item nav-link">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Jobs</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="job-list.php" class="dropdown-item">Job List</a>
                            <!-- <a href="job-detail.html" class="dropdown-item active">Job Detail</a> -->
                        </div>
                    </div>
                    
                    <a href="about.php" class="nav-item nav-link">About Us</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <a href="logout.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Sign Out</a>
            </div>
        </nav>
        <!-- Navbar End -->
        <?php if(isset($_GET['job-details'])):?>
        <?php $job_id = $_GET['job-details']; ?>

        <?php
            $result = mysqli_query($conn, "SELECT * FROM `Jobs` WHERE `Id` = $job_id");
            $counter = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);
            $job_name = $row["Name"];
            $jobId = $row["Id"];
            $employer = $row['Employer'];
            $name = $row["Name"];
            $vacancy_number = $row['Employee_Number'];
            $location = $row["Location"];
            $employer = $row['Employer'];
            $mode = $row["Mode"];
            $pay = $row["Pay"];
            $units = $row['Units'];
            $payment_mode = $row['Payment_Mode'];
            $Date_Line = $row["Date_Line"];
            $position = $row['Position'];
            $Publish_Date = $row["Publish_Date"];
            $Category = $row["Category"];
            $desc = $row['Description'];
            $resp = $row['Responsibilities'];
            $qualifications = $row['Qualifiacations'];
            $contact_email = $row['Contact_Email'];
            $contact_phone = $row['Contact_Phone'];
        ?>
    <?php endif; ?>


        <!-- Job Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center">
                            
                            <div class="text-start">
                                <h3 class="mb-3"><?php echo $job_name; ?></h3>
                                <!-- <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $location; ?></span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?php echo $mode; ?></span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?php echo $pay." ".$units ?></span> -->
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Job description</h4>
                            <p><?php echo $desc; ?></p>
                            <h4 class="mb-3">Responsibility</h4>
                            <p><?php echo $resp; ?></p>
                            <h4 class="mb-3">Qualifications</h4>
                            <p><?php echo $qualifications; ?></p>
                        </div>
        
                    </div>
        
                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summary</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Company: <?php echo $employer; ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Signed By: <?php echo $position; ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Contact Email: <?php echo $contact_email; ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Contact Phone: <?php echo $contact_phone; ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: <?php echo $Publish_Date; ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Application Due Date: <?php echo $Date_Line; ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: <?php echo $vacancy_number; ?> Position/s</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: <?php echo $mode; ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: <?php echo $pay." ".$units; ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Payment Mode: <?php echo $payment_mode ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Location: <?php echo $location; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Detail End -->


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