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
    <title>Job Repository</title>
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
                    <a href="" class="nav-item nav-link active">Job Repository</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="job-list.php" class="dropdown-item">List</a>
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
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">My Job Repository</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <!-- job start -->
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM `Applied_Jobs` WHERE `User_Id` = $id");
                        $counter = mysqli_num_rows($result);
                        ?>
                        <?php if($counter == 0): ?>
                          <div class="alert alert-success">
                            <strong>Ooops!</strong> You haven't applied for a job yet! All jobs applied pending reply can be viewed here.
                        </div>
                        <?php else: ?>
                        <?php $i = 0; ?>
                        <?php while($i < $counter): ?>
                        <?php $row = mysqli_fetch_assoc($result); ?>
                        <?php $job_id_row = $row["Job_Id"]; ?>

                        <!-- apply message -->

                    <?php if(isset($_GET['unapply'])):?>
                    <?php $job_id = $_GET['unapply']; ?>
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


                        <?php
                            $get_job = mysqli_query($conn, "SELECT * FROM `Jobs` WHERE `Id` = $job_id_row");
                            // $get_job_location = mysqli_query($conn, "SELECT `Location` FROM `Jobs` WHERE `Id` = $job_id_row");
                            // $get_job_mode = mysqli_query($conn, "SELECT `Mode` FROM `Jobs` WHERE `Id` = $job_id_row");
                            // $get_job_pay = mysqli_query($conn, "SELECT `Pay` FROM `Jobs` WHERE `Id` = $job_id_row");
                            $job_row = mysqli_fetch_assoc($get_job);
                            $job_name = $job_row["Name"];
                            $job_location = $job_row["Location"];
                            $job_mode = $job_row["Mode"];
                            $job_employer = $job_row['Employer'];
                            $job_pay = $job_row["Pay"];
                            $vacancy = $job_row['Employee_Number'];
                            $application_deadline = $job_row['Date_Line'];
                        ?>

                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3"> <?php echo $job_name." "."(".$job_employer.")" ?> </h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i> <?php echo $job_location ?> </span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i> <?php echo $job_mode ?> </span>
                                            <span class="text-truncate me-3"><i class="far fa-money-bill-alt text-primary me-2"></i> <?php echo $job_pay ?> </span>
                                            <span class="text-truncate me-0"><i class="fa fa-times-circle text-primary me-2"></i> <?php echo $vacancy ?> </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                <a class="btn btn-danger" href="unapply.php?unapply=<?php echo $job_id_row; ?>">Unapply</a>
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Application Due Date: <?php echo $application_deadline ?></small>
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


        <!-- Footer Start -->
        <!-- <div class="container-fluid bg-dark justify-content-center text-center text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
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