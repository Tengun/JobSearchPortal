<?php

require './php_logic/config.php';
if(!empty($_SESSION["id"])){

}else{
    header("Location: index.php");
  }

?>

<?php  
if(isset($_GET['unaply'])){
	$user_id = $_SESSION['id'];
	$job_id = $_GET['unaply'];
	// get job
	$result = mysqli_query($conn, "SELECT * FROM `Jobs` WHERE `Id` = '$job_id'");
	$row = mysqli_fetch_assoc($result);
	$job_category = $row['Category'];
  	$query = "DELETE FROM `Applied_Jobs` WHERE `Job_Id` = '$job_id' AND `User_Id` = '$user_id'";
	//$query = "DELETE FROM `Applied_Jobs` WHERE `Job_Id`='$job_id' AND `User_Id`= '$user_id'";
	 mysqli_query($conn, $query);
	    header("Location: job_category.php?category=$job_category&unaply=$job_id");
}

?>