<?php
    require './php_logic/config.php';
  if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $email = $_SESSION["email"];
    $result = mysqli_query($conn, "SELECT * FROM `Users` WHERE `Id` = '$id' AND `Email` = '$email'");
    $row = mysqli_fetch_assoc($result);
    $f_name = $row["F_Name"];
    $l_name = $row["L_Name"];
  }else{
    header("Location: index.php");
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
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="home.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary logo">Job Portal</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="home.php" class="nav-item nav-link active">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="job-list.php" class="dropdown-item">List</a>
                        </div>
                    </div>
                    <a href="about.php" class="nav-item nav-link">About Us</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">User</a>
                        <div class="dropdown-menu rounded-0 m-0">
                           <a href="" class="dropdown-item text-primary">
                            <?php
                            echo $f_name," ",$l_name;
                            ?> 
                            </a>
                            <a href="repository.php" class="dropdown-item">Job Repository</a>
                           <a href="logout.php" class="dropdown-item signout">Sign Out</a>
                        </div>
                    </div>
                </div>
                <a href="postjob.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job</a>
            </div>
        </nav>
        <!-- Navbar End -->


        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/bg_bb.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);)"><!--RGB(000,124,100, .5)-->
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Get recognized</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Apply for any job you like today and get the eyes of employers all over the world on you!</p>
                                    <a href="job-list.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Apply for a job</a>
                                    <!-- <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A Talent</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/bg_int.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Jobs finds you</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Its <i>Hustle Free! </i>Apply now and get a job</p>
                                    <a href="job-list.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Apply for a job</a>
                                    <!-- <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A Talent</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container mb-4">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore Jobs Quickly Using Categories</h1>
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <?php 
                        $category = "Business Development";
                        ?>
                        <a class="cat-item rounded p-4" href="job_category.php?category=<?php echo $category; ?>">
                            <i class="fa fa-3x fa-chart-line text-primary mb-4"></i>
                            <h6 class="mb-3">Business Development</h6>
                            <p class="mb-0">
                            <?php 
                            $category = "Business Development";
                        $result = mysqli_query($conn, "SELECT * FROM `Jobs` WHERE `Category` = '$category'");
                            $counter = mysqli_num_rows($result);
                            echo $counter;
                            ?>
                             Vacancy</p>
                        </a>
                    </div>

                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <?php 
                        $category = "Software Development";
                        ?>
                        <a class="cat-item rounded p-4" href="job_category.php?category=<?php echo $category; ?>">
                            <i class="fa fa-3x fa-tasks text-primary mb-4"></i>
                            <h6 class="mb-3">Software Development</h6>
                            <p class="mb-0">
                            <?php 
                            $category = "Software Development";
                        $result = mysqli_query($conn, "SELECT * FROM `Jobs` WHERE `Category` = '$category'");
                            $counter = mysqli_num_rows($result);
                            echo $counter;
                            ?>
                             Vacancy</p>
                        </a>
                    </div>

                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <?php 
                        $category = "Design And Creativity";
                        ?>
                        <a class="cat-item rounded p-4" href="job_category.php?category=<?php echo $category; ?>">
                            <i class="fa fa-3x fa-drafting-compass text-primary mb-4"></i>
                            <h6 class="mb-3">Design & Creative</h6>
                            <p class="mb-0">
                             <?php 
                            $category = "Design And Creativity";
                        $result = mysqli_query($conn, "SELECT * FROM `Jobs` WHERE `Category` = '$category'");
                            $counter = mysqli_num_rows($result);
                            echo $counter;
                            ?>
                            Vacancy</p>
                        </a>
                    </div>

                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <?php 
                        $category = "Linguistics";
                        ?>
                        <a class="cat-item rounded p-4" href="job_category.php?category=<?php echo $category; ?>">
                            <i class="fa fa-3x fa-language text-primary mb-4"></i>
                            <h6 class="mb-3">Linguistics</h6>
                            <p class="mb-0">
                            <?php 
                            $category = "Linguistics";
                        $result = mysqli_query($conn, "SELECT * FROM `Jobs` WHERE `Category` = '$category'");
                            $counter = mysqli_num_rows($result);
                            echo $counter;
                            ?>
                            Vacancy</p>
                        </a>
                    </div>

                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <?php 
                        $c_category = "Customer_Services";
                        ?>
                        <a class="cat-item rounded p-4" href="job_category.php?c_category=<?php echo $c_category; ?>">
                            <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                            <h6 class="mb-3">Customer Service</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>

                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                            <h6 class="mb-3">Human Resource</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>
            
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>
                            <h6 class="mb-3">Marketing</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>

                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-hands-helping text-primary mb-4"></i>
                            <h6 class="mb-3">Sales & Communication</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>

                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-book-reader text-primary mb-4"></i>
                            <h6 class="mb-3">Teaching & Education</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>
                    
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-taxi text-primary mb-4"></i>
                            <h6 class="mb-3">Taxi Drivers</h6>
                            <p class="mb-0">40 Vacancy</p>
                        </a>
                    </div>

                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-tools text-primary mb-4"></i>
                            <h6 class="mb-3">Auto Electrics & Motor Mechanics</h6>
                            <p class="mb-0">20 Vacancy</p>
                        </a>
                    </div>

                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-birthday-cake text-primary mb-4"></i>
                            <h6 class="mb-3">Cake Bakers</h6>
                            <p class="mb-0">03 Vacancy</p>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <!-- Category End -->


        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <h1 class="text-center mb-5">Our Clients Say!!!</h1>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>I give a 5 star rating for this web app. Hustle free in job search, i like it...</p>
                        <div class="d-flex align-items-center">
                            
                            <div class="ps-3">
                                <h5 class="mb-1">Pardington Tenga</h5>
                                <small>Distributed Systems Engineeer</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Found my first job through this site. Thanks to developers.</p>
                        <div class="d-flex align-items-center">
                            
                            <div class="ps-3">
                                <h5 class="mb-1">Tanaka Gwese</h5>
                                <small>Network Engineer</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Very intuitive, i am also encouraging my friends to start using this app.</p>
                        <div class="d-flex align-items-center">
                            
                            <div class="ps-3">
                                <h5 class="mb-1">Hope Mangobe</h5>
                                <small>Cyber security activist</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Community is saying a lot about this site and you really deserve the honor.</p>
                        <div class="d-flex align-items-center">
                            
                            <div class="ps-3">
                                <h5 class="mb-1">Alma Hove</h5>
                                <small>Software Engineer</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Its good. Guess what my boss like this and i give a 5 star rating.</p>
                        <div class="d-flex align-items-center">
                            
                            <div class="ps-3">
                                <h5 class="mb-1">Andrew Mangarani</h5>
                                <small>Full Stack Engineer</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
        

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