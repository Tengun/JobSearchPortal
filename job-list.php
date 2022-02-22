<?php
    require './php_logic/config.php';
    if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    }else{
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Job List</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
<style type="text/css">
     button, input, select{
        box-shadow: none !important;
      }
</style>

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
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Jobs</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="job-list.php" class="dropdown-item active">List</a>
                        </div>
                    </div>
                    <a href="about.php" class="nav-item nav-link">About Us</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <a href="logout.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Logout</a>
            </div>
        </nav>

        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    
                    <?php if(isset($_GET['message'])):?>
                    <?php $job_id = $_GET['message']; ?>
                    <?php 
                        $b_result = mysqli_query($conn, "SELECT * FROM `Jobs` WHERE `Id` = $job_id");
                        $b_row = mysqli_fetch_assoc($b_result);
                        $job_name = $b_row["Name"];
                    ?>
                    <div>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Application for job (<?php echo $job_name; ?>) was successfull. Visit your <a href="repository.php" class="alert-link">repository</a> to view all the jobs you applied.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- unapply message -->
                <?php if(isset($_GET['message2'])):?>
                    <?php $job_id = $_GET['message2']; ?>
                    <?php 
                        $b_result = mysqli_query($conn, "SELECT * FROM `Jobs` WHERE `Id` = $job_id");
                        $b_row = mysqli_fetch_assoc($b_result);
                        $job_name = $b_row["Name"];
                    ?>
                    <div>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">You have successfully unapplied job (<?php echo $job_name; ?>).Visit your <a href="repository.php" class="alert-link">repository</a> to view all the jobs you applied.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php endif; ?>
                    <!-- job start -->
                    <?php
                        $a_result = mysqli_query($conn, "SELECT * FROM `Applied_Jobs` WHERE `User_Id` = $id");
                        $a_counter = mysqli_num_rows($a_result);
                    ?>


                    <?php
                        $result = mysqli_query($conn, "SELECT * FROM `Jobs`");
                        $counter = mysqli_num_rows($result);
                    ?>

                        <?php if(mysqli_num_rows($result) == 0): ?>
                          <div class="alert alert-success">
                            <strong>Ooops!</strong> No Jobs Posted Today.
                        </div>
                        <?php else: ?>
                        <?php $i = 0; ?>
                        <?php while($i < $counter): ?>
                        <?php $row = mysqli_fetch_assoc($result); ?>
                        <?php $a_row = mysqli_fetch_assoc($a_result); ?>
                        <?php $job_id_row = $a_row["Job_Id"]; ?>
                        <?php 
                        $jobId = $row["Id"];
                        $name = $row["Name"];
                        $vacancy_number = $row['Employee_Number'];
                        $location = $row["Location"];
                        $employer = $row['Employer'];
                        $mode = $row["Mode"];
                        $pay = $row["Pay"];
                        $Date_Line = $row["Date_Line"];
                        $Publish_Date = $row["Publish_Date"];
                        $Category = $row["Category"];
                        ?>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3"> <?php echo $name." "."(".$employer.")" ?> </h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i> <?php echo $location ?> </span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i> <?php echo $mode ?> </span>
                                            <span class="text-truncate me-3"><i class="far fa-money-bill-alt text-primary me-2"></i> <?php echo $pay ?> </span>
                                            <span class="text-truncate me-0"><i class="fa fa-times-circle text-primary me-2"></i> <?php echo $vacancy_number ?> </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                        <?php
                                        $applied_job_result = mysqli_query($conn, "SELECT * FROM `Applied_Jobs` WHERE `User_Id` = '$id' AND `Job_Id` = '$jobId'");
                                        $applied_job_counter = mysqli_num_rows($applied_job_result);
                                        ?>
                                        <?php if($applied_job_counter == 0): ?>
                                        <a class="btn btn-primary" href="apply.php?apply=<?php echo $jobId; ?>">Apply Now</a>
                                        <a class="btn btn-warning" href="job-detail.php?job-details=<?php echo $jobId; ?>">View</a>
                                        <?php else: ?>
                                    <a class="btn btn-danger" href="unaply.php?unaply=<?php echo $jobId; ?>">Unapply</a>
                                        <a class="btn btn-warning" href="job-detail.php?job-details=<?php echo $jobId; ?>">View</a>
                                        <?php endif; ?>
                                        
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Application Due Date: <?php echo $Date_Line ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <!-- job end -->
                </div>
            </div>
        </div>
        <!-- Jobs End -->
        <!-- <?php
        $result = mysqli_query($conn, "SELECT * FROM `Applied_Jobs` WHERE `User_Id` = '$id' AND `Job_Id` = '$jobId'");
        $counter = mysqli_num_rows($result);
        ?>
        <?php if($counter == 0): ?>
        <a class="btn btn-primary" href="apply.php?apply=<?php echo $jobId; ?>">Apply Now</a>
        <?php else: ?>
        <a class="btn btn-warning" href="repository.php">View</a>
        <?php endif; ?> -->


        <!-- Footer Start -->
       <!--  <div class="container-fluid bg-dark justify-content-center text-center text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
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
        </div> -->
        <!-- Footer End -->
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="js/main.js"></script>
</body>

</html>