<?php
require './php_logic/config.php';
if(!empty($_SESSION["id"])){

}else{
    header("Location: index.php");
  }

?>

<?php
require './php_logic/config.php';
if(isset($_GET['apply'])){
	$id = $_SESSION['id'];
	$job_id = $_GET['apply'];
	// get job
	$result = mysqli_query($conn, "SELECT * FROM `Jobs` WHERE `Id` = '$job_id'");
	$row = mysqli_fetch_assoc($result);
	//get user
	$user_result = mysqli_query($conn, "SELECT * FROM `Users` WHERE `Id` = '$id'");
	$user_row = mysqli_fetch_assoc($user_result);

	$user_id = $id;
	$job_name = $row['Name'];
	$fname = $user_row['F_Name'];
	$lname = $user_row['L_Name'];
	$employee_name = $fname." ". $lname;
	$employee_mail = $user_row['Email'];
	$employee_gender = $user_row['Gender'];
	$employee_address = $user_row['Address'];
	$application_deadline = $row['Date_Line'];
	//add to applied jobs
	$query = "INSERT INTO `Applied_Jobs` (`Id`, `Job_Id`, `User_Id`, `Job_Name`, `Employee_Name`, `Employee_Email`, `Gender`, `Address`, `Application_DeadLine`) VALUES (NULL, '$job_id', '$user_id', '$job_name', '$employee_name', '$employee_mail', '$employee_gender', '$employee_address', '$application_deadline')";
	    mysqli_query($conn, $query);
	    $message = "success";
    header("Location: job-list.php?message=$job_id");
}


?>